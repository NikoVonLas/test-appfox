<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory, SoftDeletes;

	public function employees() {
		return $this->hasMany(CompanyEmployee::class);
	}

	public function news() {
		return $this->hasMany(CompanyNews::class);
	}

	public function products() {
		return $this->hasMany(CompanyProduct::class);
	}
}
