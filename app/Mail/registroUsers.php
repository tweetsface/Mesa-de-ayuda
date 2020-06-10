<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\hd_reg_ticket;
use Illuminate\Support\Facades\DB;
use Auth;
class registroUsers extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->from($address='helpdesk@aparedes.com.mx', $name = 'Agricola Paredes')->subject('Ticket generado con exito')->view('confirmacion')->with('hd_reg_tickets',$hd_reg_tickets);
    }
}
