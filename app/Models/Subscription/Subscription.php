<?php

namespace App\Models\Subscription;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use App\Models\User;
use App\Traits\Models\BelongsToUser;
use App\Traits\Models\Company\BelongsToCompany;
use App\Enums\Subscription\TypeEnum;

class Subscription extends Model
{
    use HasFactory, SoftDeletes, BelongsToUser, BelongsToCompany;

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'user_id',
		'company_id',
		'type'
    ];

	/**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
	 * @param  string $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
	public function ScopeByType(Builder $query, string $type) :Builder {
		return $query->whereIn('type', [$type, TypeEnum::company()]);
	}

	/**
     * Set subscription type
     *
	 * @param  App\Enums\Subscription\TypeEnum $type
     * @return void
     */
	public function setType(TypeEnum $type) :void
	{
	    $this->type = $type;
	}
}
