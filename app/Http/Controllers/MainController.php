<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hd_users;
use App\hd_reg_ticket;
use Illuminate\Support\Facades\Validator ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
      if(Auth::user()->badmin==1)
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

    function register()
    {
    	return view('Register');
    }

      function registeruser(Request $request)
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
        $add->save();
        return back()->with('msg', 'Usuario registrado correctamente');
    	 
    }
      function panel()//Dashboard
    {
      $hd_users = hd_users::all();
    	return view('Dashboard')->with('hd_users',$hd_users );
    }
       function reporter()//Dashboard
    {
    	return view('Reportar');
    }
      function generarreporte(Request $request)//Dashboard
    {
       
        $ticket=new hd_reg_ticket;
        $ticket->cTitulo= $request->cTitulo;
        $ticket->cCategoria= $request->cCategoria;
        $ticket->cSistema= $request->cSistema;
        $ticket->CPrioridad= $request->cPrioridad;
        $ticket->CDesproblema=$request->cDesproblema;
	      $ticket->nFolio_Users=1;
        $ticket->save();
        }


      function forgot(Request $request)//Dashboard
    {
    	return view ('forgotpass');

    }
    
      function dashboardu()//panel
    {
      $hd_reg_tickets = hd_reg_ticket::all();
    	return view('panelticket')->with('hd_reg_tickets',$hd_reg_tickets );

    }
     function ticket()//Dashboard
    {
       $hd_reg_tickets = hd_reg_ticket::all();
      return view('panelt')->with('hd_reg_tickets',$hd_reg_tickets );

    }



}


