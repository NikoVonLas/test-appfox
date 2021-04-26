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
    	return $this->belongsTo(Company::class);
    }

	/**
     * Scope a query to get entity only with company.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
	 * @param  int|null $id
     * @return \Illuminate\Database\Eloquent\Builder
     */
	public function ScopeInCompany(Builder $query, ?int $id = null) :Builder {
		return !empty($id) ? $query->where('company_id', $id)
						   : $query->whereNotNull('company_id');
	}
}
