<!DOCTYPE html>
<html lang="es">
<head>
	<title>Reporte de incidencias</title>
</head>
<body>
<form action="" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
      <label>Titulo:</label>
        <input type="text" name="cTitulo">
    </div>
    <div class="form-group">
      <label>Categoria/Tipo:</label>
        <input type="text" name="cCategoria">
    </div>
     <div class="form-group">
    <label for="cSistema">Sistema</label>
     <select  class="form-control" name="cSistema" id="cSistema" name="cSistema">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
  </select>
</div>
    <div class="form-group">
    <label for="Prioridad">Prioridad</label>
     <select  class="form-control" name="cPrioridad" id="cPrioridad"  >
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
  </select>
</div>
    <div class="form-group">
      <label>Descripcion del problema:</label>
       <textarea class="form-control" name="cDesproblema" rows="5" id="cDesproblema"></textarea>
    </div>
    <button   type="submit" name="reportar" class="btn btn-primary">Reportar</button>
	</Form>
</body>
</html>