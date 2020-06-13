 @include('layout.dateTimePicker')
<div class="panel panel-default" style="max-height:13%;position: relative;top:25.5%; margin-bottom:0.4%; max-width:80%; left:18%; border: none;background-color:#FEFEFF;" >
<div class="panel-heading" style="background-color: #2A9C9F;">
    <span class="" style="color: white; font-weight: bold; font-size:1.5em;">
   Gestion de tickets
  </span>
</div>
<div class="panel-body" style="overflow-y: scroll; max-height:60%">
  <table class="table table-striped table-hover ">
  <thead>
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
      @if($hd_reg_tickets->count()>0)
      @foreach($hd_reg_tickets as $hd_reg_ticket)
      <tr >
         <td height="10px">{!! $hd_reg_ticket->id!!}</td>
         <td>{!! $hd_reg_ticket->cTitulo !!}</td>
         <td>{!! $hd_reg_ticket->cCategorias !!}</td>
         <td>{!! $hd_reg_ticket->cNPrioridad !!}</td>
         <td>{{date('d-m-Y', strtotime($hd_reg_ticket->created_at))}}</td>
         <td>{!!$hd_reg_ticket->cNombre!!} {!!$hd_reg_ticket->cApellidos!!} </td>
          <td>
          <form method="get" action="{{route('verticket',$hd_reg_ticket->id) }}">
               {{ csrf_field() }}
          <button type="submit" class="btn btn-dark">detalles</button>
        </form>
        </td>
      </tr>
        @endforeach
        @else
        <div class="alert alert-secondary text-center">
              <h4>AVISO DEL SISTEMA</h4>
             <p>No se encuentran registros para este periodo.</p>
         </div>
       @endif

  </tbody>
</table>
</div>
</div>
