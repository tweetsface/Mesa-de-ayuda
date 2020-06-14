@include('layout.head')
@include('layout.barranav')
@include('layout.sideadmin')
<div class="panel panel-default" style=" position:relative; width:80%;  left:18%; top:13%; height:84%;" >
   <form method="get"action="{{route('buscarUsuario')}}">
  <div class="panel-heading" style="background-color: #2A9C9F;">
    <span class="" style="color: white; font-weight: bold; font-size:1.5em;">
    Usuarios
  </span>
</div>

  <input type="text"  class="form-control" id="buscar"  name="buscar"  placeholder="Buscar" style="position:relative;left: 35%; width:30%; border:solid 1px; border-color:black;top:14px; border-radius: 0px;">
   <button type="submit" style="position:relative;border:none;left:65%; background-color: #343a40; height:34px;  width:50px;bottom:20px; "><span class="fuente"><i class="fa fa-search"></i></span></button>
  </form>
  <button style="height:35px; width:100px; background-color: #26272b; color: white; border: none; border-radius: 4px; position:relative; bottom:67px; left:24.3%;  "type="button"  data-toggle="modal" data-target="#myModal2"><i class="fa fa-plus-circle"></i><span> Añadir 
</span>
</button>
  <span class="total">Total: <span class="contar">{{$contar}}</span></span>
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
         {{ csrf_field() }}
         <td>{!! $hd_user->cNombre !!}</td>
         <td>{!! $hd_user->cApellidos !!}</td>
         <td>{!!$hd_user->nEmpleado !!}</td>
         <td>
         {{$hd_user->email}}
        </td>
         <td>{!!$hd_user->cPrivilegios!!}</td>
         <td >
          <button  type="button"class="icon" data-cNombre="{{$hd_user->cNombre}}"  data-capellidos="{{$hd_user->cApellidos}}" data-email="{{$hd_user->email}}" data-badmin="{{$hd_user->badmin}}"  data-password="{{$hd_user->password}}" data-toggle="modal" data-target="#myModal3"><i class="fa fa-edit"></i></button>
        </form>
        </td>
        <div>
         @include('layout.actualizarRegistro')
         </div>
      </tr>
       @endforeach
  </tbody>
</table>
<div class="paginacion">
  {{$hd_users->links()}}
</div>
</div>
@include('layout.modalregistro')
