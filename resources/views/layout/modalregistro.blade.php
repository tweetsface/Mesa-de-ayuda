<div class="container" >
<div class="modal fade" id="myModal2" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
   <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title" >NUEVO USUARIO</h4>
</div>
<div class="modal-body"  style="position:relative; bottom:50px;">
  <div class="modalregistro">
     <form class="form-horizontal">
                            <div class="form-group"> 
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                <label class="etiqueta">Nombre:</label><input id="cNombre2" name="cNombre" type="text" placeholder="Nombre" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                 <label class="etiqueta">Apellido:</label><input id="cApellidos2" name="cApellidos" type="text" placeholder="Apellido" class="form-control" >
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                <label class="etiqueta">No Emp:</label>
                                 <input id="nEmpleado2" name="nEmpleado" type="text" placeholder="Numero de empleado" class="form-control">
                                  </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                <label class="etiqueta">Email:</label>
                                 <input id="email2" name="email" type="email" placeholder="Correo Electronico" class="form-control">
                                  </div>
                        </div>
                        
                         <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                 <label class="etiqueta">Password:</label><input id="password2" name="password" type="password" placeholder="Contraseña" class="form-control">
                                  <input type="button"   id="btnEnviar2" class="btn btn-dark"  name="btnEnviar"  style="left:100px;" value="Guardar" data-backdrop="false" >
                        <a href="" class="btn btn-dark" data-dismiss="modal" data-backdrop="false">Cancelar</a>
                            </div>
                        </div>
            </div>
             </div>

        </div>

    </div>
</div>

<script type="text/javascript">
 $('#btnEnviar2').click( function (e) {
      e.preventDefault();
      $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
     }
    }); 
       var cNombre,cApellidos,nEmpleado,email,password;
       cNombre=document.getElementById('cNombre2').value;
       cApellidos=document.getElementById('cApellidos2').value;
       nEmpleado=document.getElementById('nEmpleado2').value;
       email=document.getElementById('email2').value;
       password=document.getElementById('password2').value;
       if(cNombre.val!='' && cApellidos!='' && nEmpleado!='' && email!='' && password!=''){
        $.ajax({
          url:"{{route('registrar')}}",
          data:{'cNombre':cNombre,'cApellidos':cApellidos,'nEmpleado':nEmpleado,'email':email,'password':password},
          type:'post',
          success: function (response) {
            Swal.fire({
                       title: 'Registro Exitoso',
                       text: "Se ha registrado el usuario con exito",
                       icon: 'success',
                       confirmButtonColor: '#3085d6',
                       confirmButtonText: 'Aceptar'
              }).then((result) => {
               if (result.value) {
                  $(function (){
                  $('#myModal2').modal('hide');
                      if($('.modal-backdrop').is(':visible')){
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                    }
                   });
                  $('#cNombre2').val('');
                  $('#cApellidos2').val('');
                  $('#nEmpleado2').val('');
                  $('#email2').val('');
                  $('#password2').val('');
                                 }
                  })
          },
          statusCode: {
             404: function() {
                alert('web not found');
             }
          },
          error:function(x,xs,xt){
             Swal.fire('Ha ocurrido un error',"Error al registrar usuario",'error')
          }
})}else{
          Swal.fire('Atencion',"No se permiten campos vacios",'info')
        }
         });
 </script>