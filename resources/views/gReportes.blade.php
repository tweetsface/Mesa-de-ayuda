@include('layout.head')
@include('layout.barranav')
@include('layout.sideadmin')
<form method="post" name="reportes" action="{{url('reportes')}}" >
      {{ csrf_field() }}
   <div class="container-sm mover" style="overflow:hidden; border:groove;   width:750px; border-width:1px;">
   	<div class="tipos">
    <fieldset style="border:inset; height: 140px; ">
     <span class="lblestados">Estado</span>
     <div class="rmover">
     <input type="radio" name="cEstado" id="cEstado" value="1"><span>ABIERTO</span><br>
     <input type="radio" name="cEstado" id="cEstado2"value="2"><span>EN PROCESO</span><br>
     <input type="radio" name="cEstado" id="cEstado3"value="3"><span>CERRADO</span><br>
     <input type="radio" name="cEstado" id="cEstado4"value="4"><span>GENERAL</span>
     </div>
     </fieldset>
     <div class="periodo">
    <fieldset style="border:inset; height: 140px;" >
     <span class="lblestados">Periodo</span>
     <div class="pmover">
     <input type="radio" name="created_at" id="created_at" value="1"><span>DIARIO</span><br>
     <input type="radio" name="created_at" id="created_at2" value="2"><span>SEMANAL</span><br>
     <input type="radio" name="created_at" id="created_at3" value="3"><span>MENSUAL</span><br>
     <input type="radio" name="created_at" id="created_at4" value="4"><span>ANUAL</span>
     </div>
     </fieldset>
    <div class="prioridad">
    <fieldset style="border:inset; height: 140px;" >
     <span class="lblestados">Prioridad</span>
     <div class="pmover">
     <input type="radio" name="cPrioridad" id="cPrioridad" value="1"><span>BAJA</span><br>
     <input type="radio" name="cPrioridad" id="cPrioridad2"value="2"><span>MEDIA</span><br>
     <input type="radio" name="cPrioridad" id="cPrioridad3"value="3"><span>ALTA</span><br>
     <input type="radio" name="cPrioridad" id="cPrioridad4"value="4"><span>GENERAL</span>
     </div>
     </fieldset>
     </div>
  </div>
 </div>
</div>
<div class="btngenerar">
<button class="btn btn-dark btn t">Generar</button>
</div>
</form>
  <div class="container-sm" style="height: 350px;left:100px; top: 170px;">

  </div>