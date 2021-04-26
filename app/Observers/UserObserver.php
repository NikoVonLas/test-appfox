<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user) :void
    {
        if(!empty($user->company_id)) {
			$user->subscribeTo($user->company_id, 'company');
		}
    }

	/**
     * Handle the User "updating" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updating(User $user) :void
    {
      if(!empty($user->company_id) && $user->isDirty('company_id')){
		  $user->subscribeTo($user->company_id, 'company');
      }
    }
}
