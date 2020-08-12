  @include('layout.head')
  @include('layout.barranav')
  @include('layout.sideadmin')
 <div class="panel panel-default moverp " style="height:25%; width:73%; border: none;">
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
        <form method="post"class="form-horizantal" action="{{route('actualizar',$hd_reg_ticket->id)}}" >
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
      <th scope="col">ESTADO</th>
      <th scope="col">ACTUALIZAR</th>
      <th scope="col">FECHA</th>
      <th scope="col">ACCIONES</th>
         </tr>
       </thead>
       <tbody>
         <tr>
         <td>{!! $hd_reg_ticket->id!!}
          <input type="hidden" id="id" name="id" value="{!! $hd_reg_ticket->id!!}"></td>
         <td>{!! $hd_reg_ticket->cTitulo !!}</td>
         <td>{!! $hd_reg_ticket->cCategorias !!}</td>
         <td>{!! $hd_reg_ticket->cSistema !!}</td>
         <td> @if($hd_reg_ticket->cNPrioridad=="ALTA")
          <span class="label label-danger"> {!! $hd_reg_ticket->cNPrioridad !!}</span>
          @elseif($hd_reg_ticket->cNPrioridad=="MEDIA")
          <span class="label label-warning"> {!! $hd_reg_ticket->cNPrioridad !!}</span>
           @elseif($hd_reg_ticket->cNPrioridad=="BAJA")
          <span class="label label-primary"> {!! $hd_reg_ticket->cNPrioridad !!}</span>
          @endif</td>
         <td>{!! $hd_reg_ticket->cDesProblema !!}</td>
         <td>{!!$hd_reg_ticket->ccEstado!!}</td>
         <td>
          <select name="cEstado" id="cEstado">
          <option value="{{$hd_reg_ticket->id}}"></option>
           @foreach($hd_estado as $hd_estado)
          <option value="{{$hd_estado->id}}">{{$hd_estado->ccEstado}}</option>
          @endforeach
          </select>
        </td>
        <td><div class="label label-primary">
           {{date('d-m-Y', strtotime($hd_reg_ticket->created_at))}}
         </div></td>
          <td><button type="submit" class="btn btn-dark">Modificar</button></td>
          </form>
        </tr>
       </tbody>
     </table>
</div>
</div>
<div class="panel panel-default moverp " style="height:55%; width:73%; border: none;background-color:#F3F3F3; ">
  <div class="panel-heading" style="background-color:#47B9C2;color: white;font-weight:bold; font-size:1.3em;">RESPUESTA TICKET</div>
   <div class="panel-body">
    <div class="well" style="background-color: white; height:280px; ">
      <span>Agregar Respuesta:</span>
    <textarea  class="form-control" id="cComentarios"name="cComentarios" style="resize: none; color: black; border:1px solid;outline:none; width:85%;position: relative; top:15px;"cols="100" rows="6"></textarea>
      <div class="btndetalles" style="position: absolute; top:280px; left:
      650px;">
    <button type="button"  id="enviarDatos" class="btn btn-dark" style="width:100px;"><i class="fa fa-save" ></i> Enviar</button>
 <button class="btn btn-dark" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="outline: none;"><i class="fa fa-commenting"  aria-hidden="true"></i> Mensajes
    </button>
</div>
</form>
@endforeach
    </div>
  </div>
   </div>
 <div class="collapse" id="collapseExample">
<div class="panel panel-default moverp " style="height:55%; width:73%; border: none;background-color:#F3F3F3; position: absolute; ">
    <div class="panel-body">
      <div class="panel-heading" style="background-color:#47B9C2;color: white;font-weight:bold; font-size:1.3em;">
      Lista de mensajes
        </div>
         <div class="well" style="background-color: white; height:380px; overflow-y: scroll;">
      @foreach($hd_comentarios as $hd_comentarios)
  @if($hd_comentarios->badmin==1)
   <div  style="margin-bottom: 8px; width:200px; position: relative; margin-left: 60%; height:30px; border-radius:10px; background-color:white; ">
<div class="content" style="height:0.2%;">
  <div style="font-size:1em; position: relative;bottom:7px; top:5px; left:190px;" >
     <span style="color:white; font-weight:bold;background:#6CDEDB;overflow-wrap:break-word; display: inline-block; width: 13em;left:30px; border-radius:10px;">{{date('H:i', strtotime($hd_comentarios->created_at))}} {{$hd_comentarios->cNombre}}:{{$hd_comentarios->cComentarios}}</span>
     </span>
</div>
</div>
</div>
 @else
  <div style="margin-bottom: 8px; width:200px; height:30px; border-radius:10px; background-color:white;">
<div class="content" style="height:0.2%;">
  <div style="font-size:1em; position: relative;bottom:7px;top:5px; " >
 <span style="color: white; font-weight: bold; background:gray;overflow-wrap:break-word; display: inline-block; width: 13em; border-radius:10px;">{{date('H:i', strtotime($hd_comentarios->created_at))}} {{$hd_comentarios->cNombre}}:{{$hd_comentarios->cComentarios}}</span>
</div>
</div>
</div>
 @endif
  @endforeach
</div>
</div>
</div>
</div>
<script type="text/javascript">
 $('#enviarDatos').click( function (e) {
      e.preventDefault();
      $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
     }
    }); 
       var cComentarios,id;
       id=document.getElementById('id').value;
       cComentarios=document.getElementById('cComentarios').value;
       if (cComentarios!=""){
        $.ajax({
          url:"{{asset('ticket/view')}}"+"/"+id+"/"+"agregar",
          data:{'cComentarios':cComentarios},
          type:'post',
          success: function (response) {
            Swal.fire('Mensaje Enviado','Se ha enviado tu mensaje exitosamente','success')
              
          },
          statusCode: {
             404: function() {
                alert('web not found');
             }
          },
          error:function(x,xs,xt){
             Swal.fire('Ha ocurrido un error',"Ocurrio un error al enviar el mensaje,intente nuevamente",'error')
          }
})}else{
              Swal.fire('Atencion','No se permiten campos vacios','info')
        }
         });
 
 </script>
