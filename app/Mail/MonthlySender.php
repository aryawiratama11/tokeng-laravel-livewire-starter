<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class MonthlySender extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct()
    {

    }

    /**
     * Build the message.
     *
     * @return $this
     */    
    public function build()
    {
        $easter  = DB::table('easter')->where('id', rand(1,450))->value('text');
        return $this->from('notify.no_reply@mli.panasonic.co.id')
                    ->subject('Zero Stock List Montly')
                    ->attach(public_path('doc\\').$docname.'.pdf')
                    ->view('mail.internal')
                    ->with([
                        'easter' => $easter,
                    ]);
    }
}
