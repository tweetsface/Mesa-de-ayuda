@include('layout.head')
@include('layout.barranav')
@include('layout.sidebaruser')
<div class="panel panel-default" style="max-height:17%;position: relative;top:10%; margin-bottom:0.4%; max-width:80%; left:18%; border: none;background-color:#FEFEFF;" >
<div class="card muevecC3" style="max-width:30%; background-color: white; max-height:70px; border-radius: 5px;">
  <div class="card-body">
    <h5 class="card-title"><span class="tit1">TOTAL</span></h5>
    <p class="card-text"><div class="pos"><span class="abiertos">ABIERTOS</span><span class="tit3">{{$abiertos}}</span></div></p>
  </div>
</div>
<div class="card muevecc2" style="max-width:30%; background-color: white; height:70px; border-radius: 5px;">
  <div class="card-body">
    <h5 class="card-title"><span class="tit1">TOTAL</span></h5>
    <p class="card-text"><div class="pos"><span class="abiertos">EN PROCESO</span><span class="tit3">{{$cerrados}}</span></div></p>
  </div>
</div>
<div class="card muevecc" style="max-width:30%; background-color: white; height:70px; border-radius: 5px;">
  <div class="card-body">
    <h5 class="card-title"><span class="tit1">TOTAL</span></h5>
    <p class="card-text"><div class="pos"><span class="abiertos">CERRADOS</span><span class="tit3">{{$proceso}}</span></div></p>
  </div>
</div>
</div>
@foreach($fecha as $fecha)
<span class="antiguo">Ticket mas antiguo:{{date('d-m-Y', strtotime($fecha->created_at))}}</span>
@endforeach
@include('layout.tabla')
@include('layout.modalticket')