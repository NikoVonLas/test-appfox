<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Models\Subscription\Subscription;

class Company extends Model
{
    use HasFactory, SoftDeletes;

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'name',
    ];

	/**
     * Get employees of company.
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function employees() :HasMany {
		return $this->hasMany(CompanyEmployee::class);
	}

	/**
     * Get news of company.
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function news() :HasMany {
		return $this->hasMany(CompanyNews::class);
	}

	/**
     * Get products of company.
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function products() :HasMany {
		return $this->hasMany(CompanyProduct::class);
	}

	/**
     * Get subscribers of company.
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function subscribers() :HasMany {
		return $this->hasMany(User::class, Subscription::class);
	}
}
