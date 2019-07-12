<?php

namespace App\Jobs;

use App\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class createLogJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $text;
//    public  $tries=3;
//    public  $deleteWhenMissingModels=true;
//    public  $timeout=10;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($text)
    {
        //
		$this->text=$text;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
		sleep(1);
//		throw new \Exception("khata");
		echo $this->text;
//		Log::info($this->text);
    }

/*	public function retryUntil()
	{
		return Carbon::now()->addSeconds(10);
    }*/

/*	public function failed()
	{
		Log::error("this class is failed ====>".self::class);
	}*/
}
