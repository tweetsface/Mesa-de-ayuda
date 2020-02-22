<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hd_users;
use App\hd_reg_ticket;
use Illuminate\Support\Facades\Validator ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mail;

class MainController extends Controller
{
      //
    function index()
    {
     return view('login');
    }

     function checklogin(Request $request)
    {
    
    $this->validate($request, [
      'email'   => 'required|email',
      'password'  => 'required|min:8'
     ]);

     $user_data = array(
      'email'  => $request->get('email'),
      'password' => $request->get('password')
     );
    
     if(Auth::attempt($user_data))
     {
      if(Auth::check() && Auth::user()->badmin==1)
      {
     return redirect('dashboard');
      }else{
     return redirect('panel');
    }
     }
     else{
        return back()->with('error','ERROR EN LAS CREDENCIALES');
     }
}
    function successlogin()
    {

     return view('successlogin');

    }

    function logout()
    {
     Auth::logout();
     return redirect('login');
    }

    function registrar()
    {
    	return view('registrar');
    }

      function registrarusuario(Request $request)
    {
      $this->validate($request, [
       'email'   => 'required|email',
       'password'  => 'required|min:8'
         ]);
    	$add=new hd_users;
        $add->cNombre= $request->cNombre;
        $add->cApellidos= $request->cApellidos;
        $add->nEmpleado= $request->nEmpleado;
        $add->email= $request->email;
        $add->password = bcrypt($request->password);
        $add->badmin =0;
        $add->save();
        return back()->with('msg', 'Usuario registrado correctamente');
    	 
    }
      function  dashboard()//Dashboard
    {
    	return view('paneladministrador');
    }
      function generarreporte(Request $request)//Dashboard
    {
       if(Auth::check())
       {
        $ticket=new hd_reg_ticket;
        $ticket->cTitulo= $request->cTitulo;
        $ticket->cCategoria= $request->cCategoria;
        $ticket->cSistema= $request->cSistema;
        $ticket->CPrioridad= $request->cPrioridad;
        $ticket->CDesproblema=$request->cDesproblema;
        $ticket->created_at=now();
	      $ticket->nFolio_Users=Auth::user()->id;
        $ticket->cEstado=1;
        $ticket->save();
      \Mail::to(Auth()->user()->email)->send(new \App\Mail\notificaciones());
        return  redirect('ticket');
    }
    }
      function recuperar(Request $request)
    {
    	return view ('recuperar');

    }
    
      function panel()//panel
    {
     
    	return view('panelusuario');

    }
     function ticket()//Dashboard
    {
        $hd_reg_tickets =DB::table('hd_reg_tickets')->
          leftjoin('hd_users','hd_users.id','=','hd_reg_tickets.nFolio_Users')->leftjoin('hd_estado','hd_estado.id','=','hd_reg_tickets.cEstado')->select('hd_reg_tickets.id','hd_reg_tickets.cTitulo','hd_reg_tickets.cCategoria','hd_reg_tickets.cSistema','hd_reg_tickets.cPrioridad','hd_reg_tickets.cDesProblema','hd_users.cNombre','hd_reg_tickets.created_at','hd_estado.ccEstado')
         ->where('hd_reg_tickets.nFolio_Users','=',Auth::user()->id)->get();
         return view('mostrartickets')->with('hd_reg_tickets',$hd_reg_tickets);
    

    }
     public function contact(Request $request){
       
    }



}


