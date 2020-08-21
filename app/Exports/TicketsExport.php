<?php

namespace App\Exports;

use App\hd_reg_ticket;
use App\hd_estado;
use App\hd_prioridad;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;  
use Maatwebsite\Excel\Concerns\FromCollection;

class TicketsExport implements FromCollection{
    /**
    * @return \Illuminate\Support\Collection


    */
 
    public function collection()
    {
   
     $hd_reg_tickets=db::table('hd_reg_tickets')->leftjoin('hd_users','hd_users.id','=','hd_reg_tickets.nFolio_Users')->leftjoin('hd_estado','hd_estado.id','=','hd_reg_tickets.cEstado')->select('hd_reg_tickets.id','hd_reg_tickets.id','hd_reg_tickets.cTitulo','hd_reg_tickets.cCategoria','hd_estado.ccEstado','hd_reg_tickets.cSistema','hd_reg_tickets.cPrioridad','hd_users.cNombre','hd_reg_tickets.created_at')->get();
        return $hd_reg_tickets;
}
}