<aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a></p>

              @if(Auth::check())
              @foreach($hd_users as $hd_users)
              <h5 class="centered">{{$hd_users->cNombre}}</h5> 
              @endforeach
            @endif
          <li class="mt">
            <a class="active" href="panel">
              <i class="fa fa-dashboard"></i>
              <span>DASHBOARD</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;"   data-toggle="modal" data-target="#myModal">
              <i class="fa fa-ticket"></i>
             <span>TICKETS</span></a>
           <!--<ul class="sub">
              <li><a href="general.html">General</a></li>  
              <li><a href="buttons.html">Buttons</a></li>
              <li><a href="panels.html">Panels</a></li>
              <li><a href="font_awesome.html">Font Awesome</a></li>*/
            </ul>
          -->

              <!--REPORTES-->
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>CONFIGURACION</span>
              </a>
        

            <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-sign-out"></i>
              <span>LOGOUT</span>
              </a>
        
        <!-- sidebar menu end-->
      </div>
    </aside>
 