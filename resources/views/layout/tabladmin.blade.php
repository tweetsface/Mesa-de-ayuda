 @include('layout.dateTimePicker')
<div class="panel panel-default" style="position: absolute;top:35%; width:80%; margin-bottom:0.4%; max-width:80%; left:18%; border: none;background-color:#FEFEFF;" >
<div class="panel-body" style="overflow-y: scroll; height:67%;">
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
         <td> @if($hd_reg_ticket->cNPrioridad=="ALTA")
          <span class="label label-danger"> {!! $hd_reg_ticket->cNPrioridad !!}</span>
          @elseif($hd_reg_ticket->cNPrioridad=="MEDIA")
          <span class="label label-warning"> {!! $hd_reg_ticket->cNPrioridad !!}</span>
           @elseif($hd_reg_ticket->cNPrioridad=="BAJA")
          <span class="label label-primary"> {!! $hd_reg_ticket->cNPrioridad !!}</span>
          @endif
        </td>
         <td><span class="label label-primary">{{date('d-m-Y', strtotime($hd_reg_ticket->created_at))}}</span></td>
         <td>{!!$hd_reg_ticket->cNombre!!} {!!$hd_reg_ticket->cApellidos!!} </td>
          <td>
          <form method="get" action="{{route('verticket',$hd_reg_ticket->id) }}">
          <button type="submit" class="btn btn-dark" style="border-radius:8px; border: 3px solid; font-weight: bold;" >Detalles</button>
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
