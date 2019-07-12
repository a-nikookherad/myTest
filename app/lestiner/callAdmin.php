<?php

namespace App\lestiner;

use App\Events\userEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class callAdmin
{
	/**
	 * Create the event listener.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  userEvent $event
	 * @return void
	 */
	public function handle(userEvent $event)
	{
		//
		$user = $event->getUser();
		Log::info("ahay admin " . $user->name);
		echo "ahay admin hoy";
	}
}
