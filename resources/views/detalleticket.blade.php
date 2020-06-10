  @include('layout.head')
  @include('layout.barranav')
  @include('layout.sideadmin')
 <div class="panel panel-default moverp " style="height:25%; width:73%;">
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
        @foreach($hd_reg_tickets as $hd_reg_ticket)
        <form method="post" action="{{route('actualizar',$hd_reg_ticket->id)}}">
        {{csrf_field()}}
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
      <th scope="col">ACTUALIZAR</th>
      <th scope="col">ACCIONES</th>
         </tr>
       </thead>
       <tbody>
         <tr>
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
         <td>
          <select name="cEstado" id="cEstado">
          <option value="{{$hd_reg_ticket->id}}"></option>
           @foreach($hd_estado as $hd_estado)
          <option value="{{$hd_estado->id}}">{{$hd_estado->ccEstado}}</option>
          @endforeach
          </select>
        </td>
          <td><button type="submit" class="forma btn-dark"><i class="fa fa-edit"></i></button></td>
          </form>
        </tr>
       </tbody>
     </table>
</div>
</div>
 <form method="post" action="{{route('addcomen',$hd_reg_ticket->id)}}">
      {{csrf_field()}}
<div class="comentarios" style="border: none; right:50%; overflow-y:scroll; height:16%; margin-top:8%;">
  @foreach($hd_comentarios as $hd_comentarios)
  @if($hd_comentarios->badmin==1)
   <div class="alert alert-success" style="margin-bottom: 8px; width: 40%; position: relative; margin-left: 60%;">
<div class="content" style="height:0.2%;">
  <div style="font-size:1em; position: relative;bottom:7px;" >
 {{date('H:i', strtotime($hd_comentarios->created_at))}} {{$hd_comentarios->cNombre}}:{{$hd_comentarios->cComentarios}}
</div>
</div>
</div>
 @else
  <div class="alert alert-info" style="margin-bottom: 8px; width: 40%;">
<div class="content" style="height:0.2%;">
  <div style="font-size:1em; position: relative;bottom:7px;" >
{{date('H:i', strtotime($hd_comentarios->created_at))}}  {{$hd_comentarios->cNombre}}:{{$hd_comentarios->cComentarios}}
</div>
</div>
</div>
 @endif
  @endforeach
</div>
@endforeach
<div class="panel panel-default moverp " style="height:35%; width:73%; margin-top:15px;">
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
    <textarea name="cComentarios" style="resize: none; color: black; border: none;"cols="135" rows="6"></textarea>
    <div class="btncom">
    <button type="submit"  class="btn btn-dark"><i class="fa fa-save"></i> Guardar</button>
<a href="{{url('/panel')}}" class="btn btn-dark"><i class="fa fa-window-close"  aria-hidden="true"></i> Cancelar</a>
</div>
</form>
   </div>
</div>