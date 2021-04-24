<?php

namespace App\Models\Subscription;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

use App\Models\User;
use App\Traits\Models\BelongsToUser;

class Subscription extends Model
{
    use HasFactory, SoftDeletes, BelongsToUser;

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'name',
    ];

	public function subscrizable()
    {
        return $this->morphTo();
    }
}
