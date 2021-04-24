<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Models\Company\BelongsToCompany;
use App\Traits\Models\BelongsToUser;

class CompanyEmployee extends Model
{
    use HasFactory, SoftDeletes, BelongsToCompany, BelongsToUser;

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'company_id',
		'slug',
		'position',
    ];
}
