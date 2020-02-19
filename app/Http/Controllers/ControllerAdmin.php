<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\hd_users;
use App\hd_reg_ticket;
use App\hd_estado;


class ControllerAdmin extends Controller
{
     function ticket()//Dashboard
     {
    
      $hd_reg_tickets =DB::table('hd_reg_tickets')->
          leftjoin('hd_users','hd_users.id','=','hd_reg_tickets.nFolio_Users')->leftjoin('hd_estado','hd_estado.id','=','hd_reg_tickets.cEstado')->select('hd_reg_tickets.id','hd_reg_tickets.cTitulo','hd_reg_tickets.cCategoria','hd_reg_tickets.cSistema','hd_reg_tickets.cPrioridad','hd_reg_tickets.cDesProblema','hd_users.cNombre','hd_users.cApellidos','hd_reg_tickets.created_at','hd_estado.cEstado')->get();
            return view('ticketdmin')->with('hd_reg_tickets',$hd_reg_tickets);
     }

     function auser()
     {
      $hd_users = hd_users::all();
      return view('ausers')->with('hd_users',$hd_users );
     }

     function detalleticket($id)
     {
      $hd_estado=hd_estado::all();
      $hd_reg_tickets =DB::table('hd_reg_tickets')->leftjoin('hd_users','hd_users.id','=','hd_reg_tickets.id')
      ->leftjoin('hd_estado','hd_estado.id','=','hd_reg_tickets.cEstado')->select('hd_reg_tickets.id','hd_reg_tickets.cTitulo','hd_reg_tickets.cCategoria','hd_reg_tickets.cSistema','hd_reg_tickets.cPrioridad','hd_reg_tickets.cDesProblema','hd_reg_tickets.created_at','hd_estado.id as idestado','hd_estado.cEstado')->where('hd_reg_tickets.id',$id)->get();
     return view('detalleticket')->with('hd_reg_tickets',$hd_reg_tickets)->with('hd_estado',$hd_estado);
     }
      function eliminarticket($id)
     {
     $hd_reg_tickets =hd_reg_ticket::where('id',$id)->delete();
     return redirect('aticket')->with('success','Registro eliminado satisfactoriamente');
     }

        function actualizarestado(Request $request,$id)
     {
         $hd_estado=hd_estado::all();
        $hd_reg_tickets =DB::table('hd_reg_tickets')->leftjoin('hd_users','hd_users.id','=','hd_reg_tickets.id')
        ->leftjoin('hd_estado','hd_estado.id','=','hd_reg_tickets.cEstado')->select('hd_reg_tickets.id','hd_reg_tickets.cTitulo','hd_reg_tickets.cCategoria','hd_reg_tickets.cSistema','hd_reg_tickets.cPrioridad','hd_reg_tickets.cDesProblema','hd_reg_tickets.created_at','hd_estado.id as idestado','hd_estado.cEstado as eEstado')->where('hd_reg_tickets.id',$id)->update($request->only('cEstado'))->get();
            return view('detalleticket')->with('hd_reg_tickets',$hd_reg_tickets)->with('hd_estado',$hd_estado);
     }
    

}