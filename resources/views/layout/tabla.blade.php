  @include('layout.head')
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">TITULO</th>
      <th scope="col">CATEGORIA</th>
      <th scope="col">SISTEMA</th>
      <th scope="col">PRIORIDAD</th>
      <th scope="col">DESCRIPCION</th>
      <th scope="col">FECHA</th>
      <th scope="col">ESTADO</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($hd_reg_tickets as $hd_reg_ticket)
      <tr>
         <td>{!! $hd_reg_ticket->nFolio !!}</td>
         <td>{!! $hd_reg_ticket->cTitulo !!}</td>
         <td>{!! $hd_reg_ticket->cCategoria !!}</td>
         <td>{!! $hd_reg_ticket->cSistema !!}</td>
         <td>{!! $hd_reg_ticket->cPrioridad !!}</td>
         <td>{!! $hd_reg_ticket->cDesProblema !!}</td>
         <td>{!! $hd_reg_ticket->created_at !!}</td>
         <td></td>    
         <td><i class="fa fa-plus-circle"></i>
             <i class="fa fa-minus-circle"></i>
             <i class="fa fa-eye" ></i>
        </td>
      </tr>
      @endforeach
  </tbody>
</table>
