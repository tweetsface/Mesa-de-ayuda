<!DOCTYPE html>
<html lang="es">
<head>
	<title>Reporte</title>
</head>
<style type="text/css">
.descripcion
{
	position: absolute;
	bottom:650px;
	left:355px;
	color: #151515;
	font-size: 1.8em;
	 font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif
}
.direccion
{
   position: relative;
   left: 325px;
   top:-200px;
   color: #151515;
   font-size: 1.4em;
  

}
.ciudad
{
   position: relative;
   left: 470px;
   top:-200px;
   color: #151515;
   font-size: 1.3em;


}
tbody
{
	text-align: center;
}
.total
{
position: relative;
left: 350px;
}
.fecha
{
	position:absolute;
	left: 900px;
	bottom: 700px;
}
</style>
<body>
	 <img src="img/aparedes.jpg">
	 <div class="descripcion"><span><H4>AGRICOLA PAREDES SAPI DE CV</H4></div>
     <div class="direccion"><span>Calle paseo niños heroes oriente 520 302 Colonia Centro</span></div>
     <div class="ciudad"><span>Culiacan,Sinaloa CP:80000</span></div>
     <div class="fecha">FECHA:{{$fechaN}}</div>
 <table width="100%" border="1" cellpadding="0" cellspacing="0">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">TITULO</th>
      <th scope="col">CATEGORIA</th>
      <th scope="col">TIPO</th>
      <th scope="col">SISTEMA</th>
      <th scope="col">PRIORIDAD</th>
      <th scope="col">FECHA</th>
      <th scope="col">REPORTO</th>
      
    </tr>
  </thead>
  <tbody >
  	 @foreach($hd_reg_tickets as $hd_reg_tickets)
      <tr>
      <td>{!! $hd_reg_tickets->id!!}</td>
      <td>{!! $hd_reg_tickets->cTitulo!!}</td>
      <td>{!! $hd_reg_tickets->cCategoria!!}</td>
      <td>{{$hd_reg_tickets->ccEstado}}</td>
      <td>{!! $hd_reg_tickets->cSistema!!}</td>
      <td>{!! $hd_reg_tickets->cPrioridad!!}</td>
      <td>{{$hd_reg_tickets->created_at}}</td>
      <td>{{$hd_reg_tickets->cNombre}}</td>
      </tr>
      @endforeach
  </tbody>
</table>

  <span class="total">Total:{{$contar}}</span>

</body>
</html>