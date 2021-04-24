<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Models\Company\BelongsToCompany;

class CompanyNews extends Model
{
    use HasFactory, SoftDeletes, BelongsToCompany;
}
