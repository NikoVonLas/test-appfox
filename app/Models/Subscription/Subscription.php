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
		'subscription_type'
    ];

	/**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
	 * @param  string $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
	public function ScopeByType(Builder $query, string $type) :Builder {
		return $query->whereIn('subscription_type', [$type, 'all']);
	}
}
