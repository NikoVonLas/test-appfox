<?php

namespace App\Traits\Models\Company;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Company\Company;

trait BelongsToCompany
{
	/**
     * Get employees of company.
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company() :BelongsTo
    {
    	$this->belongsTo(Company::class);
    }
}
