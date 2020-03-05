<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\hd_reg_ticket;
use App\hd_users;
use Illuminate\Support\Facades\DB;
use Auth;
class mailActualizar extends Mailable
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
           $hd_reg_tickets =DB::table('hd_reg_tickets')->leftjoin('hd_users','hd_users.id','=','hd_reg_tickets.id')
           ->leftjoin('hd_estado','hd_estado.id','=','hd_reg_tickets.cEstado')->select('hd_reg_tickets.id','hd_reg_tickets.cTitulo','hd_reg_tickets.cCategoria','hd_reg_tickets.cSistema','hd_reg_tickets.cPrioridad','hd_reg_tickets.cDesProblema','hd_reg_tickets.created_at','hd_estado.id as idestado','hd_estado.ccEstado','hd_users.cNombre')->orderBy('created_at', 'desc')->take(1)->get();
               return $this->from($address='helpdesk@aparedes.com.mx', $name = 'Agricola Paredes')->subject('SEGUIMIENTO TICKET')->view('notificaciones')->with('hd_reg_tickets',$hd_reg_tickets);
    }
}