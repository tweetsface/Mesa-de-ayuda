<script src="{{asset('js/app.js')}}"></script>
<script type="text/javascript">
  $('#myModal3').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) 
          var id = button.data('id') 
          var cNombre = button.data('cnombre') 
          var cApellidos = button.data('capellidos')
          var email = button.data('email') 
          var password = button.data('password')
          var modal=$(this)
          modal.find('.modal-body #id1').val(id);
          modal.find('.modal-body #cNombre1').val(cNombre);
          modal.find('.modal-body #cApellidos1').val(cApellidos);
          modal.find('.modal-body #email1').val(email);
          modal.find('.modal-body #password1').val(password);
          
      });

</script>
<div class="container" >
<div class="modal fade" id="myModal3" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
   <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">MODIFICAR USUARIO</h4>
</div>
<div class="modal-body"  style="position:relative; bottom:50px;">
  <div class="modalregistro">
     <form method="put" action="{{route('ausuarios',$hd_user->id)}}" id="formulario">
    {{ csrf_field()}}
                            <input type="hidden" name="id" value="{{$hd_user->id}}" id="id1">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                 @foreach($errors->all() as $error)
      <div class="alert alert-warning" style="left: 35%;">{{ $error }}</div>
     @endforeach
                        </div>
                            <div class="form-group"> 
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                <label class="etiqueta">Nombre:</label><input id="cNombre1" name="cNombre" type="text" placeholder="Nombre" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                 <label class="etiqueta">Apellido:</label><input id="cApellidos1" name="cApellidos" type="text" placeholder="Apellido" class="form-control" >
                            </div>
                        </div>

  
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                <label class="etiqueta">Email:</label>
                                 <input id="email1" name="email" type="email" placeholder="Correo Electronico" class="form-control">
                                  </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                            <label class="etiqueta">Privilegios:</label>
                             <select name="badmin" class="form-control" id="badmin1" >
                              <option value="{{$hd_user->badmin}}"></option>
                               @foreach($hd_privilegios as $hd_p)
                             <option  value="{{$hd_p->id}}">{!! $hd_p->cPrivilegios!!}</option>
                             @endforeach
                         </select>
                            </div>
                        </div>

                         <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"></span>
                            <div class="col-md-8">
                                 <label class="etiqueta">Password:</label><input id="password1" name="password" type="password" placeholder="Contraseña" class="form-control">
                                  <input type="button"   id="btnEnviar" class="btn btn-dark"  name="btnEnviar"  style="left:100px;" value="Actualizar" >
                        <a href="" class="btn btn-dark" data-dismiss="modal">Cancelar</a>
                            </div>
                        </div>
                </form>
            </div>
             </div>

        </div>

    </div>
</div>
<script type="text/javascript">
     $('#btnEnviar').click( function (e) {
      e.preventDefault();
      $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
     }
    }); 
       var cNombre,cApellidos,nEmpleado,email,password;
       var id =document.getElementById('id1').value;
       cNombre=document.getElementById('cNombre1').value;
       cApellidos=document.getElementById('cApellidos1').value;
       badmin=document.getElementById('badmin1').value;
       email=document.getElementById('email1').value;
       password=document.getElementById('password1').value;
        $.ajax({
          url:"{{route('ausuarios',$hd_user->id)}}",
          data:{'cNombre':cNombre,'cApellidos':cApellidos,'badmin':badmin,'email':email,'password':password},
          type:'put',
          success: function (response) {
                      alert("Usuario Actualizado Correctamente");
          },
          statusCode: {
             404: function() {
                alert('web not found');
             }
          },
          error:function(x,xs,xt){
              //nos dara el error si es que hay alguno

              window.open(JSON.stringify(x));
              alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
          }
})
         });

</script>

