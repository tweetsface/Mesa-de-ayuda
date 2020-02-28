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
      <th scope="col">PRIVILEGIOS</th>
      <th scope="col">OTORGAR PRIVILEGIOS</th>
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
         <td>{!! $hd_users->cPrivilegios!!}</td>
          <td><select >
             @foreach($hd_privilegios as $hd_p)
          <option value="$hd_p->id">{!! $hd_p->cPrivilegios!!}</option>
            @endforeach
          </select>
        </td>
         <td >
          <input type="button" name="" value="ACTUALIZAR">
          <input type="button" name="" value="ELIMINAR">
        </td>
           @endforeach
      </tr>
    
  </tbody>
</table>
