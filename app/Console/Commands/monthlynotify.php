<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Mail\MonthlySender;
use Illuminate\Support\Facades\Mail;

class monthlynotify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:monthly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command Notify Monthly';

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
        $c  = DB::table('mail_list')->where('type', 'cc')->pluck('email');
        $to = DB::table('mail_list')->where('type', 'to')->pluck('email');
    }
}
