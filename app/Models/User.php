<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\belongsToMany;
use Illuminate\Database\Eloquent\Relations\hasOne;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

use App\Models\Company\CompanyNews;
use App\Models\Company\CompanyProduct;
use App\Models\Company\CompanyEmployee;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


	/**
     * Get subscriptions of user.
	 * @return \Illuminate\Database\Eloquent\Relations\belongsToMany|null
     */
	public function subscriptions() :?belongsToMany
    {
        return $this->belongsToMany(Subscription::class);
    }

	/**
     * Get employee model (like profile in company) of user.
	 * @return \Illuminate\Database\Eloquent\Relations\hasOne|null
     */
	public function employee() :?hasOne
    {
        return $this->hasOne(CompanyEmployee::class);
    }

	/**
     * Subscribe to some.
	 * @return int
     */
	public function subscribeTo(Model $subscrizable) :int {
		return $this->subscriptions()->firstOrCreate([
			'subscrizable_type' => $subscrizable::subscrizableType,
			'subscrizable_id'	=> $subscrizable->id
		])->id;
	}

	/**
     * Check user in company or not, if $company_id presented -
	 * check user in company with this id
     *
     * @param  int|null $company_id
     * @return bool
     */
	public function inCompany(?int $company_id = null) :bool {
		return empty($company_id) ? empty($this->employee) : $this->employee?->company_id === $company_id;
	}

	/**
     * Scope a query to get only users in company
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
	 * @param  int|null $company_id
     * @return \Illuminate\Database\Eloquent\Builder
     */
	public function ScopeInCompany(Builder $q, ?int $company_id = null) :Builder {
		return empty($company_id)
				? $query->whereHas('employee')
				: $query->whereHas('employee', function (Builder $query) use ($company_id) {
					$query->where('company_id', $company_id);
				});
	}

	/**
     * Scope a query to get subscribed to some.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
	 * @param  string $subscrizable_type
	 * @param  int $subscrizable_id
     * @return \Illuminate\Database\Eloquent\Builder
     */
	public function ScopeSubscribedTo(Builder $query, Model $subscrizable) :Builder {
		return $query->whereHas('subscriptions', function (Builder $query) {
			$query->where('subscrizable_type', $subscrizable::subscrizableType)
				  ->where('subscrizable_id', $subscrizable->id);
		})->get();
	}
}
