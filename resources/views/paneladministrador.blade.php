@include('layout.head')
@include('layout.barranav')
@include('layout.sideadmin')
<div class="panel panel-default" style="max-height:17%;position: relative;top:10%; margin-bottom:0.4%; max-width:80%; left:18%; border: none;background-color:#FEFEFF;" >
<div class="card muevecC3" style="max-width:30%; background-color: white; max-height:70px; border-radius: 5px;">
  <div class="card-body">
    <h5 class="card-title"><span class="tit1">TOTAL</span></h5>
    <p class="card-text"><div class="pos"><span class="abiertos">ABIERTOS</span><span class="tit3">{{$abierto}}</span></div></p>
  </div>
</div>
<div class="card muevecc2" style="max-width:30%; background-color: white; height:70px; border-radius: 5px;">
  <div class="card-body">
    <h5 class="card-title"><span class="tit1">TOTAL</span></h5>
    <p class="card-text"><div class="pos"><span class="abiertos">EN PROCESO</span><span class="tit3">{{$cerrado}}</span></div></p>
  </div>
</div>
<div class="card muevecc" style="max-width:30%; background-color: white; height:70px; border-radius: 5px;">
  <div class="card-body">
    <h5 class="card-title"><span class="tit1">TOTAL</span></h5>
    <p class="card-text"><div class="pos"><span class="abiertos">CERRADOS</span><span class="tit3">{{$proceso}}</span></div></p>
  </div>
</div>
</div>
<div class="panel panel-default" style=" position:relative; width:80%;left:18%; top:9%; border: none;" >
  <div class="panel-heading" style="background-color: #2A9C9F;">
    <span class="" style="color: white; font-weight: bold; font-size:1.5em;">
    Dashboard
@foreach($fecha as $fecha)
<span class="antiguof" style="position:relative; left:710px; font-size:0.8em;">Ticket mas antiguo:{{date('d-m-Y', strtotime($fecha->created_at))}}</span>
@endforeach
  </span>
</div>
<div class="panel panel-body" style="overflow-y:scroll; height:60%; ">
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">FECHA</th>
      <th scope="col">ESTADO</th>
      <th scope="col">PRIORIDAD</th>
      <th scope="col">DESCRIPCION</th>
      <th scope="col">ACCIONES</th>
    </tr>
  </thead>
  <tbody>
       @foreach($tickets as $ticket)
      <tr>
         <td>{!!$ticket->id!!}</td>
         <td> <span class="label label-info">{{date('d-m-Y', strtotime($ticket->created_at))}}</span></td>
         <td>{!! $ticket->ccEstado !!}</td>
         <td>
          @if( $ticket->cPrioridad==1)
          <span class="label label-danger ">{!!$ticket->cNPrioridad !!}</span>
          @elseif($ticket->cPrioridad==2)
           <span class="label label-warning ">{!!$ticket->cNPrioridad !!}</span>
          @elseif($ticket->cPrioridad==3)
           <span class="label label-primary ">{!!$ticket->cNPrioridad !!}</span>
          @endif
          </td>
         <td>{!!$ticket->cDesProblema !!}</td>
         <td>
          <a href="{{route('verticket',$ticket->id)}}" style="text-align: center;" type="submit" class="btn btn-dark">Detalles</a>
      </form>
        </td>
      </tr>
       @endforeach
  </tbody>
</table>
</div>

