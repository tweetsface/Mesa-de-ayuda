<?php

namespace App\Exports;

use App\hd_reg_ticket;
use App\hd_estado;
use App\hd_prioridad;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;  
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class TicketsExport implements FromView{
    /**
    * @return \Illuminate\Support\Collection


    */
    public function __construct($view,$desde="",$hasta="",$bdestado="",$bdprioridad="")
    {
    	$this->view=$view;
    	$this->desde=$desde;
    	$this->hasta=$hasta;
    	$this->bdestado=$bdestado;
    	$this->bdprioridad=$bdprioridad;
    }
    public function view():View
    {
     $date = Carbon::now();
     $date = $date->format('Y-m-d');
     $fechaN=date("d-m-Y");
     $estado=hd_estado::all();
     $prioridad=hd_prioridad::all();
     $contar=$hd_reg_tickets=hd_reg_ticket::where('cEstado',$bdestado)->
     where('created_at',$date)->
     where('cPrioridad',$bdprioridad)->get()->count();
     $hd_reg_tickets=db::table('hd_reg_tickets')->leftjoin('hd_users','hd_users.id','=','hd_reg_tickets.nFolio_Users')->leftjoin('hd_estado','hd_estado.id','=','hd_reg_tickets.cEstado')->select('hd_reg_tickets.id','hd_reg_tickets.id','hd_reg_tickets.cTitulo','hd_reg_tickets.cCategoria','hd_estado.ccEstado','hd_reg_tickets.cSistema','hd_reg_tickets.cPrioridad','hd_users.cNombre','hd_reg_tickets.created_at')->where('cEstado',$bdestado)->where('hd_reg_tickets.created_at',$date)->where('cPrioridad',$bdprioridad)->get();
        return view('reporteD')->with('hd_estado',$estado)->with('hd_prioridad',$prioridad)->with('fechaN',$fechaN)->with('contar',$contar)->with('hd_reg_tickets',$hd_reg_tickets);
    }
}
