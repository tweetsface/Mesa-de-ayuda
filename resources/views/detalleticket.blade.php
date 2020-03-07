  @include('layout.head')
  @include('layout.barranav')
  @include('layout.sideadmin')
  <div class="tabladetalle" >
  <table class="table table-bordered table-hover" style="text-align: center;" >
  <thead class="thead-dark"   >
    <tr>
      <th scope="col">#</th>
      <th scope="col">TITULO</th>
      <th scope="col">CATEGORIA</th>
      <th scope="col">SISTEMA</th>
      <th scope="col">PRIORIDAD</th>
      <th scope="col">DESCRIPCION</th>
      <th scope="col">FECHA</th>
      <th scope="col">ESTADO</th>
      <th scope="col">ACTUALIZAR ESTADO</th>
      <th scope="col">ACCIONES</th>
      <th scope="col">COMENTARIOS USUARIO</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($hd_reg_tickets as $hd_reg_ticket)
      <tr>
         <td>{!! $hd_reg_ticket->id!!}</td>
         <td>{!! $hd_reg_ticket->cTitulo !!}</td>
         <td>{!! $hd_reg_ticket->cCategoria !!}</td>
         <td>{!! $hd_reg_ticket->cSistema !!}</td>
         <td>{!! $hd_reg_ticket->cPrioridad !!}</td>
         <td>{!! $hd_reg_ticket->cDesProblema !!}</td>
         <td>{!!$hd_reg_ticket->created_at!!}</td>
         <td>{!!$hd_reg_ticket->ccEstado!!}</td>

         <form method="post" action="{{route('actualizar',$hd_reg_ticket->id) }}">
          {{ csrf_field() }}
         <td>
          <div class="estados">
          <select name="cEstado">
            @foreach($hd_estado as $hd_estado)
            <option value="{{$hd_estado->id}}">{{$hd_estado->ccEstado}}</option>
            @endforeach
          </select>
          </div>
           </td>
           <td><button type="submit" name="actualizar" class="boton">Actualizar</button>
            </td>
            <td><textarea cols="15" rows="6"style="overflow: auto; resize: none;">{!!$hd_reg_ticket->cComentarios!!}</textarea></td>   
         </form>
      </tr>
       
  </tbody>
</table>
</div>
<form method="post" action="{{route('resTicket',$hd_reg_ticket->id)}}">
   {{ csrf_field() }}
<div class="contenedor">
  <span class="lblres">Respuesta:</span>
  <div class="respuesta">
  <textarea  style="overflow-y=scroll; resize: none; color: black; " cols="135" rows="4" >{!!$hd_reg_ticket->cRespuesta!!}</textarea>
</div>
<div class="contenedor2">
  <span class="lblcom">Comentarios:</span>
  <div class="comentarios">
  <textarea name="cRespuesta" style="resize: none; color: black;"cols="135" rows="8"></textarea>
</div>
<div class="btncom">
<button type="submit" name="actualizar" class="btn btn-dark">Guardar</button>
<a href="{{url('aticket')}}" class="btn btn-dark">Cancelar</a>
</div>
    @endforeach
</form>
</div>


