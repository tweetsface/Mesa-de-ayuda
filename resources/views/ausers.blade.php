@include('layout.head')
@include('layout.barranav')
@include('layout.sideadmin')
<script type="text/javascript">
  function llenarModal(numero){
  $.ajax({
    url:"{{asset('auser')}}"+"/"+numero+"/buscar",
    type:'get',
    dataType:"json",
    success:function(data)
    {
    var id=data[0]["id"];
    var nombre=data[0]["cNombre"];
    var apellido=data[0]["cApellidos"];
    var email=data[0]["email"];
    var badmin=data[0]["badmin"];
    var password=data[0]["password"];
    document.getElementById("id1").value=id;
    document.getElementById("cNombre1").value=nombre;
    document.getElementById("cApellidos1").value=apellido;
    document.getElementById("email1").value=email;
    document.getElementById("password1").value=password;
    },
     error:function(x,xs,xt){
    
              alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
          }
}); 
}
</script>
<div class="panel panel-default" style=" position:relative; width:80%;  left:18%; top:13%; height:84%;" >
   <form method="get" action="{{route('buscarUsuario')}}">
    <div class="panel-heading" style="background-color: #2A9C9F;">
    <span class="" style="color: white; font-weight: bold; font-size:1.5em;">
     Usuarios
    </span>
</div>

   <input type="text"  class="form-control" id="buscar"  name="buscar"  placeholder="Buscar usuario" style="position:relative;left: 35%; width:30%; border:solid 1px; border-color:black;top:14px; border-radius: 0px;">
   <button type="submit" style="position:relative;border:none;left:65%; background-color: #343a40; height:34px;  width:50px;bottom:20px; "><span class="fuente"><i class="fa fa-search"></i></span></button>
  </form>
  <button style="height:35px; width:100px; background-color: #26272b; color: white; border: none; border-radius: 4px; position:relative; bottom:67px; left:24.3%;  "type="button"  data-toggle="modal" data-target="#myModal2"><i class="fa fa-plus-circle"></i><span> Añadir 
</span>
</button>
  <span class="total">Total: <span class="contar">{{$contar}}</span></span>
  <div class="panel panel-body" style="overflow-y: scroll; height:66%;">
<table class="table table-striped table-hover " >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NOMBRE(S)</th>
      <th scope="col">APELLIDOS(S)</th>
      <th scope="col">NO EMPLEADO</th>
      <th scope="col">CORREO</th>
      <th scope="col">PRIVILEGIOS</th>
      <th scope="col">ACCIONES</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($hd_users as $hd_user)
      <tr>
         <td>{!!$hd_user->id!!}</td>
         <td>{!! $hd_user->cNombre !!}</td>
         <td>{!! $hd_user->cApellidos !!}</td>
         <td>{!!$hd_user->nEmpleado !!}</td>
         <td>
         {{$hd_user->email}}
        </td>
         <td>@if( $hd_user->cPrivilegios=="ADMIN")
          <span class="label label-primary">{!!$hd_user->cPrivilegios!!}</span>
          @else
           <span class="label label-info">{!!$hd_user->cPrivilegios!!}</span>
           @endif
         <td >
          <button  type="button" id="modal"
          onclick="llenarModal('{{$hd_user->id}}')" class="btn btn-dark" data-toggle="modal" data-target="#myModal3">Modificar</button>
        </td>
        <div>

         </div>
      </tr>
       @endforeach
  </tbody>
</table>
</div> 
</div>
@include('layout.actualizarRegistro')
</div>
@include('layout.modalregistro')

