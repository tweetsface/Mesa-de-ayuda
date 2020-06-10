@include('layout.head')
@include('layout.barranav')
@include('layout.sidebaruser')
<div class="panel panel-default moverp " style="height:25%; max-width:73%;">
  <div class="panel-heading" style="background-color: #4ECDC4; color: white; font-weight: bold; font-size:1.5em;">Detalles</div>
   <div class="panel-body">
     @if(count($errors)>0)
     <div class="alert alert-danger">
       <ul>
         @foreach($errors->all() as $error)
         <li>{{$error}}</li>
         @endforeach
       </ul>
     </div>
     @endif
     <table class="table">
       <thead style="text-align: center;">
         <tr>
      <th scope="col">#</th>
      <th scope="col">TITULO</th>
      <th scope="col">CATEGORIA</th>
      <th scope="col">SISTEMA</th>
      <th scope="col">PRIORIDAD</th>
      <th scope="col">DESCRIPCION</th>
      <th scope="col">FECHA</th>
      <th scope="col">ESTADO</th>
         </tr>
       </thead>
       <tbody>
         <tr>@foreach($hd_reg_tickets as $hd_reg_ticket)
       <form method="post" action="{{route('addcomen',$hd_reg_ticket->id)}}">
        {{csrf_field()}}
         </tr>
         <td>{!! $hd_reg_ticket->id!!}</td>
         <td>{!! $hd_reg_ticket->cTitulo !!}</td>
         <td>{!! $hd_reg_ticket->cCategorias !!}</td>
         <td>{!! $hd_reg_ticket->cSistema !!}</td>
         <td>{!! $hd_reg_ticket->cNPrioridad !!}</td>
         <td>{!! $hd_reg_ticket->cDesProblema !!}</td>
         <td><div class="label label-default">
           {{date('d-m-Y', strtotime($hd_reg_ticket->created_at))}}
         </div></td>
         <td>{!!$hd_reg_ticket->ccEstado!!}</td>
       </tbody>
     </table>
</div>
</div>

<div class="comentarios" style="border: none; right:50%; overflow-y:scroll; height:18%; margin-bottom:1%;">
@foreach($hd_comentarios as $hd_comentarios)
  @if($hd_comentarios->badmin==1)
<div class="alert alert-info" style="margin-bottom: 8px; width: 40%; position: relative; margin-left: 60%;">
<div class="content" style="height:0.2%;">
  <div style="font-size:1em; position: relative;bottom:7px;" >
  {{date('H:i', strtotime($hd_comentarios->created_at))}} 
  {{$hd_comentarios->cNombre}}:{{$hd_comentarios->cComentarios}}
</div>
</div>
</div>
@else
  <div class="alert alert-success" style="margin-bottom: 8px; width: 40%;">
<div class="content" style="height:0.2%;">
  <div style="font-size:1em; position: relative;bottom:7px;" >
{{date('H:i', strtotime($hd_comentarios->created_at))}} 
{{$hd_comentarios->cNombre}}:{{$hd_comentarios->cComentarios}}
</div>
</div>
</div>
@endif
  @endforeach
</div>
@endforeach
<div class="panel panel-default moverp " style="height:35%; width:73%;">
  <div class="panel-heading" style="background-color: #4ECDC4; color: white; font-weight: bold; font-size:1.5em;">Comentarios</div>
   <div class="panel-body">
     @if(count($errors)>0)
     <div class="alert alert-danger">
       <ul>
         @foreach($errors->all() as $error)
         <li>{{$error}}</li>
         @endforeach
       </ul>
     </div>
     @endif
    <textarea name="cComentarios"  style="resize: none; color: black; border: none; margin-bottom: 8px; width: 100%;"cols="135" rows="6" ></textarea>
    <button type="submit"  class="btn btn-dark">Guardar</button>
<a href="{{url('/panel')}}" class="btn btn-dark">Cancelar</a>
      </form>
   </div>
</div>
@include('layout.modalticket')