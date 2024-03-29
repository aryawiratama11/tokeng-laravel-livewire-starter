<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Mail\NotifyService;
use Illuminate\Support\Facades\Mail;

class dailynotify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command Notify Daily';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
    $cc = DB::table('mail_list')->where('type', 'cc')->pluck('email');
    $to = DB::table('mail_list')->where('type', 'To')->pluck('email');
    if (DB::table('temp_data')->where('value', date('Ymd', strtotime('-1 days')))->count() > 0) {
        Mail::to($to)->cc($cc)->send(new NotifyService(date('Ymd', strtotime('-1 days'))));
        $this->info('Successfull job.');
    } else {
        $this->info('No job.');
    }
    }
}
