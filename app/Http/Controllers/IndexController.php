<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Account;
use App\Jobs\SendSmsJob;

class IndexController extends Controller
{
    public function index() {
	    // get active sim cards for certain account
        $account = Account::find(1)->with(['simCards' => function($q) {
                        				$q->where('is_active', 1);
                    				}])
                    		->first();
                    		
		// send an sms by initiating a job for each active sim card
		foreach($account->simCards as $simCard) {
			$message = 'Hello, ' . $account->name;
			
			dump('Message sent to ' . $simCard->iccid);
			
			dispatch(new SendSmsJob($simCard, $message));			
		}
    }
}