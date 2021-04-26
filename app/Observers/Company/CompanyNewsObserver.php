<?php

namespace App\Observers\Company;

use App\Models\Company\CompanyNews;
use App\Notifications\CompanyNewsCreated;
use App\Models\Subscription\Subscription;
use App\Enums\Subscription\TypeEnum;

class CompanyNewsObserver
{
    /**
     * Handle the CompanyNews "created" event.
     *
     * @param  \App\Models\CompanyNews  $companyNews
     * @return void
     */
    public function created(CompanyNews $companyNews) :void
    {
		$notification = new CompanyNewsCreated($companyNews);
        Subscription::byType(TypeEnum::CompanyNews)
			->where('company_id', $companyNews->company->id)->with('user')->get()
			->each(fn ($subscriber) => $subscriber->user->notify($notification));
    }
}
