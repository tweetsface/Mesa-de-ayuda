<!DOCTYPE html>
<html  lang="es" >
 <head>
  <title>Agricola Paredes</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width,initial-scale=1,maximun-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <style type="text/css">
body
 {
    height: 100vh;
   background-image: url("img/desenfoque5.jpg");
   background-position: center center;
   background-repeat: no-repeat;
   background-attachment: fixed;
   background-size: cover;
}
.AGRICOLA
{
  position: relative;
  color:white;
  font-size:2em;
  top:300px;
  left: 600px;
}
.PAREDES
{
  position: relative;
  color:#00B233;
  font-size:2em;
  top:300px;
  left: 600px;

}
input[type="email"]
{
  position: absolute;
    background: transparent;
    border: none;
    border: white 1px solid;
    width: 250px;
    color: black;
    top:270px;
    left: 900px;
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
    top:310px;
    left: 900px;
    background-color:white; 

}
.recovery
{
  position: absolute;
  top:345px;
  left: 985px;
  font-color: white;
  text-decoration: none;

}
a{
  color: white;
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
.movertxt
{
 position: absolute;
 top: 4px;
 right: 90px;
}
.btnlogin
{
  position: absolute;
  top:370px;
  left: 904px;
  width:250px;
  height:35px;
  border-radius:20px;
  background-color:transparent;
  color: white;
  border: white 1px solid;
  border-color: white;
  outline:none;

}
.btnRegistrar
{
  position: absolute;
  top:410px;
  left: 904px;
  width:250px;
  height:35px;
  border-radius:20px;
  color: white;
  background-color:transparent;
  text-align: center;
  border: white 1px solid;
  text-decoration: none;
  float:center;
  display: inline-block;
  vertical-align:center;
  outline:none;

}




  </style>
 </head>
 <body>
 <span class="AGRICOLA">AGRICOLA</span><span class="PAREDES"> PAREDES</span>
 @if ($message = Session::get('error'))
    <script type="text/javascript">
      Swal.fire('Fallo el inicio de Sesion','{{$message}}','error')
      </script>
   @endif
   @if (count($errors) > 0)
    
     @foreach($errors->all() as $error)
      <script type="text/javascript">
      Swal.fire('Fallo el inicio de Sesion','{{$error}}','error')
      </script>
     @endforeach
   @endif
   <form method="post" action="{{ url('/login/checklogin') }}">
    {{ csrf_field() }}
    <div class="form-group">
     <label></label>
     <input type="email" name="email" class="form-control" placeholder="Correo Electronico" />
    </div>
    <div class="form-group">
     <label></label>
     <input type="password" name="password" class="form-control"  placeholder="Contraseña"/>
    </div>
     <div class="form-group recovery">
     <a href="{{url('login/recuperar/')}}" >¿Olvidaste tu contraseña?</a>
    </div>
    <div class="form-group">
     <input type="submit" name="login" class="btnlogin" value="Iniciar Sesion" />
   </div>
     <div class="form-group">
     <a href="{{url('/registrar')}}" class="btnRegistrar"><span class="movertxt">Registrarse</span></a>
     </div>
    </div>
   </form>
   
  </div>
 </body>
</html>
