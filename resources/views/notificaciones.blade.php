<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Ticket</title>
</head>
<body>
    @foreach($hd_reg_tickets as $hd_reg_tickets)
    <label><h1> Hola {!! $hd_reg_tickets->cNombre!!} ,recibimos tu reporte con exito.</h1></label>
    <h3>Estos son los datos que proporcionaste sobre la incidencia:</h3>
    <ul>
        <label><h2>Titulo:</h2>{!! $hd_reg_tickets->cTitulo!!}</label>
        <label><h2>Categoria:</h2>{!! $hd_reg_tickets->cCategoria !!}</label> 
         <label><h2>Sistema:</h2>{!! $hd_reg_tickets->cSistema !!}</label> 
         <label><h2>Prioridad:</h2>{!! $hd_reg_tickets->cPrioridad !!}</label> 
         <label><h2>Descripcion:</h2>{!! $hd_reg_tickets->cDesProblema !!}</label> 
         <label><h2>Fecha:</h2>{!! $hd_reg_tickets->created_at !!}</label> 
         <label><h2>Estado:</h2>{!! $hd_reg_tickets->cEstado !!}</label> 
        @endforeach
    </ul> 
    <h4>lo atenderemos a la brevedad,saludos.</h4>
</body>
</html>