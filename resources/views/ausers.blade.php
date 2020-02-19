@include('layout.head')
@include('layout.barranav')
@include('layout.sideadmin')
<div class="col-lg-6">
    <div class="input-group">
      <input type="text" class="form-control">
     </div>
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Buscar</button>
      </span>
    
  </div>
</div>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">NOMBRE(S)</th>
      <th scope="col">APELLIDOS(S)</th>
      <th scope="col">NO EMPLEADO</th>
      <th scope="col">CORREO</th>
      <th scope="col">ADMINISTRADOR</th>
      <th scope="col">ACCIONES</th>
 
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($hd_users as $hd_users)
      <tr>
         <td>{!!$hd_users->id!!}</td>
         <td>{!! $hd_users->cNombre !!}</td>
         <td>{!! $hd_users->cApellidos !!}</td>
         <td>{!!$hd_users->nEmpleado !!}</td>
         <td>{!! $hd_users->email !!}</td>
         <td><select class="form-control" name="badmin">
          <option>{!! $hd_users->badmin!!}</option>
          </select>
          </td>
         <td><i class="fa fa-plus-circle"></i>
             <i class="fa fa-minus-circle"></i>
             <i class="fa fa-eye" ></i>
        </td>
      </tr>
      @endforeach
  </tbody>
</table>
