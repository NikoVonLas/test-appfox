<?php

namespace App\Traits\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\User;

trait BelongsToUser
{
	/**
     * Get user.
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() :BelongsTo
    {
    	$this->belongsTo(User::class);
    }
}
