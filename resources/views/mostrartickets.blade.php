@include('layout.head')
@include('layout.barranav')
@include('layout.sidebaruser')
<div class="buscar">
<div class="col-lg-6">
    <div class="input-group">
      <input type="text" name="id" class="form-control" >
     </div>
     <div class="btnb">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Buscar</button>
      </span>
  </div>
</div>
 </div>
  <div class="nuevo">
<button type="button" class="btn btn-dark" data-toggle="modal"
 data-target="#myModal"><i class="fa fa-plus-circle"></i><span>  Nuevo ticket</span> </button>
  </div>
@include('layout.modalticket')
@include('layout.tabla')
