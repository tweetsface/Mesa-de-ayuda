@include('layout.head')
@include('layout.barranav')
@include('layout.sideadmin')
<div class="col-lg-6">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Buscar empleado">
     </div>
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Buscar</button>
      </span>
  </div>
</div>
<div class="btnadd">
<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#myModal2"><i class="fa fa-plus-circle"></i><span>
  Nuevo Usuario
</span>
</button>
</div>
@include('layout.modalregistro')
<span> Nuevo Usuario</span>
</div>
<div class="moverausers">
<div class="container-fluid">
<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">NOMBRE(S)</th>
      <th scope="col">APELLIDOS(S)</th>
      <th scope="col">NO EMPLEADO</th>
      <th scope="col">CORREO</th>
      <th scope="col">PRIVILEGIOS</th>
      <th scope="col">OTORGAR PRIVILEGIOS</th>
      <th scope="col" width="16%">ACCIONES</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($hd_users as $hd_users)
      <form method="post" action="{{route('ausuarios',$hd_users->id)}}">
     {{ csrf_field() }}
      <tr>
         <td>{!!$hd_users->id!!}</td>
         <td>{!! $hd_users->cNombre !!}</td>
         <td>{!! $hd_users->cApellidos !!}</td>
         <td>{!!$hd_users->nEmpleado !!}</td>
         <td><input type="text" name="email" id="email" value="{{$hd_users->email}}"></td>
         <td>{!! $hd_users->cPrivilegios!!}</td>
          <td><select name="badmin" >
            <option value="{{$hd_users->badmin}}"></option>
             @foreach($hd_privilegios as $hd_p)
          <option  value="{{$hd_p->id}}">{!! $hd_p->cPrivilegios!!}</option>
            @endforeach
          </select>
        </td>
         <td >
          <div class="btnupdate">
          <input type="submit" class="btn btn-default" value="actualizar" >
          </div>
        </form>
          <div class="btnEliminar">
          <input type="button" class="btn btn-default" name="" value="Eliminar">
          </div>
        </td>
           @endforeach
      </tr>
  </tbody>
</table>
</div>
</div>
