<?php

namespace App\Observers\Company;

use App\Models\Company\CompanyProduct;
use App\Notifications\CompanyProductCreated;
use App\Models\Subscription\Subscription;
use App\Enums\Subscription\TypeEnum;

class CompanyProductObserver
{
    /**
     * Handle the CompanyProduct "created" event.
     *
     * @param  \App\Models\CompanyProduct  $companyProduct
     * @return void
     */
    public function created(CompanyProduct $companyProduct) :void
    {
		$notification = new CompanyProductCreated($companyProduct);
        Subscription::byType(TypeEnum::CompanyProduct)
			->where('company_id', $companyProduct->company->id)->with('user')->get()
			->each(fn ($subscriber) => $subscriber->user->notify($notification));
    }
}
