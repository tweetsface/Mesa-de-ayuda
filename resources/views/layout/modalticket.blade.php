<div class="container">
<div class="modal fade" id="myModal1" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
   <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">REGISTRAR TICKET</h4>
</div>
<div class="modal-body">
   <form action="{{route('ticket')}}"  class="form-horizontal" method="post" >
    {{ csrf_field()}}
 <div class="form-group">
    <label class='etiquetas'><b>Titulo:</b></label>
    <input type="text" name="cTitulo" class="form-control" placeholder="Titulo" required>
</div>
<div class="form-group">
             <label class='etiquetas'><b>Categoria/Tipo:</b></label>
              <select size="1" class="form-control" name="cCategoria" id="cCategoria" name="cCategoria" >
     @foreach($hd_categorias as $hd_categorias)
               <option value="{{$hd_categorias->id}}">{{$hd_categorias->cCategorias}}</option>
     @endforeach
  </select>
</div>
<div class="form-group">
    <label for="cSistema" class='etiquetas'><b>Sistema:</b></label>
     <select size="1" class="form-control" name="cSistema" id="cSistema" name="cSistema" placeholder="Sistema" >
      @foreach($hd_sistemas as $hd_sistemas)
    <option value="{{$hd_sistemas->id}}">{{$hd_sistemas->cSistema}}</option>
     @endforeach
  </select>
</div>
<div class="form-group">
    <label for="Prioridad" class='etiquetas'><b>Prioridad:</b></label>
     <select size="1" class="form-control" name="cPrioridad" id="cPrioridad" placeholder="Prioridad" required  >
      @foreach($hd_prioridad as $hd_prioridad)
    <option value="{{$hd_prioridad->id}}">{{$hd_prioridad->cNPrioridad}}</option>
    @endforeach
  </select>
</div>
<div class="form-group">
      <label class='etiquetas'><b>Descripcion del problema:</b></label>
       <textarea class="form-control" name="cDesproblema" rows="5" id="cDesproblema" placeholder="Descripcion del problema" required></textarea>
</div>
<div class="btnticket" style="position: relative; left: 140px;">
    <button type="submit" value="submit"  class="btn btn-dark">REPORTAR</button>
    <a href=""  class="btn btn-dark" data-dismiss="modal">CANCELAR</a>
</div>
    </form>
       </div>
      </div>
              </div>
  </div>