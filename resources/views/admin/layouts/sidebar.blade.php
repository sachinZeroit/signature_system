 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- Sidebar -->
    <div class="sidebar">   
    <h1 style="color:#3B2C8B;">Lo̲Go̲IPSUM</h1>
    
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
<h6 style="color:white">USER RELATED</h6>
               <div>
            <li class="nav-item menu-open active" style="background-color:#3B2C8B">
            <a href="http://127.0.0.1:8000/admin" class="nav-link" style="color:white">
                <svg width="16" height="16" fill="white" class="bi bi-grid-fill" viewBox="0 0 16 16">
  <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3z"/>
</svg>
              <p>
                Dashboard
              </p>
              </a>   
            
           
                </a>
              </li>
</div>
<div>     
@if(Helper::is_permission())
<li class="nav-item">
          
          <a href="{{route('admin.user.list')}}" class="nav-link" style="color:white">
              <i class="nav-icon fas fa-users"></i>
          
              <p>
                All Users
          
              </p>
            </a>
           </li>
</div>
@endif
<div>
           <li class="nav-item">
            <a href="http://127.0.0.1:8000/admin/signage" class="nav-link" style="color:white">
              <i class="nav-icon fas fa-box"></i>
              <p>
                Signages
                </p>
            </a>
           </li>
</div>

<hr>
<h6 style="color:white">PLAYLISTS</h6>
<div>
<li class="nav-item">
            <a href="http://127.0.0.1:8000/admin/playlist/add" class="nav-link" style="color:white">
            <i class="material-icons">&#xe03b;</i>  <p>
                Add New Playlists
                </p>
            </a>
</li>
</div>

<div>
<li class="nav-item">
            <a href="http://127.0.0.1:8000/admin/playlist" style="color:white" class="nav-link">
            <i class="fas fa-bars"></i>
            <i class="fas fa-" data-fa-transform="shrink-1 right-6.5 down-4"></i>
            <p>
                Manage Playlists
                </p>
            </a>
</li>
</div>

<hr>
@if(Helper::is_permission())
<h6 style="color:white">TERM & CONDITIONS</h6>
<div>
<li class="nav-item">
            <a href="http://127.0.0.1:8000/admin/term" style="color:white" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-calendar-event" viewBox="0 0 16 16">
  <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
</svg>
            <p>
            Terms & Conditions
                </p>
            </a>
</li>
</div>
@endif
<div>
<li class="nav-item">
            <a href="http://127.0.0.1:8000/admin/profile" style="color:white" class="nav-link">
            <i class="fas fa-user"></i>
            <p>
            Profile
                </p>
            </a>
</li>
</div>
<div>
<li class="nav-item">
            <a href="http://127.0.0.1:8000/admin/mail" style="color:white" class="nav-link">
            <i class="fa fa-envelope"></i>
            <p>
              Mail
              </p>
            </a>
          </li>     
</div>


<div>
<li class="nav-item">
            <a href="{{route('admin.logout')}}" style="color:white" class="nav-link">
            <p>
              LogOut
              </p>
            <svg width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
</svg>
            </a>
          </li>     
</div>
        </ul>
        </nav>
</div>     
          
      <!-- /.sidebar-menu -->

    <!-- /.sidebar -->
  </aside>

  <style>
    .layout-fixed .main-sidebar {
    bottom: 0;
    float: none;
    left: 0;
    background-color: #8C64D2;
    position: fixed;
    top: 0;
}
 
.navbar-expand .navbar-nav .nav-link {
    padding-right: 1rem;
    padding-left: 1rem;
    color: white;
}
.nav-sidebar .nav-item>.nav-link {
    color: white;
    position: relative;
}
.nav-item:hover{
background-color:#3B2C8B;
}

  </style>