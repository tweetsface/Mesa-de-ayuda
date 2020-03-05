<html lang="es">
@include('layout.head')
<body>
    <img src="{{asset('img/aparedes.jpg')}}">
    <div class="descripcion"><span><H4>AGRICOLA PAREDES SAPI DE CV.</H4></div>
    <div class="direccion"><span>Calle paseo niños heroes oriente 520 302 Colonia Centro</span></div>
    <div class="ciudad"><span>Culiacan,Sinaloa CP:80000.</span></div>
 </div>
    @foreach($hd_reg_tickets as $hd_reg_tickets)
    <div class="mensaje">
    <label><h1> Hola {!! $hd_reg_tickets->cNombre!!},recibimos tu reporte con exito.</h1></label></div>
    <div class="mensaje2"><h3>Estos son los datos que proporcionaste sobre tu incidencia:</h3>
    <ul></div> 
<div class="tablat">
    <div class="container-fluid">
 <table class="table table-striped" style="border-collapse: collapse;" border="1"; >
  <thead class="thead-dark" >
    <tr>
      <th scope="col">TITULO</th>
      <th scope="col">CATEGORIA</th>
      <th scope="col">SISTEMA</th>
      <th scope="col">PRIORIDAD</th>
      <th scope="col">DESCRIPCION</th>
      <th scope="col">FECHA</th>
      <th scope="col">ESTADO</th>
    </tr>
  </thead>
  <tbody>
      <tr>
         <td>{!! $hd_reg_tickets->cTitulo !!}</td>
         <td>{!! $hd_reg_tickets->cCategoria !!}</td>
         <td>{!! $hd_reg_tickets->cSistema !!}</td>
         <td>{!! $hd_reg_tickets->cPrioridad !!}</td>
         <td>{!! $hd_reg_tickets->cDesProblema !!}</td>
         <td>{!!$hd_reg_tickets->created_at!!}</td>
         <td>{!!$hd_reg_tickets->ccEstado!!}</td>
      </tr>
            @endforeach

  </tbody>
</table>
</div>
</div>

   <div class="mensaje3"><h4>lo atenderemos a la mayor brevedad posible,saludos.</h4></div> 
</body>
</html>