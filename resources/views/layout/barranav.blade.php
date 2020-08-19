
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="" class="logo"><b>AGRICOLA<span>PAREDES</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
           <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-theme"></span>
              </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">Tienes nuevos mensajes</p>
              </li>
              <li style=" overflow-y:scroll;  height:600px; width:100%;">
               @if(empty($comentarios))
               <a href="#" >
                  <span class="photo"><img alt="avatar" src="{{asset('img/ui-zac.jpg')}}"></span>
                  <span class="subject">No hay mensajes nuevos
                  <span class="message">
               NO HAY MENSAJES AUN
                  </span>
                  </a>
               @else
                @foreach($comentarios as $mensajes)
                @if(Auth()->user()->badmin==1)
                <a href="{{route('verticket',$mensajes->nFolio_ticket)}}?" id="folio" >
                  <span class="photo"><img alt="avatar" src="{{asset('img/ui-zac.jpg')}}"></span>
                  <span class="subject">
                  <span class="from">{{$mensajes->cNombre}}</span>
                  <span class="time">{{date('H:i', strtotime($mensajes->created_at))}}</span>
                  </span>
                  <span class="message">
                 {{$mensajes->cComentarios}}
                  </span>
                  </a>
                  @else
                   <a href="{{route('verTicketu',$mensajes->nFolio_ticket)}}?" id="folio" >
                  <span class="photo"><img alt="avatar" src="{{asset('img/ui-zac.jpg')}}"></span>
                  <span class="subject">
                  <span class="from">{{$mensajes->cNombre}}</span>
                  <span class="time">{{date('H:i', strtotime($mensajes->created_at))}}</span>
                  </span>
                  <span class="message">
                 {{$mensajes->cComentarios}}
                  </span>
                  </a>
                  @endif

                        @endforeach
                        @endif
              </li>

             </ul>
        <!--  notification end -->
      </div>
          <!-- settings end -->
          <!-- inbox dropdown start-->
        
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="/login/logout">Logout</a></li>
        </ul>
      </div>
    </header>
    @include('layout.sideadmin')
    <script type="text/javascript">
        $(function(){
         $('#folio').click(function(){
        $('#folio').hide();
        });
      })
    </script>

    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
   
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
      
      <script type="text/javascript">
  function llenarModal(numero){
  $.ajax({
    url:"{{asset('auser')}}"+"/"+numero+"/buscar",
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
</script>  MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->