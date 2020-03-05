@include('layout.head')
@include('layout.barranav')
@include('layout.sideadmin')
<div class="buscador">
<form class="form-inline d-flex justify-content-center md-form form-sm active-purple active-purple-2 mt-2">
  <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Buscar ticket"
    aria-label="Search">
    <div class="btnbuscar">
    	<button class="btn btn-default">Buscar</button>
    </div>
</form>
</div>
@include('layout.tabladmin')
