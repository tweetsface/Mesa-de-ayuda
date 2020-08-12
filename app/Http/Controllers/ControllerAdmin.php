<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\hd_users;
use App\hd_reg_ticket;
use App\hd_estado;
use App\hd_privilegio;
use App\hd_comentario;
use App\hd_prioridad;
use Auth;
use Mail;
use Carbon\Carbon;
use Response;
class ControllerAdmin extends Controller
{
    public function ticket()//Dashboard
     {
     $comentarios=DB::table('hd_comentarios')->
      leftjoin('hd_users','hd_users.id','hd_comentarios.nUser_id')->
      leftjoin('hd_reg_tickets','hd_reg_tickets.id','hd_comentarios.nFolio_ticket')->
      select('hd_users.cNombre','hd_comentarios.cComentarios','hd_comentarios.nFolio_ticket','hd_comentarios.created_at','hd_users.badmin','hd_reg_tickets.nFolio_Users','hd_reg_tickets.nAtendio')->where('nAtendio',auth()->user()->id)->where('badmin',0)->get();
      $count=$comentarios->count();
      $hd_reg_tickets =DB::table('hd_reg_tickets')->
          leftjoin('hd_users','hd_users.id','=','hd_reg_tickets.nFolio_Users')->
          leftjoin('hd_estado','hd_estado.id','=','hd_reg_tickets.cEstado')->
          leftjoin('hd_categorias','hd_categorias.id','=','hd_reg_tickets.cCategoria')->
          leftjoin('hd_sistemas','hd_sistemas.id','=','hd_reg_tickets.cSistema')->
          leftjoin('hd_prioridad','hd_prioridad.id','=','hd_reg_tickets.cPrioridad')->
          select('hd_reg_tickets.id','hd_reg_tickets.cTitulo','hd_categorias.cCategorias','hd_sistemas.cSistema','hd_prioridad.cNPrioridad','hd_users.cNombre','hd_users.cApellidos','hd_reg_tickets.created_at','hd_estado.ccEstado','hd_reg_tickets.nAtendio')->where('hd_reg_tickets.nAtendio',Auth()->user()->id)->get();
            return view('ticketdmin')->with('hd_reg_tickets',$hd_reg_tickets)->
            with('comentarios',$comentarios)->with('contar',$count);
     }
     public function buscarEntre(Request $request)//Dashboard
     {
      $comentarios=DB::table('hd_comentarios')->
      leftjoin('hd_users','hd_users.id','hd_comentarios.nUser_id')->
      leftjoin('hd_reg_tickets','hd_reg_tickets.id','hd_comentarios.nFolio_ticket')->
      select('hd_users.cNombre','hd_comentarios.cComentarios','hd_comentarios.nFolio_ticket','hd_comentarios.created_at','hd_users.badmin','hd_reg_tickets.nFolio_Users','hd_reg_tickets.nAtendio')->where('nAtendio',auth()->user()->id)->where('badmin',0)->get();
        $desde=$request->only('desde');
        $hasta=$request->only('hasta');
       $hd_reg_tickets =DB::table('hd_reg_tickets')->
          leftjoin('hd_users','hd_users.id','=','hd_reg_tickets.nFolio_Users')->
          leftjoin('hd_estado','hd_estado.id','=','hd_reg_tickets.cEstado')->
          leftjoin('hd_categorias','hd_categorias.id','=','hd_reg_tickets.cCategoria')->
          leftjoin('hd_sistemas','hd_sistemas.id','=','hd_reg_tickets.cSistema')->
          leftjoin('hd_prioridad','hd_prioridad.id','=','hd_reg_tickets.cPrioridad')->
          select('hd_reg_tickets.id','hd_reg_tickets.cTitulo','hd_categorias.cCategorias','hd_sistemas.cSistema','hd_prioridad.cNPrioridad','hd_users.cNombre','hd_users.cApellidos','hd_reg_tickets.created_at','hd_estado.ccEstado','hd_reg_tickets.nAtendio')->whereBetween('hd_reg_tickets.created_at',[$desde,$hasta])->where('hd_reg_tickets.nAtendio',Auth()->user()->id)->get();
            return view('ticketdmin')->with('hd_reg_tickets',$hd_reg_tickets)->with('comentarios',$comentarios);;
     }
    public  function auser()
     {
       $comentarios=DB::table('hd_comentarios')->
      leftjoin('hd_users','hd_users.id','hd_comentarios.nUser_id')->
      leftjoin('hd_reg_tickets','hd_reg_tickets.id','hd_comentarios.nFolio_ticket')->
      select('hd_users.cNombre','hd_comentarios.cComentarios','hd_comentarios.nFolio_ticket','hd_comentarios.created_at','hd_users.badmin','hd_reg_tickets.nFolio_Users','hd_reg_tickets.nAtendio')->where('nAtendio',auth()->user()->id)->where('badmin',0)->get();
      $count=$comentarios->count();
      $hd_privilegios=hd_privilegio::all();
      $contar=hd_users::all()->count();
      $hd_users=DB::table('hd_users')->
      leftjoin('hd_privilegios','hd_privilegios.id','=','hd_users.badmin')->
      select('hd_users.id','hd_users.cNombre','hd_users.cApellidos','hd_users.nEmpleado','hd_users.email','hd_users.badmin','hd_privilegios.cPrivilegios','hd_users.password')->get();
      return view('ausers')->with('hd_privilegios',$hd_privilegios)->with('contara',$contar)->with('hd_users',$hd_users)->with('comentarios',$comentarios)->with('contar',$count);
     }
       public  function infoauser($id)
     {
      $hd_privilegios=hd_privilegio::all();
      $contar=hd_users::all()->count();
      $hd_users=DB::table('hd_users')->
      leftjoin('hd_privilegios','hd_privilegios.id','=','hd_users.badmin')->
      select('hd_users.id','hd_users.cNombre','hd_users.cApellidos','hd_users.nEmpleado','hd_users.email','hd_users.badmin','hd_privilegios.cPrivilegios','hd_users.password')->where('hd_users.id',$id)->get();
      return Response::json($hd_users,200);
     }

    public function scopeUsuario(Request $request)
    {

      $comentarios=DB::table('hd_comentarios')->
      leftjoin('hd_users','hd_users.id','hd_comentarios.nUser_id')->
      leftjoin('hd_reg_tickets','hd_reg_tickets.id','hd_comentarios.nFolio_ticket')->
      select('hd_users.cNombre','hd_comentarios.cComentarios','hd_comentarios.nFolio_ticket','hd_comentarios.created_at','hd_users.badmin','hd_reg_tickets.nFolio_Users','hd_reg_tickets.nAtendio')->where('nAtendio',auth()->user()->id)->where('badmin',0)->get();
      $count=$comentarios->count();
       $hd_privilegios=hd_privilegio::all();
       $hd_users =DB::table('hd_users')->
       leftjoin('hd_privilegios','hd_privilegios.id','=','hd_users.badmin')->
       select('hd_users.id','hd_users.cNombre','hd_users.cApellidos','hd_users.nEmpleado','hd_users.email','hd_users.badmin','hd_privilegios.cPrivilegios','hd_users.password')->
        where(DB::raw('CONCAT(cNombre," ",cApellidos)'),'LIKE', "%{$request->input('buscar')}%")
        ->orWhere('email', 'LIKE', "%{$request->input('buscar')}%")
        ->orWhere('cApellidos', 'LIKE', "%{$request->input('buscar')}%")
        ->orWhere('nEmpleado', 'LIKE', "%{$request->input('buscar')}%")
        ->orWhere('cPrivilegios', 'LIKE', "%{$request->input('buscar')}%")
        ->paginate(5);


    return view('ausers')->with('hd_users',$hd_users)->with('hd_privilegios',$hd_privilegios)->with('contara',$contar)->with('comentarios',$comentarios)->with('contar',$count);
  }

     public function detalleticket($id ,Request $request)
     {
      $comentarios=DB::table('hd_comentarios')->
      leftjoin('hd_users','hd_users.id','hd_comentarios.nUser_id')->
      leftjoin('hd_reg_tickets','hd_reg_tickets.id','hd_comentarios.nFolio_ticket')->
      select('hd_users.cNombre','hd_comentarios.cComentarios','hd_comentarios.nFolio_ticket','hd_comentarios.created_at','hd_users.badmin','hd_reg_tickets.nFolio_Users','hd_reg_tickets.nAtendio')->where('nAtendio',auth()->user()->id)->where('badmin',0)->get();
      $count=$comentarios->count();
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
         'hd_sistemas.cSistema','hd_reg_tickets.cPrioridad','hd_prioridad.cNPrioridad','hd_reg_tickets.cDesProblema','hd_reg_tickets.created_at','hd_estado.id as idestado','hd_estado.ccEstado','hd_users.cNombre')->
      where('hd_reg_tickets.id',$id)->get();
      if($request->ajax()){
        return  Response::json($hd_reg_tickets,200);
      }
      return view('detalleticket')->with('hd_reg_tickets',$hd_reg_tickets)->
      with('hd_estado',$hd_estado)->with('hd_comentarios',$hd_comentarios)->
      with('comentarios',$comentarios)->with('contar',$count);
     }
     public function eliminarticket($id)
     {
     $hd_reg_tickets =hd_reg_ticket::where('id',$id)->delete();
     return redirect('aticket')->with('success','Registro eliminado satisfactoriamente');
     }
     public function actualizarestado(Request $request,$id)
     {
      $hd_estado=hd_estado::all();
      $datos=
      $hd_reg_tickets =DB::table('hd_reg_tickets')->
      leftjoin('hd_users','hd_users.id','=','hd_reg_tickets.id')->
      leftjoin('hd_estado','hd_estado.id','=','hd_reg_tickets.cEstado')->
      select('hd_reg_tickets.id','hd_reg_tickets.cTitulo','hd_reg_tickets.cCategoria','hd_reg_tickets.cSistema','hd_reg_tickets.cPrioridad','hd_reg_tickets.created_at','hd_estado.id as idestado','hd_estado.ccEstado')->
      where('hd_reg_tickets.id',$id)->get();
      $hd_reg_tickets=hd_reg_ticket::find($id)->update($request->only('cEstado'));
        if($hd_reg_tickets){
          $correoa=DB::table('hd_reg_tickets')->
          leftjoin('hd_users','hd_users.id','=','hd_reg_tickets.nFolio_Users')->
          select('hd_users.email')->where('hd_reg_tickets.id',$id)->get();
           \Mail::to($correoa)->send(new \App\Mail\mailActualizar());
           return back()->withInput()->with('hd_reg_tickets',$hd_reg_tickets)->
           with('hd_estado',$hd_estado);
          }
         }

       public function actualizaUsuarios(Request $request,$id)
       {
        $datos=$request->only(['cNombre','cApellidos','email','password','badmin','cPrivilegios']);
        $datos['password'] = bcrypt($datos['password']);
        $contar=hd_users::all()->count();
        $hd_privilegios=hd_privilegio::all();
        $hd_users =DB::table('hd_users')->
        leftjoin('hd_privilegios','hd_privilegios.id','=','hd_users.badmin')->
        select('hd_users.id','hd_users.cNombre','hd_users.cApellidos','hd_users.nEmpleado','hd_users.email','hd_users.badmin','hd_privilegios.cPrivilegios')->
        where('hd_users.id',$id)->get();
        $this->validate($request, [
      'email'   => 'required|email|unique:hd_users,email,'.$id,
        ]);
        $actualizar=hd_users::find($id)->update($datos);
        return redirect('/auser')->with('hd_users',$hd_users)->with('hd_privilegios',$hd_privilegios)->with('contar',$contar);
       }
     public function correo() //PASAR DATOS A LA VISTA DEL TICKET POR EMAIL
     {
      $hd_reg_tickets =DB::table('hd_reg_tickets')->
      leftjoin('hd_users','hd_users.id','=','hd_reg_tickets.nFolio_Users')->leftjoin('hd_estado','hd_estado.id','=','hd_reg_tickets.cEstado')->select('hd_users.cNombre','hd_reg_tickets.id','hd_reg_tickets.cTitulo','hd_reg_tickets.cCategoria','hd_reg_tickets.cSistema','hd_reg_tickets.cPrioridad','hd_reg_tickets.created_at','hd_estado.ccEstado')
      ->where('hd_reg_tickets.nFolio_Users','=',Auth::user()->id)->
      orderBy('created_at', 'desc')->take(1)->get();
      return view('notificaciones') ->with('hd_reg_tickets',$hd_reg_tickets);      
     }  
      public  function buscarTickets(Request $request)
    {
      $campo=$request->only('id');
      $hd_reg_tickets=hd_reg_ticket::where('id',$campo)->get();
      return dd($hd_reg_tickets);
    }
     public  function resTicket(Request $request,$id)
    {
      $hd_estado=hd_estado::all();
      $hd_reg_tickets =DB::table('hd_reg_tickets')->
      leftjoin('hd_users','hd_users.id','=','hd_reg_tickets.id')->
      leftjoin('hd_estado','hd_estado.id','=','hd_reg_tickets.cEstado')->
      select('hd_reg_tickets.id','hd_reg_tickets.cTitulo','hd_reg_tickets.cCategoria','hd_reg_tickets.cSistema','hd_reg_tickets.cPrioridad','hd_reg_tickets.cDesProblema','hd_reg_tickets.created_at','hd_estado.id as idestado','hd_estado.ccEstado')->
      where('hd_reg_tickets.id',$id)->get();
      $nuevos=hd_reg_ticket::find($id)->update($request->only('cRespuesta'));
      return view('detalleticket')->with('hd_reg_tickets',$hd_reg_tickets)->with('hd_estado',$hd_estado);
    }
    public  function gReportes(){
    $comentarios=DB::table('hd_comentarios')->
      leftjoin('hd_users','hd_users.id','hd_comentarios.nUser_id')->
      leftjoin('hd_reg_tickets','hd_reg_tickets.id','hd_comentarios.nFolio_ticket')->
      select('hd_users.cNombre','hd_comentarios.cComentarios','hd_comentarios.nFolio_ticket','hd_comentarios.created_at','hd_users.badmin','hd_reg_tickets.nFolio_Users','hd_reg_tickets.nAtendio')->where('nAtendio',auth()->user()->id)->where('badmin',0)->get();
      $count=$comentarios->count();
      $estado=hd_estado::all();
      $prioridad=hd_prioridad::all();
     return view('gReportes')->with('hd_estado',$estado)->with('hd_prioridad',$prioridad)->with('comentarios',$comentarios)->with('contar',$count);
    }
    public function cReportes(Request $request)
    {
     
      $date = Carbon::now();
     $date = $date->format('Y-m-d');
     $fechaN=date("d-m-Y");
     $estado=hd_estado::all();
     $prioridad=hd_prioridad::all();
     $contar=$hd_reg_tickets=hd_reg_ticket::where('cEstado',1)->
     where('created_at',$date)->
     where('cPrioridad',1)->get()->count();
     $hd_reg_tickets=db::table('hd_reg_tickets')->leftjoin('hd_users','hd_users.id','=','hd_reg_tickets.nFolio_Users')->leftjoin('hd_estado','hd_estado.id','=','hd_reg_tickets.cEstado')->select('hd_reg_tickets.id','hd_reg_tickets.id','hd_reg_tickets.cTitulo','hd_reg_tickets.cCategoria','hd_estado.ccEstado','hd_reg_tickets.cSistema','hd_reg_tickets.cPrioridad','hd_users.cNombre','hd_reg_tickets.created_at')->where('cEstado',1)->where('hd_reg_tickets.created_at',$date)->where('cPrioridad',1)->get();
        return view('reporteD')->with('hd_estado',$estado)->with('hd_prioridad',$prioridad)->with('fechaN',$fechaN)->with('contar',$contar)->with('hd_reg_tickets',$hd_reg_tickets)->with('comentarios',$comentarios);
    }
}