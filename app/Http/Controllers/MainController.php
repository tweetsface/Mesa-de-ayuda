<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hd_users;
use App\hd_reg_ticket;
use App\hd_categoria;
use App\hd_sistema;
use App\hd_prioridad;
use App\hd_comentario;
use App\hd_estado;
use Illuminate\Http\hd_comentarioFormRequest;
use Illuminate\Support\Facades\Validator ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mail;
use Response;
use Carbon\Carbon;
use Random;

 
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
      }else {
     return redirect('panel');
    }
     }
     else{
        return back()->with('error','ERROR EN LAS CREDENCIALES');
     }
}
   

    public function logout()
    {
     Auth::logout();
     return redirect('login');
    }

    public function registrar()
    {
    	return view('auth.register');
    }

    public function registrarusuario(Request $request)
    {
  
    	$add=new hd_users;
        $add->cNombre= $request->cNombre;
        $add->cApellidos= $request->cApellidos;
        $add->nEmpleado= $request->nEmpleado;
        $add->email= $request->email;
        $add->password = bcrypt($request->password);
        $add->badmin=0;
        if($request->hasFile('sFoto') && $request->hasFile('sFoto')=="image/jpg" || $request->hasFile('sFoto')=="image/jpeg" )
        {
        $file=$request->file('sFoto');
        $nombre=date_format(now(),"His")."_".$file->getClientOriginalName();
         $file->move('storage',$nombre);
        $add['sFoto']=$nombre;
         }
       
        $this->validate($request, [
       'email'   => 'required|email|unique:hd_users',
       'password'  => 'required|min:8'
        ]);
        $add->save();
        return Response::json($add,200);
    }
     public function  dashboard()//Dashboard
    {
      $comentarios=DB::table('hd_comentarios')->
      leftjoin('hd_users','hd_users.id','hd_comentarios.nUser_id')->
      leftjoin('hd_reg_tickets','hd_reg_tickets.id','hd_comentarios.nFolio_ticket')->
      select('hd_users.cNombre','hd_comentarios.cComentarios','hd_comentarios.nFolio_ticket','hd_comentarios.created_at','hd_users.badmin','hd_reg_tickets.nFolio_Users','hd_reg_tickets.nAtendio')->where('nAtendio',auth()->user()->id)->where('badmin',0)->get();
      $count=$comentarios->count();
      $abierto=hd_reg_ticket::where('cEstado',2)->
      where('nAtendio',auth()->user()->id)->get()->count();
      $proceso=hd_reg_ticket::where('cEstado',3)->
      where('nAtendio',auth()->user()->id)->get()->count();;
      $cerrado=hd_reg_ticket::where('cEstado',5)->
      where('nAtendio',auth()->user()->id)->get()->count();
<<<<<<< HEAD
      $hd_prioridad=hd_prioridad::all();
      $hd_categorias=hd_categoria::all();
      $hd_sistemas=hd_sistema::all();
=======
>>>>>>> aee0fce65ce48dfa9c475e156d591624bdd2559a
      $tickets=DB::table('hd_reg_tickets')->
      leftjoin('hd_estado','hd_estado.id','=','hd_reg_tickets.cEstado')->
      leftjoin('hd_prioridad','hd_prioridad.id','hd_reg_tickets.cPrioridad')->
      leftjoin('hd_users','hd_users.id','hd_reg_tickets.nFolio_Users')->
      select('hd_reg_tickets.id','hd_reg_tickets.created_at','hd_reg_tickets.cDesProblema','hd_estado.ccEstado','hd_prioridad.cNPrioridad','hd_reg_tickets.cPrioridad','hd_reg_tickets.nAtendio')->wherein('cEstado',[1,2,3,4])->where('nAtendio',auth()->user()->id)->get();
       $fecha =DB::table('hd_reg_tickets')->
      leftjoin('hd_users','hd_users.id','=','hd_reg_tickets.id')->
      leftjoin('hd_estado','hd_estado.id','=','hd_reg_tickets.cEstado')->
      leftjoin('hd_categorias','hd_categorias.id','=','hd_reg_tickets.cCategoria')->
      leftjoin('hd_sistemas','hd_sistemas.id','=','hd_reg_tickets.cSistema')->
      leftjoin('hd_prioridad','hd_prioridad.id','=','hd_reg_tickets.cPrioridad')->
      leftjoin('hd_comentarios','hd_comentarios.id','=','hd_reg_tickets.id')->
      select('hd_reg_tickets.created_at')->OrderBy('hd_reg_tickets.id','desc')->get()->take(1);
      return view('paneladministrador')->with('abierto',$abierto)->with('proceso',$proceso)
      ->with('cerrado',$cerrado)
      ->with('tickets',$tickets)
      ->with('comentarios',$comentarios)
      ->with('fecha',$fecha)
<<<<<<< HEAD
      ->with('contar',$count)
      ->with('hd_categorias',$hd_categorias)
      ->with('hd_prioridad',$hd_prioridad)
      ->with('hd_sistemas',$hd_sistemas);
=======
      ->with('contar',$count);
>>>>>>> aee0fce65ce48dfa9c475e156d591624bdd2559a
    }

    public function generarreporte(Request $request)
    {//Dashboard
       if(Auth::check())
       {
        $user_ticket=DB::table('hd_users')->
        select('hd_users.id')->where('badmin',1)->get()->random(1);
        $ticket=new hd_reg_ticket;
        $ticket->cTitulo= $request->cTitulo;
        $ticket->cCategoria= $request->cCategoria;
        $ticket->cSistema= $request->cSistema;
        $ticket->CPrioridad= $request->cPrioridad;
        $ticket->CDesproblema=$request->cDesproblema;
        $ticket->created_at=$hoy=date("Y-m-d");
	      $ticket->nFolio_Users=Auth::user()->id;
        $ticket->cEstado=1;
        $ticket->nAtendio=$user_ticket[0]->id;
        $ticket->save();
        $emails = array(Auth()->user()->email,"helpdesk@aparedes.com.mx");
      \Mail::to($emails)->send(new \App\Mail\notificaciones());
        return  redirect('panel');
       } 
    }
      public  function recuperar(Request $request)
    {
    	return view ('recuperar');
    }
     public  function panel()//panel
    {
     $comentarios=DB::table('hd_comentarios')->
      leftjoin('hd_users','hd_users.id','hd_comentarios.nUser_id')->
      leftjoin('hd_reg_tickets','hd_reg_tickets.id','hd_comentarios.nFolio_ticket')->
      select('hd_users.cNombre','hd_comentarios.cComentarios','hd_comentarios.nFolio_ticket','hd_comentarios.created_at','hd_users.badmin','hd_reg_tickets.nFolio_Users')->where('badmin',1)->where('nFolio_Users',Auth()->user()->id)->get();
      $count=$comentarios->count();
      $hd_categorias=hd_categoria::all();
      $hd_sistemas=hd_sistema::all();
      $hd_prioridad=hd_prioridad::all();
      $abiertos= $hd_reg_tickets =DB::table('hd_reg_tickets')->
      where('nFolio_Users',Auth()->user()->id)->
      where('cEstado',2)->get()->count();
      $cerrados= $hd_reg_tickets =DB::table('hd_reg_tickets')->
      where('nFolio_Users',Auth()->user()->id)->
      where('cEstado',5)->get()->count();
      $proceso= $hd_reg_tickets =DB::table('hd_reg_tickets')->
      where('nFolio_Users',Auth()->user()->id)->
      where('cEstado',3)->get()->count();
      $fecha =DB::table('hd_reg_tickets')->
      leftjoin('hd_users','hd_users.id','=','hd_reg_tickets.id')->
      leftjoin('hd_estado','hd_estado.id','=','hd_reg_tickets.cEstado')->
      leftjoin('hd_categorias','hd_categorias.id','=','hd_reg_tickets.cCategoria')->
      leftjoin('hd_sistemas','hd_sistemas.id','=','hd_reg_tickets.cSistema')->
      leftjoin('hd_prioridad','hd_prioridad.id','=','hd_reg_tickets.cPrioridad')->
      select('hd_reg_tickets.created_at')->where('nFolio_Users',Auth()->user()->id)->OrderBy('hd_reg_tickets.id','desc')->get()->take(1);
      $hd_reg_tickets =DB::table('hd_reg_tickets')->
      leftjoin('hd_users','hd_users.id','=','hd_reg_tickets.id')->
      leftjoin('hd_estado','hd_estado.id','=','hd_reg_tickets.cEstado')->
      leftjoin('hd_categorias','hd_categorias.id','=','hd_reg_tickets.cCategoria')->
      leftjoin('hd_sistemas','hd_sistemas.id','=','hd_reg_tickets.cSistema')->
      leftjoin('hd_prioridad','hd_prioridad.id','=','hd_reg_tickets.cPrioridad')->
      select('hd_reg_tickets.id','hd_reg_tickets.cTitulo','hd_categorias.cCategorias',
         'hd_sistemas.cSistema','hd_prioridad.cNPrioridad','hd_reg_tickets.cDesProblema','hd_reg_tickets.created_at','hd_estado.id as idestado','hd_estado.ccEstado')->where('nFolio_Users',Auth()->user()->id)->OrderBy('hd_reg_tickets.id','desc')->get();
    	return view('panelusuario')->with('hd_reg_tickets',$hd_reg_tickets)->
     with('hd_categorias',$hd_categorias)->
     with('hd_sistemas',$hd_sistemas)->with('hd_prioridad',$hd_prioridad)->with('abiertos',$abiertos)->with('cerrados',$cerrados)->with('proceso',$proceso)->with('fecha',$fecha)->with('comentarios',$comentarios);
    }
    public  function ticket()//Dashboard
    {
      $date = Carbon::now();
      $date = $date->format('Y-m-d');
      $hd_categorias=hd_categoria::all();
      $hd_sistemas=hd_sistema::all();
      $hd_prioridad=hd_prioridad::all();
      $hd_reg_tickets= $hd_reg_tickets =DB::table('hd_reg_tickets')->
      leftjoin('hd_users','hd_users.id','=','hd_reg_tickets.id')->
      leftjoin('hd_estado','hd_estado.id','=','hd_reg_tickets.cEstado')->
      leftjoin('hd_categorias','hd_categorias.id','=','hd_reg_tickets.cCategoria')->
      leftjoin('hd_sistemas','hd_sistemas.id','=','hd_reg_tickets.cSistema')->
      leftjoin('hd_prioridad','hd_prioridad.id','=','hd_reg_tickets.cPrioridad')->
      select('hd_reg_tickets.id','hd_reg_tickets.cTitulo','hd_categorias.cCategorias',
         'hd_sistemas.cSistema','hd_prioridad.cNPrioridad','hd_reg_tickets.cDesProblema','hd_reg_tickets.created_at','hd_estado.id as idestado','hd_estado.ccEstado')->get();
      return view('mostrartickets')->with('hd_reg_tickets',$hd_reg_tickets)->with('hd_categorias',$hd_categorias)->
     with('hd_sistemas',$hd_sistemas)->with('hd_prioridad',$hd_prioridad);
    }
    public function modal()
    {
    
     return view('modalticket');
    }
       public function verTicketU($id)//ver ticket usuario especifico
    {
      $hd_categorias=hd_categoria::all();
      $hd_sistemas=hd_sistema::all();
      $hd_prioridad=hd_prioridad::all();
       $hd_estado=hd_estado::all();
      $hd_comentarios=DB::table('hd_comentarios')->
      leftjoin('hd_reg_tickets','hd_reg_tickets.id','=','hd_comentarios.nFolio_ticket')->
      leftjoin('hd_users','hd_users.id','=','hd_comentarios.nUser_id')->select('hd_users.id','hd_comentarios.cComentarios','hd_users.cNombre','hd_users.badmin','hd_comentarios.created_at')->where('hd_reg_tickets.id',$id)->get();
      
      $hd_reg_tickets=DB::table('hd_reg_tickets')->
      leftjoin('hd_users','hd_users.id','=','hd_reg_tickets.nFolio_Users')->
      leftjoin('hd_estado','hd_estado.id','=','hd_reg_tickets.cEstado')->
      leftjoin('hd_categorias','hd_categorias.id','=','hd_reg_tickets.cCategoria')->
      leftjoin('hd_sistemas','hd_sistemas.id','=','hd_reg_tickets.cSistema')->
      leftjoin('hd_prioridad','hd_prioridad.id','=','hd_reg_tickets.cPrioridad')->
      select('hd_reg_tickets.id','hd_reg_tickets.cTitulo','hd_categorias.cCategorias',
         'hd_sistemas.cSistema','hd_prioridad.cNPrioridad','hd_reg_tickets.cDesProblema','hd_reg_tickets.created_at','hd_estado.id as idestado','hd_estado.ccEstado','hd_users.cNombre')->
      where('hd_reg_tickets.id',$id)->get();
        $comentarios=DB::table('hd_comentarios')->
      leftjoin('hd_users','hd_users.id','hd_comentarios.nUser_id')->
      leftjoin('hd_reg_tickets','hd_reg_tickets.id','hd_comentarios.nFolio_ticket')->
      select('hd_users.cNombre','hd_comentarios.cComentarios','hd_comentarios.nFolio_ticket','hd_comentarios.created_at','hd_users.badmin','hd_reg_tickets.nFolio_Users')->where('badmin',1)->where('nFolio_Users',Auth()->user()->id)->get();
      return view('detalleTusuario')->with('hd_reg_tickets',$hd_reg_tickets)->with('comentarios',$comentarios)->with('hd_categorias',$hd_categorias)->with('hd_sistemas',$hd_sistemas)->with('hd_prioridad',$hd_prioridad)->with('hd_comentarios',$hd_comentarios);
    }
    public function actualizarCom($id,Request $request)
    {
       $hd_reg_tickets=DB::table('hd_reg_tickets')->
      leftjoin('hd_users','hd_users.id','=','hd_reg_tickets.nFolio_Users')->
      leftjoin('hd_estado','hd_estado.id','=','hd_reg_tickets.cEstado')->
      leftjoin('hd_categorias','hd_categorias.id','=','hd_reg_tickets.cCategoria')->
      leftjoin('hd_sistemas','hd_sistemas.id','=','hd_reg_tickets.cSistema')->
      leftjoin('hd_prioridad','hd_prioridad.id','=','hd_reg_tickets.cPrioridad')->
      select('hd_reg_tickets.id','hd_reg_tickets.cTitulo','hd_categorias.cCategorias',
         'hd_sistemas.cSistema','hd_prioridad.cNPrioridad','hd_reg_tickets.cDesProblema','hd_reg_tickets.created_at','hd_estado.id as idestado','hd_estado.ccEstado','hd_users.cNombre')->
      where('hd_reg_tickets.id',$id)->get();
        $cComentarios=$request->only('cComentarios');
        $cRespuesta=$request->only('cRespuesta');
        $nuevos=hd_reg_ticket::find($id)->
        update($cComentarios,$cRespuesta);
        return view('detalleTusuario')->with('hd_reg_tickets',$hd_reg_tickets);
    } 
    public function comentarios(Request $request,$id)
    {
      $comentarios=new hd_comentario(array(
        'nFolio_ticket'=>$id,
        'cComentarios'=>$request->get('cComentarios'),
        'nUser_id'=>Auth()->user()->id,
      ));
      $comentarios->save();
      return redirect()->back()->withSuccess('IT WORKS!');;

  }
  public function downloadManual()
  {
    $file=public_path()."\download\manual.pdf";
    return response()->download($file,"manual.pdf") ;
  }

}


