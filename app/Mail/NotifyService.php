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
    protected $value;

    public function __construct($a1)
    {
        
        $this->value = $a1;
    }

    /**
     * Build the message.
     *
     * @return $this
     */    
    public function build()
    {
        $table  = DB::table('temp_data')->join('stock', 'temp_data.refer', '=', 'stock.item_code')
                  ->where('temp_data.value', $this->value)->where('type', 'EMPSTCK')
                  ->select('stock.item_code as item_code', 'stock.item_name as item_name', 'stock.qty as qty', 'stock.uom as uom', 'stock.location as location')->get();
        $easter = DB::table('easter')->where('id', rand(1,450))->value('text');
        return $this->from('notify.no_reply@mli.panasonic.co.id')
                    ->subject('Reminder Zero Stock Item')
                    ->view('mail.internal')
                    ->with([
                        'data'   => $table,
                        'easter' => $easter,
                    ]);
    }
}
