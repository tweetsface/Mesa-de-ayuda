<aside>
      <div id="sidebar" class="nav-collapse ">
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered">
            @if(Auth()->user()->sFoto=="")
            <img src="{{asset('storage/default.jpg')}}" class="img-circle"
           width="80"></p>
           @else
             <img src="{{asset('storage/'.Auth()->user()->sFoto)}}" class="img-circle"
           width="80"></p>
           @endif
              <h5 class="centered"></h5> 
          <span class="nombreu" style="text-align: center;"><h3><span>{{Auth()->user()->cNombre}} {{Auth()->user()->cApellidos}}</span></h3></span>
          <li class="mt">
            <a class="active" href="{{asset('dashboard')}}">
              <i class="fa fa-dashboard"></i>
              <span>DASHBOARD</span>
              </a>
          </li>

          <li class="sub-menu" href="javascript:;">
            <a href="{{url('aticket')}}"> <i class="fa fa-ticket"></i><span>GESTION DE TICKETS<span></a></li>

          <li class="sub-menu" href="javascript:;">
         <a href="{{url('auser')}}"> <i class="fa fa-user"></i><span>GESTION USUARIOS</span></a></li>

          <li class="sub-menu" href="javascript:;">
              <a href="{{url('reportes')}}"><i class="fa fa-file"></i> <span>GESTOR DE REPORTES</span>
              </a></li>


              <li class="sub-menu" href="javascript:;">
            <a href=""><i class="fa fa-cogs"></i><span>CONFIGURACION</span></a></li>


            <li class="sub-menu" href="javascript:;">
            <a href="{{ url('/login/logout')}}"> <i class="fa fa-sign-out"></i><span>LOGOUT</span></a></li>
        </span>

</ul>
</div>
</aside>
