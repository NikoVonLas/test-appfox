<?php

namespace App\Traits\Models\Company;

use App\Models\Company\Company;

trait BelongsToCompany
{
    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function company()
    {
    	$this->belongsTo(Company::class);
    }
}
