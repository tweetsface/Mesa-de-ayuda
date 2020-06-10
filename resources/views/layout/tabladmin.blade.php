<div class="tabladmin">
  <table class="table  movera">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">TITULO</th>
      <th scope="col">CATEGORIA</th>
      <th scope="col">PRIORIDAD</th>
      <th scope="col">FECHA</th>
      <th scope="col">EMPLEADO</th>
      <th scope="col">ACCIONES</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @if(!empty($hd_reg_tickets))
      @foreach($hd_reg_tickets as $hd_reg_ticket)
      <tr>
         <td>{!! $hd_reg_ticket->id!!}</td>
         <td>{!! $hd_reg_ticket->cTitulo !!}</td>
         <td>{!! $hd_reg_ticket->cCategorias !!}</td>
         <td>{!! $hd_reg_ticket->cNPrioridad !!}</td>
         <td>{!!$hd_reg_ticket->created_at!!}</td>
         <td>{!!$hd_reg_ticket->cNombre!!} {!!$hd_reg_ticket->cApellidos!!} </td>
          <td>
          <form method="get" action="{{route('verticket',$hd_reg_ticket->id) }}">
               {{ csrf_field() }}
          <button type="submit">REVISAR</button>
        </form>
        </td>
      </tr>
        @endforeach
        @else
        <div class="alerta">
        <div class="alert alert-secondary text-center">
              <h4>AVISO DEL SISTEMA</h4>
             <p>No se encuentran registros para este periodo.</p>
         </div>
        </div>
       @endif
  </tbody>
</table>
</div>