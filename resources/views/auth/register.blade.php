<!DOCTYPE html>
<html  lang="es">
<head>
  <meta charset="UTF-8">
<link rel="stylesheet" href="{{ asset('css/estilos.css') }}" />
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style type="text/css">
body
 {
   background-image: url("img/login.jpg");
   background-position: center center;
   background-repeat: no-repeat;
   background-attachment: fixed;
   background-size: cover;
}
input[type="email"]
{
  position: absolute;
    background: transparent;
    border: none;
    border: white 1px solid;
    width: 250px;
    color: black;
     background-color:white; 

}
input[type="password"]
{
  position: absolute;
    background: transparent;
    border: none;
    border: white 1px solid;
    width: 250px;
    color: black;
    background-color:white; 

}
input[type="text"]
{
  position: absolute;
    background: transparent;
    border: none;
    border: white 1px solid;
    width: 250px;
    color: black;
    background-color:white; 

}

</style>
  <title>Agricola Paredes</title>
</head>
<script type="text/javascript">
</script>
<body>
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form  class="form-horizontal" method="post" >
                    {{ csrf_field() }}
                    <fieldset>
                        <legend class="text-center header">Registrar Nuevo Usuario</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id=cNombre" name="cNombre" type="text" placeholder="Nombre" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="cApellidos" name="cApellidos" type="text" placeholder="Apellido" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="nEmpleado" name="nEmpleado" type="text" placeholder="Numero de empleado" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="email" name="email" type="email" placeholder="Correo Electronico" class="form-control">
                            </div>
                        </div>
                         <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="password" name="password" type="password" placeholder="Contraseña" class="form-control">
                            </div>
                        </div>
                         <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input accept=".jpg,.png,.jpeg,.gif" name="sFoto" type="file" id="sFoto">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                               <button type="submit" >Registrarse</button>
                                <a href="{{url('/login')}}" class="btn btn-primary">Cancelar</a>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>