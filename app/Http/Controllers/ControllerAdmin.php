<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\hd_users;
use App\hd_reg_ticket;
use App\hd_estado;
use App\hd_privilegio;
use Auth;


class ControllerAdmin extends Controller
{
     function ticket()//Dashboard
     {
    
      $hd_reg_tickets =DB::table('hd_reg_tickets')->
          leftjoin('hd_users','hd_users.id','=','hd_reg_tickets.nFolio_Users')->leftjoin('hd_estado','hd_estado.id','=','hd_reg_tickets.cEstado')->select('hd_reg_tickets.id','hd_reg_tickets.cTitulo','hd_reg_tickets.cCategoria','hd_reg_tickets.cSistema','hd_reg_tickets.cPrioridad','hd_reg_tickets.cDesProblema','hd_users.cNombre','hd_users.cApellidos','hd_reg_tickets.created_at','hd_estado.ccEstado')->get();
            return view('ticketdmin')->with('hd_reg_tickets',$hd_reg_tickets);
     }

     function auser()
     {
      $hd_privilegios=hd_privilegio::all();
      $hd_users =DB::table('hd_users')->leftjoin('hd_privilegios','hd_privilegios.id','=','hd_users.badmin')->select('hd_users.id','hd_users.cNombre','hd_users.cApellidos','hd_users.nEmpleado','hd_users.email','hd_users.badmin','hd_privilegios.cPrivilegios')->get();
      return view('ausers')->with('hd_users',$hd_users)->with('hd_privilegios',$hd_privilegios);
     }

     function detalleticket($id)
     {
      $hd_estado=hd_estado::all();
      $hd_reg_tickets =DB::table('hd_reg_tickets')->leftjoin('hd_users','hd_users.id','=','hd_reg_tickets.id')
      ->leftjoin('hd_estado','hd_estado.id','=','hd_reg_tickets.cEstado')->select('hd_reg_tickets.id','hd_reg_tickets.cTitulo','hd_reg_tickets.cCategoria','hd_reg_tickets.cSistema','hd_reg_tickets.cPrioridad','hd_reg_tickets.cDesProblema','hd_reg_tickets.created_at','hd_estado.id as idestado','hd_estado.ccEstado')->where('hd_reg_tickets.id',$id)->get();
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
         $datos=$request->only('cEstado');
         $hd_reg_tickets =DB::table('hd_reg_tickets')->leftjoin('hd_users','hd_users.id','=','hd_reg_tickets.id')
        ->leftjoin('hd_estado','hd_estado.id','=','hd_reg_tickets.cEstado')->select('hd_reg_tickets.id','hd_reg_tickets.cTitulo','hd_reg_tickets.cCategoria','hd_reg_tickets.cSistema','hd_reg_tickets.cPrioridad','hd_reg_tickets.cDesProblema','hd_reg_tickets.created_at','hd_estado.id as idestado','hd_estado.ccEstado')->where('hd_reg_tickets.id',$id)->get();
           $nuevo=hd_reg_ticket::find($id)->update($request->only('cEstado'));
              return view('detalleticket')->with('hd_reg_tickets',$hd_reg_tickets)->with('hd_estado',$hd_estado);
     }
    

}