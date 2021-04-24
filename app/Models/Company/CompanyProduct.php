<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Models\Company\BelongsToCompany;
use App\Traits\Models\Subscription\HasSubscribers;

class CompanyProduct extends Model
{
    use HasFactory, SoftDeletes, BelongsToCompany, HasSubscribers;

	/**
     * Type of morph relation for subscribers
     *
     * @var string
     */
	public static $subscrizableType = 'company_product';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
		'slug',
		'name',
		'price',
    ];
}
