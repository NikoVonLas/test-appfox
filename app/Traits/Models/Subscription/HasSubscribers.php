<?php

namespace App\Traits\Models\Subscription;

use Illuminate\Database\Eloquent\Relations\morphMany;

use App\Models\Subscription\Subscription;

trait HasSubscribers
{
	/**
     * Get subscribers of model.
	 * @return \Illuminate\Database\Eloquent\Relations\morphMany
     */
	 public function subscribers() :MorphMany
     {
         return $this->morphMany(Subscription::class, 'subscrizable');
     }
}
