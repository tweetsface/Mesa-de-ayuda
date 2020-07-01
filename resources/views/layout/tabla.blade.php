<div class="panel panel-default" style="max-height:30%;position: relative;top:25.5%; top:70; max-width:80%; left:18%; border: none;" >
  <div class="panel-heading" style="background-color: #2A9C9F; color: white; font-weight: bold; font-size: 1.2em;">
    Mis Tickets
@foreach($fecha as $fecha)
<span class="antiguof" style="position:relative; left:800px; font-size:0.8em;">Ticket mas antiguo:{{date('d-m-Y', strtotime($fecha->created_at))}}</span>
@endforeach
  </div>
<div class="panel-body" style="overflow-y: scroll; max-height:60%">

  <table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">CATEGORIA</th>
      <th scope="col">PRIORIDAD</th>
      <th scope="col">ESTADO</th>
      <th scope="col">FECHA</th>
      <th scope="col">DESCRIPCION</th>
      <th scope="col">ACCIONES</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @if($hd_reg_tickets->count()>0)
      @foreach($hd_reg_tickets as $hd_reg_ticket)
      <tr >
         <td height="10px">{!! $hd_reg_ticket->id!!}</td>
         <td>{!! $hd_reg_ticket->cCategorias !!}</td>
         <td>
          @if($hd_reg_ticket->cNPrioridad=="ALTA")
          <span class="label label-danger"> {!! $hd_reg_ticket->cNPrioridad !!}</span>
          @elseif($hd_reg_ticket->cNPrioridad=="MEDIA")
          <span class="label label-warning"> {!! $hd_reg_ticket->cNPrioridad !!}</span>
           @elseif($hd_reg_ticket->cNPrioridad=="BAJA")
          <span class="label label-primary"> {!! $hd_reg_ticket->cNPrioridad !!}</span>
          @endif
         </td>
         <td>{!! $hd_reg_ticket->ccEstado !!}</td>
         <td>{{date('d-m-Y', strtotime($hd_reg_ticket->created_at))}}</td>
         <td>{!! $hd_reg_ticket->cDesProblema !!}</td>
          <td>
          <form method="get" action="{{route('verTicketu',$hd_reg_ticket->id) }}">
               {{ csrf_field() }}
          <button type="submit" class="btn btn-dark" style="border-radius:8px; border: 3px solid; font-weight: bold;" >Detalles</button>
        </form>
        </td>
      </tr>
        @endforeach
        @else
        <div class="alert alert-secondary text-center">
              <h4>AVISO DEL SISTEMA</h4>
             <p>No hay ticket registrados.</p>
         </div>
       @endif

  </tbody>
</table>
</div>
</div>