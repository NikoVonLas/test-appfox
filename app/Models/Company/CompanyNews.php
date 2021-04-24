<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Models\Company\BelongsToCompany;
use App\Traits\Models\Subscription\HasSubscribers;

class CompanyNews extends Model
{
    use HasFactory, SoftDeletes, BelongsToCompany, HasSubscribers;

	/**
     * Type of morph relation for subscribers
     *
     * @var string
     */
	public static $subscrizableType = 'company_news';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
		'slug',
		'title',
		'content',
    ];
}
