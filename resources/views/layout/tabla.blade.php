<div class="tablausuarios">
 <table class="table">
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
      <th scope="col">ACCIONES</th>
    </tr>
  </thead>
  <tbody>
      @foreach($hd_reg_tickets as $hd_reg_ticket)
      <form method="get" action="{{route('verTicketu',$hd_reg_ticket->id)}}">
      <tr>
         <td>{!! $hd_reg_ticket->id!!}</td>
         <td>{!! $hd_reg_ticket->cTitulo !!}</td>
         <td>{!! $hd_reg_ticket->cCategoria !!}</td>
         <td>{!! $hd_reg_ticket->cSistema !!}</td>
         <td>{!! $hd_reg_ticket->cPrioridad !!}</td>
         <td>{!! $hd_reg_ticket->cDesProblema !!}</td>
         <td>{!!$hd_reg_ticket->created_at!!}</td>
         <td>{!!$hd_reg_ticket->ccEstado!!}</td>
         <td>
          <button type="submit"  class="boton">REVISAR</button></td>
      </tr>
      </form>
            @endforeach
  </tbody>
</table>
</div>
