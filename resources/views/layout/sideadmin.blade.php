 <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a></p>
            
              <h5 class="centered"></h5> 
          
       
          
          <li class="mt">
            <a class="active" href="dashboard">
              <i class="fa fa-dashboard"></i>
              <span>DASHBOARD</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="{{url('aticket')}}"> <i class="fa fa-ticket"></i>GESTION DE TICKETS</span></a>
              </a>
     
          <li class="sub-menu">
         <a href="{{url('auser')}}"> <i class="fa fa-user"></i>GESTION USUARIOS</span></a>

          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-file"></i>
              <span>GESTOR DE REPORTES</span>
              </a>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>CONFIGURACION</span>
              </a>
            <li class="sub-menu">
            <a href="{{ url('/login/logout')}}"> <i class="fa fa-sign-out"></i>LOGOUT</span></a>
      </div>
    </aside>
 