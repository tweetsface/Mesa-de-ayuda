  @include('layout.head')
  @include('layout.barranav')
  @include('layout.sideadmin')
  <table class="table table-bordered table-hover">
  <thead class="thead-dark" >
    <tr>
      <th scope="col">#</th>
      <th scope="col">TITULO</th>
      <th scope="col">CATEGORIA</th>
      <th scope="col">SISTEMA</th>
      <th scope="col">PRIORIDAD</th>
      <th scope="col">DESCRIPCION</th>
      <th scope="col">FECHA</th>
      <th scope="col">ESTADO</th>
      <th scope="col">ACTUALIZAR ESTADO</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($hd_reg_tickets as $hd_reg_ticket)
      <tr>
         <td>{!! $hd_reg_ticket->id!!}</td>
         <td>{!! $hd_reg_ticket->cTitulo !!}</td>
         <td>{!! $hd_reg_ticket->cCategoria !!}</td>
         <td>{!! $hd_reg_ticket->cSistema !!}</td>
         <td>{!! $hd_reg_ticket->cPrioridad !!}</td>
         <td>{!! $hd_reg_ticket->cDesProblema !!}</td>
         <td>{!!$hd_reg_ticket->created_at!!}</td>
         <td>{!!$hd_reg_ticket->ccEstado!!}</td>
         <form method="post" action="{{route('actualizar',$hd_reg_ticket->id) }}">
          {{ csrf_field() }}
         <td>
          <div class="estados">
          <select name="cEstado">
            @foreach($hd_estado as $hd_estado)
            <option value="{{$hd_estado->id}}">{{$hd_estado->ccEstado}}</option>
            @endforeach
          </select>
          </div>
           </td>
           <td><button type="submit" name="actualizar" class="boton">actualizar</button>
           <button type="button" name="CANCELAR">ELIMINAR</button></td>
         </form>
        
      </tr>
      
           @endforeach

  </tbody>
</table>
