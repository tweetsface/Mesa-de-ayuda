<div class="container">
<div class="modal fade" id="myModal2" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
   <button type="button" class="close" data-dismiss="modal">&times;</button>
   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <h4 class="modal-title">REGISTRAR USUARIO</h4>
</div>
<div class="modal-body">
  <div class="modalregistro">
   <form  class="form-horizontal" method="post" >
    {{ csrf_field()}}
 <div class="form-group"> 
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                <label class="etiqueta">Nombre:</label><input id="cNombre" name="cNombre" type="text" placeholder="Nombre" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                 <label class="etiqueta">Apellido:</label><input id="cApellidos" name="cApellidos" type="text" placeholder="Apellido" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                 <label class="etiqueta">No Empleado:</label><input id="nEmpleado" name="nEmpleado" type="text" placeholder="Numero de empleado" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                <label class="etiqueta">Email:</label> <input id="email" name="email" type="email" placeholder="Correo Electronico" class="form-control">
                            </div>
                        </div>
                         <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                 <label class="etiqueta">Password:</label><input id="password" name="password" type="password" placeholder="Contraseña" class="form-control">
                            </div>
                        </div>
                        <div class="btnmodal">
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                               <button type="submit" class="btn btn-dark">Guardar</button>
                                <a href="" class="btn btn-dark">Cancelar</a>
                            </div>
                        </div>
                        </div>

                </form>
            </div>
             </div>

        </div>
    </div>
</div>