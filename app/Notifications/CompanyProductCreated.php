<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

use App\Models\Company\CompanyProduct;

class CompanyProductCreated extends Notification implements ShouldQueue
{
    use Queueable;

	/**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(protected CompanyProduct $product)
    {}

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['broadcast', 'database'];
    }

	/**
	 * Get the type of the notification being broadcast.
	 *
	 * @return string
	 */
	public function broadcastType()
	{
	    return 'company.product';
	}

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return $this->product->toArray();
    }
}
