@include('layout.head')
@include('layout.barranav')
@include('layout.sideadmin')
<div class="tareas">
  <h2>TAREAS PENDIENTES POR ATENDER</h2>
</div>
<div class="ajuste">
<div class="espera">
  <div class="container">
   <span>ABIERTO</span>
  </div>
  <div class="container-sm border ">
     <div class="table-wrapper-scroll-y my-custom-scrollbar">
  <table class="table table-bordered table-hover">
  <thead class="thead-dark" >
    <tr>
      <th scope="col">#</th>
      <th scope="col">TITULO</th>
      <th scope="col">CATEGORIA</th>
      <th scope="col">PRIORIDAD</th>
      <th scope="col">FECHA</th>
      <th scope="col">ACCIONES</th>
    </tr>
  </thead>
  <tbody>
    <tr>
       <tr>
      @foreach($espera as $espera)
      <tr>
         <td>{!! $espera->id!!}</td>
         <td>{!! $espera->cTitulo !!}</td>
         <td>{!! $espera->cCategoria !!}</td>
         <td>{!! $espera->cPrioridad !!}</td>
         <td>{!!$espera->created_at!!}</td>
         <td> 
          <form method="get" action="{{route('verticket',$espera->id) }}">
          <button type="submit">REVISAR</button>
        </form>
        </td>
      </tr>
      @endforeach
  </tbody>
</table>
    </div>
</div>

</div>
<div class="proceso">
  <div class="container">
   <span>PROCESANDO</span>
 </div>
  <div class="container-sm border ">
     <div class="table-wrapper-scroll-y my-custom-scrollbar">
  <table class="table table-bordered table-hover">
  <thead class="thead-dark" >
    <tr>
      <th scope="col">#</th>
      <th scope="col">TITULO</th>
      <th scope="col">CATEGORIA</th>
      <th scope="col">PRIORIDAD</th>
      <th scope="col">FECHA</th>
      <th scope="col">ACCIONES</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($proceso as $proceso)
      <tr>
         <td>{!! $proceso->id!!}</td>
         <td>{!! $proceso->cTitulo !!}</td>
         <td>{!! $proceso->cCategoria !!}</td>
         <td>{!! $proceso->cPrioridad !!}</td>
         <td>{!!$proceso->created_at!!}</td>
         <td>
          <form method="get" action="{{route('verticket',$proceso->id) }}">
          <button type="submit">REVISAR</button>
        </form>
        </td>
      </tr>
      @endforeach
  </tbody>
</table>
    </div>
</div>
</div>
<div class="resuelto">
  <div class="container">
   <span>CERRADO</span>
 </div>
  <div class="container-sm border ">
     <div class="table-wrapper-scroll-y my-custom-scrollbar">
  <table class="table table-bordered table-hover">
  <thead class="thead-dark" >
    <tr>
      <th scope="col">#</th>
      <th scope="col">TITULO</th>
      <th scope="col">CATEGORIA</th>
      <th scope="col">PRIORIDAD</th>
      <th scope="col">FECHA</th>
      <th scope="col">ACCIONES</th>
    </tr>
  </thead>
  <tbody>
   <tr>
      @foreach($realizado as $realizado)
      <tr>
         <td>{!! $realizado->id!!}</td>
         <td>{!! $realizado->cTitulo !!}</td>
         <td>{!! $realizado->cCategoria !!}</td>
         <td>{!! $realizado->cPrioridad !!}</td>
         <td>{!!$realizado->created_at!!}</td>
         <td> <form method="get" action="{{route('verticket',$realizado->id) }}">
          <button type="submit">REVISAR</button>
        </form>
        </td>
      </tr>
      @endforeach
  </tbody>
</table>
    </div>
</div>
   </div>
</div>
