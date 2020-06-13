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
   background-image: url("img/desenfoque5.jpg");
   background-position: center center;
   background-repeat: no-repeat;
   background-attachment: fixed;
   background-size: cover;
}
a{
  -webkit-appearence:button;
  -moz-appearence:button;
  appearance:button;

}
a:link,a:visited,a:active{
  text-decoration: none;
  color: white;
  -webkit-appearence:button;
  -moz-appearence:button;
  appearance:button;
}
.well {
   background-color: rgba(245, 245, 245, 0.4);
   border: none;
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
.AGRICOLA
{
  position: absolute;
  color:white;
  font-size:4em;
  top:290px;
  left:70px;
  font-family: Lucida Sans Unicode, Lucida Grande, sans-serif;
}
.PAREDES
{
  position: absolute;
  color:#00B233;
  font-size:3.5em;
  top:350px;
  left:175px;
  font-weight: bold;
  font-family: Lucida Sans Unicode, Lucida Grande, sans-serif;

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
.btnRegistrar
{
  position: absolute;
  top:256px;
  right: 30px;
  width:320px;
  height:35px;
  border-radius:20px;
  color: white;
  background-color:#3FBF3F;
  text-align: center;
  border: white 1px solid;
  text-decoration: none;
  float:center;
  display: inline-block;
  vertical-align:center;
  outline:none;
  font-weight: bold;
}
.btnCancelar
{
  position: absolute;
  top:446px;
  right: 32px;
  width:320px;
  height:35px;
  border-radius:20px;
  color: black;
  font-weight: bold;
  background-color:#3FBF3F;
  text-align: center;
  border: white 1px solid;
  text-decoration: none;
  float:center;
  display: inline-block;
  vertical-align:center;
  outline:none;
  display: inline;
}
.registroUsuario
{
    position:absolute;
    font-size:2.3em;
    left:50px;
    color: white;
   bottom:450px;

}
.sapi
{
   position:absolute;
    font-size:1.5em;
    left:90px;
    top: 45px;
    color:#00B233; 
    font-weight: bolder;
}
.movertxt
{
 position: absolute;
 top: 4px;
right: 130px;
}
</style>
  <title>Agricola Paredes</title>
</head>
<script type="text/javascript">
</script>
<body>
    <span class="AGRICOLA">AGRICOLA</span><span class="PAREDES"> PAREDES</span>
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well" style="position:absolute;height:500px;top:80px;left:400px;">
                <span class="registroUsuario">Registro de usuario</span>
                <span class="sapi">AGRICOLA PAREDES</span>
                <form  class="form-horizontal" method="post" >
                    {{ csrf_field() }}
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="cNombre" name="cNombre" type="text" placeholder="Nombre" class="form-control" style="position: absolute; width:320px; right:0px; top:60px">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="cApellidos" name="cApellidos" type="text" placeholder="Apellido" class="form-control" style="position: absolute; width:320px; top:90px;
                                 right:0px;">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="nEmpleado" name="nEmpleado" type="text" placeholder="Numero de empleado" class="form-control" style="position: absolute; width:320px; top:120px;right:0px;">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="email" name="email" type="email" placeholder="Correo Electronico" class="form-control" style="position: absolute; width:320px; top:150px;
                                 right:0px;">
                            </div>
                        </div>
                         <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="password" name="password" type="password" placeholder="Contraseña" class="form-control" style="position: absolute; width:320px; top:180px;
                                 right:0px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="password2" name="password2" type="password" placeholder="Repetir contraseña" class="form-control" style="position: absolute; width:320px; top:210px;
                                 right:0px;">
                            </div>
                        </div>
                            <div class="col-md-8">
                                <input accept=".jpg,.png,.jpeg,.gif" class="form-control" name="sFoto" type="file" id="sFoto" style="position:relative; top: 240px; width: 320px;" >
                            </div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                               <button type="submit" class="btnRegistrar" >Registrarse</button>
                            </div>
                             
                             <a href="{{url('/login')}}" class="btnCancelar"><span class="movertxt">Cancelar</span></a>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>