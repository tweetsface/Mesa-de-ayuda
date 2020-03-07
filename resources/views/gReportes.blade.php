@include('layout.head')
@include('layout.barranav')
@include('layout.sideadmin')
   <div class="container-sm mover" style="overflow:hidden;">
   	<div class="tipos">
    <fieldset style="border:inset; height: 140px;" >
     <span class="lblestados">Estado</span>
     <div class="rmover">
     <input type="radio" name="cEstado"><span>ABIERTO</span><br>
     <input type="radio" name="cEstado"><span>EN PROCESO</span><br>
     <input type="radio" name="cEstado"><span>CERRADO</span><br>
     <input type="radio" name="cEstado"><span>GENERAL</span>
     </div>
     </fieldset>
     <div class="periodo">
    <fieldset style="border:inset; height: 140px;" >
     <span class="lblestados">Periodo</span>
     <div class="pmover">
     <input type="radio" name="created_at"><span>DIARIO</span><br>
     <input type="radio" name="created_at"><span>SEMANAL</span><br>
     <input type="radio" name="created_at"><span>MENSUAL</span><br>
     <input type="radio" name="created_at"><span>ANUAL</span>
     </div>
     </fieldset>
    <div class="prioridad">
    <fieldset style="border:inset; height: 140px;" >
     <span class="lblestados">Prioridad</span>
     <div class="pmover">
     <input type="radio" name="created_at"><span>BAJA</span><br>
     <input type="radio" name="created_at"><span>MEDIA</span><br>
     <input type="radio" name="created_at"><span>ALTA</span><br>
     <input type="radio" name="created_at"><span>GENERAL</span>
     </div>
     </fieldset>
     </div>
      <div class="categoria">
    <fieldset style="border:inset; height: 140px;" >
     <span class="lblestados">Categoria</span>
     <div class="pmover">
     <input type="radio" name="created_at"><span>BAJA</span><br>
     <input type="radio" name="created_at"><span>MEDIA</span><br>
     <input type="radio" name="created_at"><span>ALTA</span><br>
     <input type="radio" name="created_at"><span>GENERAL</span>
     </div>
     </fieldset>
     </div>
  </div>