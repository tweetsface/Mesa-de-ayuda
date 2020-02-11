@include('layout.head')
@include('layout.barranav')
@include('layout.sidebaruser')
<div class="input-group mb-3">
  <div class="input-group-prepend">
   <button type="button" class="btn btn-dark">Buscar</button>
  </div>
  <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
</div>
@include('layout.tabla')
