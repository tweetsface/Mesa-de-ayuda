@include('layout.head')
@include('layout.barranav')
@include('layout.sidebaruser')
 <div class="tabladetalles">
  <table class="table table-bordered table-hover">
  <thead class="thead-dark" >
    <tr>
      <th scope="col">#</th>
      <th scope="col">TITULO</th>
      <th scope="col">CATEGORIA</th>
      <th scope="col">SISTEMA</th>
      <th scope="col">PRIORIDAD</th>
      <th scope="col">DESCRIPCION</th>
      <th scope="col">FECHA</th>
      <th scope="col">ESTADO</th>
      <th scope="col">Respuesta Administrador</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    	  @foreach($hd_reg_tickets as $hd_reg_ticket)
       <form method="post" action="{{route('actcomen',$hd_reg_ticket->id)}}">
       	{{csrf_field()}}
      <tr>
         <td>{!! $hd_reg_ticket->id!!}</td>
         <td>{!! $hd_reg_ticket->cTitulo !!}</td>
         <td>{!! $hd_reg_ticket->cCategoria !!}</td>
         <td>{!! $hd_reg_ticket->cSistema !!}</td>
         <td>{!! $hd_reg_ticket->cPrioridad !!}</td>
         <td>{!! $hd_reg_ticket->cDesProblema !!}</td>
         <td>{!!$hd_reg_ticket->created_at!!}</td>
         <td>{!!$hd_reg_ticket->ccEstado!!}</td>
         <td>{!!$hd_reg_ticket->cRespuesta!!}</td>
      </tr>
     

  </tbody>
</table>
</div>
<div class="contenedor">
  <span class="lblres">Mensajes Enviados:</span>
  <div class="respuesta">
  <textarea  style="overflow-y=scroll; resize: none; color: black; " cols="135" rows="4" >{!!$hd_reg_ticket->cComentarios!!}</textarea>
</div>
<div class="contenedor2">
  <span class="lblcom">Comentarios:</span>
  <div class="comentarios">
  <textarea name="cComentarios" style="resize: none; color: black;"cols="135" rows="8"></textarea>
</div>
<div class="btncom">
<button type="submit"  class="btn btn-dark">Guardar</button>
<button type="button" name="cancelar" class="btn btn-dark">Cancelar</button>
  </form>
   @endforeach
</div>

</div>
</form>

</div>


