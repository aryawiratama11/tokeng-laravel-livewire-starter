<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class NotifyService extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $itemcode;

    public function __construct($a1)
    {
        
        $this->itemcode = $a1;
    }

    /**
     * Build the message.
     *
     * @return $this
     */    
    public function build()
    {
        $item_name = DB::table('stock')->where('item_code', $this->itemcode)->limit(1)->value('item_name');
        $minimum   = DB::table('stock')->where('item_code', $this->itemcode)->limit(1)->value('minimum');
        $uom       = DB::table('stock')->where('item_code', $this->itemcode)->limit(1)->value('uom');
        $location  = DB::table('stock')->where('item_code', $this->itemcode)->limit(1)->value('location');
        $easter    = DB::table('easter')->where('id', rand(1,450))->value('text');
        return $this->from('notify.no_reply@mli.panasonic.co.id')
                    ->subject('Reminder Zero Stock Item')
                    ->view('mail.internal')
                    ->with([
                        'item_code' => $item_code,
                        'item_name' => $item_name,
                        'minimum'   => $minimum,
                        'uom'       => $uom,
                        'location'  => $location,
                        'easter'    => $easter,
                    ]);
    }
}
