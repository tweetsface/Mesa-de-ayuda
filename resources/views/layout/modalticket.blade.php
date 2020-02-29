<div class="container">
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
   <button type="button" class="close" data-dismiss="modal">&times;</button>
   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <h4 class="modal-title">REGISTRAR TICKET</h4>
</div>
<div class="modal-body">
   <form  class="form-horizontal" method="post" >
    {{ csrf_field()}}
 <div class="form-group">
    <label class='etiquetas'><b>Titulo:</b></label>
    <input type="text" name="cTitulo" class="form-control" placeholder="Titulo" required>
</div>
<div class="form-group">
             <label class='etiquetas'><b>Categoria/Tipo:</b></label>
              <input type="text" name="cCategoria" class="form-control" placeholder="Categoria/Tipo" required="">
</div>
<div class="form-group">
    <label for="cSistema" class='etiquetas'><b>Sistema:</b></label>
     <select size="1" class="form-control" name="cSistema" id="cSistema" name="cSistema" placeholder="Sistema" >
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
  </select>
</div>
<div class="form-group">
    <label for="Prioridad" class='etiquetas'><b>Prioridad:</b></label>
     <select size="1" class="form-control" name="cPrioridad" id="cPrioridad" placeholder="Prioridad" required  >
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
  </select>
</div>
<div class="form-group">
      <label class='etiquetas'><b>Descripcion del problema:</b></label>
       <textarea class="form-control" name="cDesproblema" rows="5" id="cDesproblema" placeholder="Descripcion del problema" required></textarea>
</div>
<div class="botones">
     <button type="submit" class="btn btn-dark">ENVIAR</button>
   <a href="{{url('ticket')}}" class="btn btn-dark">CANCELAR</a>
  </div>
    </form>
    
       </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

      </div>
              </div>
  </div>