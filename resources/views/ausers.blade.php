@include('layout.head')
@include('layout.barranav')
@include('layout.sideadmin')
<script type="text/javascript">
  function llenarModal(numero){
  $.ajax({
    url:"{{asset('auser')}}"+"/"+numero,
    type:'get',
    dataType:"json",
    success:function(data)
    {
    var id=data[0]["id"];
    var nombre=data[0]["cNombre"];
    var apellido=data[0]["cApellidos"];
    var email=data[0]["email"];
    var badmin=data[0]["badmin"];
    var password=data[0]["password"];
    document.getElementById("id1").value=id;
    document.getElementById("cNombre1").value=nombre;
    document.getElementById("cApellidos1").value=apellido;
    document.getElementById("email1").value=email;
    document.getElementById("password1").value=password;
    },
     error:function(x,xs,xt){
    
              alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
          }
}); 
}

 

</script>
<div class="prueva"></div>
<div class="panel panel-default" style=" position:relative; width:80%;  left:18%; top:13%; height:84%;" >
   <form method="get"action="{{route('buscarUsuario')}}">
  <div class="panel-heading" style="background-color: #2A9C9F;">
    <span class="" style="color: white; font-weight: bold; font-size:1.5em;">
    Usuarios
  </span>
</div>

  <input type="text"  class="form-control" id="buscar"  name="buscar"  placeholder="Buscar" style="position:relative;left: 35%; width:30%; border:solid 1px; border-color:black;top:14px; border-radius: 0px;">
   <button type="submit" style="position:relative;border:none;left:65%; background-color: #343a40; height:34px;  width:50px;bottom:20px; "><span class="fuente"><i class="fa fa-search"></i></span></button>
  </form>
  <button style="height:35px; width:100px; background-color: #26272b; color: white; border: none; border-radius: 4px; position:relative; bottom:67px; left:24.3%;  "type="button"  data-toggle="modal" data-target="#myModal2"><i class="fa fa-plus-circle"></i><span> Añadir 
</span>
</button>
  <span class="total">Total: <span class="contar">{{$contar}}</span></span>
<table class="table table-striped table-hover " >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NOMBRE(S)</th>
      <th scope="col">APELLIDOS(S)</th>
      <th scope="col">NO EMPLEADO</th>
      <th scope="col">CORREO</th>
      <th scope="col">PRIVILEGIOS</th>
      <th scope="col">ACCIONES</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($hd_users as $hd_user)
      <tr>
         <td>{!!$hd_user->id!!}</td>
         <td>{!! $hd_user->cNombre !!}</td>
         <td>{!! $hd_user->cApellidos !!}</td>
         <td>{!!$hd_user->nEmpleado !!}</td>
         <td>
         {{$hd_user->email}}
        </td>
         <td>{!!$hd_user->cPrivilegios!!}</td>
         <td >
          <button  type="button" id="modal"
          onclick="llenarModal('{{$hd_user->id}}')" class="icon" data-toggle="modal" data-target="#myModal3"><i class="fa fa-edit"></i></button>
        </td>
        <div>

         </div>
      </tr>
       @endforeach
  </tbody>
</table>
<div class="paginacion">
  {{$hd_users->links()}}
</div>
<script src="{{asset('js/app.js')}}"></script>
<div class="container" >
<div class="modal fade" id="myModal3" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
   <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title" >MODIFICAR USUARIO</h4>
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
                        <a href="" class="btn btn-dark" data-dismiss="modal" data-backdrop="false">Cancelar</a>
                            </div>
                        </div>
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
          url:"{{asset('auser')}}"+"/"+id+"/"+"actualizar",
          data:{'cNombre':cNombre,'cApellidos':cApellidos,'badmin':badmin,'email':email,'password':password},
          type:'post',
          success: function (response) {
            Swal.fire('Datos actualizados','Se han actualizado los datos con exito','success')
                   $(function (){
                  $('#myModal3').modal('hide');
                      if($('.modal-backdrop').is(':visible')){
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                    }
                   });
          },
          statusCode: {
             404: function() {
                alert('web not found');
             }
          },
          error:function(x,xs,xt){
             Swal.fire('Ha ocurrido un error','Verifique los datos e intente nuevamente','error')
          }
})
         });
</script>
</div>

@include('layout.modalregistro')

