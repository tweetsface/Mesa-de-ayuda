<div class="tablausuarios" >
 <table  class="table table-borderless table-striped table-hover  fijo umover" cellpadding="0" cellspacing="0">
  <thead>
    <tr>
      <th scope="col" style="width:10%; ">#</th>
      <th scope="col" style="width:20%;">CATEGORIA</th>
      <th scope="col" style="width:21%;">PRIORIDAD</th>
      <th scope="col" style="width:14%;">ESTADO</th>
      <th scope="col" style="width:15%;">FECHA</th>
      <th scope="col" style="width:17%;">DESCRIPCION</th>
      <th scope="col" >ACCIONES</th>
    </tr>
  </thead>
  <tbody>
      @foreach($hd_reg_tickets as $hd_reg_ticket)
      <form method="get" action="{{route('verTicketu',$hd_reg_ticket->id)}}">
      <tr>
         <td style="width:11%;">{!! $hd_reg_ticket->id!!}</td>
         <td style="width:7%; text-align: center;">{!! $hd_reg_ticket->cCategorias!!}</td>
          <td style="width:30%; text-align: center;">
          @if( $hd_reg_ticket->cNPrioridad=="ALTA")
          <span class="label label-danger aumentar">{!! $hd_reg_ticket->cNPrioridad !!}</span>
          @elseif($hd_reg_ticket->cNPrioridad=="MEDIA")
           <span class="label label-warning aumentar">{!! $hd_reg_ticket->cNPrioridad !!}</span>
          @elseif($hd_reg_ticket->cNPrioridad=="BAJA")
           <span class="label label-primary aumentar">{!! $hd_reg_ticket->cNPrioridad !!}</span>
          @endif
          </td>
         <td style="width:13%;">{!!$hd_reg_ticket->ccEstado!!}</td>
        <td><span class="label label-info aumentarf">{{date('d-m-Y', strtotime($hd_reg_ticket->created_at))}}</td>
          <td style="width:12%; text-align: center;">{!! $hd_reg_ticket->cDesProblema !!}</td>
         <td style="width:11%;">
        <button type="submit"  class="boton">Detalles</button></td>
      </tr>
      </form>
            @endforeach
  </tbody>
</table>
</div>
