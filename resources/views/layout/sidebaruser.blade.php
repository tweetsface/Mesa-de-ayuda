<aside>
      <div id="sidebar" class="nav-collapse ">
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="{{asset('img/ui-sam.jpg')}}" class="img-circle" width="80"></a></p>
           <span class="nombreu" style="text-align: center;"><h3>{{Auth()->user()->cNombre}} {{Auth()->user()->cApellidos}}</h3></span>
           <h5 class="centered"></h5> 
          <li class="mt">
            <a class="active" href="{{asset('panel')}}">
              <i class="fa fa-dashboard"></i>
              <span>DASHBOARD</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;"   data-toggle="modal" data-target="#myModal1">
              <i class="fa fa-ticket"></i><span>TICKETS</span></a>
            <a href="{{ url('/login/logout')}}"> <i class="fa fa-sign-out"></i><span>LOGOUT</span></a>
      </div>

    </aside>
 