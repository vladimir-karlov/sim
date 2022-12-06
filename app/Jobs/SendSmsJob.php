<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Log;

use App\Models\Account;

class SendSmsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
	protected $simCard, $message;   

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($simCard, $message)
    {
		$this->simCard = $simCard;
		$this->message = $message;		
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
	    
	    // Send and SMS via Nexmo Client
        $basic  = new \Nexmo\Client\Credentials\Basic(config("global.nexmo.key"), config("global.nexmo.secret"));
        $client = new \Nexmo\Client($basic);
        
        $message = $client->message()->send([
            'to' => $this->simCard->iccid,
            'from' => 'Nexmo API',
            'text' => $this->message
        ]);        	    
	    
		Log::info('Sending SMS to account: ' . json_encode($this->simCard->account->name));
		Log::info('Sim Card iccid: ' . json_encode($this->simCard->iccid));		
		Log::info('Message: ' . $this->message);		
    }
}
