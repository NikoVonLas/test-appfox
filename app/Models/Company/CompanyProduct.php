<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Models\Company\BelongsToCompany;

class CompanyProduct extends Model
{
    use HasFactory, SoftDeletes, BelongsToCompany;

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
