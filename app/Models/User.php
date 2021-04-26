<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\hasOne;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

use App\Models\Company\CompanyNews;
use App\Models\Company\CompanyProduct;
use App\Models\Company\CompanyEmployee;
use App\Models\Subscription\Subscription;
use App\Enums\Subscription\TypeEnum;

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
     * The channels the user receives notification broadcasts on.
     *
     * @return string
     */
    public function receivesBroadcastNotificationsOn()
    {
        return "notifications.user.{$this->id}";
    }


	/**
     * Get subscriptions of user.
	 * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
	public function subscriptions() :hasMany
    {
        return $this->hasMany(Subscription::class);
    }

	/**
     * Subscribe to some.
	 *
	 * @param  int $company_id
	 * @param  App\Enums\Subscription\TypeEnum|null $type
	 * @return Subscription
     */
	public function subscribeTo(int $company_id, ?TypeEnum $type = null) :Subscription {
		return $this->subscriptions()->firstOrCreate([
			'company_id' => $company_id,
			'type'		 => $type ?? TypeEnum::All
		]);
	}

	/**
     * Get employee model (like profile in company) of user.
	 * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
	public function employee() :hasOne
    {
        return $this->hasOne(CompanyEmployee::class);
    }

	/**
     * Check user in company or not, if $company_id presented -
	 * check user in company with this id
     *
     * @param  int|null $company_id
     * @return bool
     */
	public function isCompany(?int $company_id = null) :bool {
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
}
