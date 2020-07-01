@include('layout.head')
@include('layout.barranav')
@include('layout.sidebaruser')

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
         <tr>
         <td>{!! $hd_reg_ticket->id!!}
          <input type="hidden"  id="id" name="id" value="{!! $hd_reg_ticket->id!!}"></td>
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
         <td><div class="label label-primary">
           {{date('d-m-Y', strtotime($hd_reg_ticket->created_at))}}
         </div></td>
         <td>{!!$hd_reg_ticket->ccEstado!!}</td>
        </tr>
       </tbody>
     </table>
</div>
</div>
<div class="panel panel-default moverp " style="height:55%; width:73%; border: none;background-color:#F3F3F3; ">
  <div class="panel-heading" style="background-color:#47B9C2;color: white;font-weight:bold; font-size:1.3em;">RESPUESTA TICKET</div>
   <div class="panel-body">
    <div class="well" style="background-color: white; height:280px;">
        <form method="post">
      <label for="cComentarios">Agregar Respuesta:</label>
    <textarea id="cComentarios" name="cComentarios" style="resize: none; color: black; border:1px solid;outline:none;"cols="130" rows="3"></textarea>
      <div class="btndetalles" style="position: absolute; top:280px; left:
      670px;">
    <button type="button"  id="enviarDatos"  class="btn btn-dark"><i class="fa fa-save"></i> Enviar</button>
<a href="{{url('/panel')}}" id="btncan" class="btn btn-dark"><i class="fa fa-window-close"  aria-hidden="true"></i> Cancelar
</a>
 <button class="btn btn-dark" id="btncol" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-commenting"  aria-hidden="true"></i> Mensajes
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
         <div class="well" style="background-color: white; height:380px; overflow-y: scroll; ">
      @foreach($hd_comentarios as $hd_comentarios)
  @if($hd_comentarios->badmin==1)
   <div class="card" style="margin-bottom: 8px; width:200px; position: relative; margin-left: 60%; height:30px; border-radius:10px; background-color:#6CDEDB;">
<div class="content" style="height:0.2%;">
  <div style="font-size:1em; position: relative;bottom:7px; top:5px;" >
     <span style="color:white; font-weight:bold;">{{date('H:i', strtotime($hd_comentarios->created_at))}} {{$hd_comentarios->cNombre}}:{{$hd_comentarios->cComentarios}}</span>
     </span>
</div>
</div>
</div>
 @else
  <div class="card" style="margin-bottom: 8px; width:200px; height:30px; border-radius:10px; background-color: gray;">
<div class="content" style="height:0.2%;">
  <div style="font-size:1em; position: relative;bottom:7px;top:5px; " >
 <span style="color: white; font-weight: bold;">{{date('H:i', strtotime($hd_comentarios->created_at))}} {{$hd_comentarios->cNombre}}:{{$hd_comentarios->cComentarios}}</span>
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
