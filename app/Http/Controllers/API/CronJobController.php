<?php

namespace App\Http\Controllers\API;

use App\Jobs\CronJob;
use App\Services\OCWService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\PresensiBerlangsung;
use App\Services\WhatsappService;

class CronJobController extends Controller
{
    public function runCron() 
	{
		dispatchSync(new PresensiBerlangsung())
			->onConnection('database')
			->onQueue('default');
	}
}
