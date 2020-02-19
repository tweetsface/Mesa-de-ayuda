  @include('layout.head')
  <div class="table-wrapper-scroll-y my-custom-scrollbar">
  <table class="table table-bordered table-hover">
  <thead class="thead-dark" >
    <tr>
      <th scope="col">#</th>
      <th scope="col">TITULO</th>
      <th scope="col">CATEGORIA</th>
      <th scope="col">PRIORIDAD</th>
      <th scope="col">FECHA</th>
      <th scope="col">EMPLEADO</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($hd_reg_tickets as $hd_reg_ticket)
      <tr>
         <td>{!! $hd_reg_ticket->id!!}</td>
         <td>{!! $hd_reg_ticket->cTitulo !!}</td>
         <td>{!! $hd_reg_ticket->cCategoria !!}</td>
         <td>{!! $hd_reg_ticket->cPrioridad !!}</td>
         <td>{!!$hd_reg_ticket->created_at!!}</td>
                  <td>{!!$hd_reg_ticket->cNombre!!} {!!$hd_reg_ticket->cApellidos!!} </td>
         <td>
          <form method="get" action="{{route('verticket',$hd_reg_ticket->id) }}">
          <button type="submit">REVISAR</button>
          <button type="submit">ELIMINAR</button>
        </td>
      </form>
      </tr>
        @endforeach
  </tbody>
</table>
</div>