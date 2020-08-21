<div class="panel panel-default" style="position: absolute;top:14%; margin-bottom:0.4%; width:80%; left:18%; border: none;background-color:#FEFEFF;" >
<div class="panel-heading" style="background-color: #2A9C9F;">
    <span class="" style="color: white; font-weight: bold; font-size:1.5em;">
   Buscar Tickets
  </span>
</div>
 <form method="get" action="{{route('buscarE')}}">
<div class="form-group" style="position: absolute; left:120px; top:50px;">
<span style=" position:relative;font-size:1.2em;color: black; font-weight:bold; bottom:-20px; left: 50px;">Desde:</span>
 <input type="date" name="desde" max="3000-12-31" 
        min="1000-01-01" class="form-control">
<div class="form-group" style="position: absolute; left:350px;bottom:-14px;">
<span style="position:absolute;font-size:1.2em;color: black; font-weight:bold; top:0px; left: 50px;">Hasta:</span>
 <input type="date" name="hasta" min="1000-01-01"
        max="3000-12-31" class="form-control">
    
        <div class="form-group" style="position: absolute; left: 380px; bottom:-3">
        <button class="btn btn-dark">Buscar</button>
        </div>
        </div>
</div>
  </form>
</div>
