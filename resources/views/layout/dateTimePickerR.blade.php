<div class="panel panel-default" style="max-height:3%;position: relative;top:10%; margin-bottom:0.4%; max-width:80%; left:18%; border: none;background-color:#FEFEFF;" >
<div class="panel-heading" style="background-color: #2A9C9F;">
    <span class="" style="color: white; font-weight: bold; font-size:1.5em;">
   Generar Reporte
  </span>
</div>
 <form method="get" action="{{route('gReportes')}}">
<div class="form-group" style="position: absolute; left:120px; top:50px;">
<span style=" position:relative;font-size:1.2em;color: black; font-weight:bold; bottom:-20px; left: 50px;">Desde:</span> <input type="date" name="desde" max="3000-12-31" 
        min="1000-01-01" class="form-control">
<div class="form-group" style="position: absolute; left:350px;bottom:-14px;">
<span style="position:absolute;font-size:1.2em;color: black; font-weight:bold; top:0px; left: 50px;">Hasta:</span>
 <input type="date" name="hasta" min="1000-01-01"
        max="3000-12-31" class="form-control">
    
        <div class="form-group" style="position: absolute; left:500px; bottom:-3">
        <button class="btn btn-dark" style="border:3px solid; border-radius:10px; font-weight:bold;">Buscar</button>
        </div>
        </div>
</div>
  </form>
    <select name="cEstado" id="cEstado" class="form-control" style="position: absolute; left:260px; top:110px; height:33px;">
           @foreach($hd_estado as $hd_estado)
          <option value="{{$hd_estado->id}}">{{$hd_estado->ccEstado}}</option>
          @endforeach
          </select>
    <select name="cPrioridad" id="cPrioridad" class="form-control" style="position: absolute; left:570px; top:110px; height:33px;">
           @foreach($hd_prioridad as $hd_prioridad)
          <option value="{{$hd_prioridad->id}}">{{$hd_prioridad->cNPrioridad}}</option>
          @endforeach
          </select>
          <span style=" color: black; font-size: 1.2em; position: absolute;left:850px;" >Tipo de reporte</span><br>
  <div class="radioPosition" style="position: absolute; left:850px; top:80px; color: black;">
   <input type="radio" name="tipo" value="diario"> Diario<br>
   <input type="radio" name="tipo" value="semanal"> Semanal<br>
   <input type="radio" name="tipo" value="mensual"> Mensual
   </div>
</div>
