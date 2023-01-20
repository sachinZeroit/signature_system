<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Navbar -->
<nav class="main-header navbar navbar-expand" style="background-color:#8C64D2;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav6 nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>
      
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <div class="dropdown">
  <i class="fas fa-user prof" id="dropdownMenuButton" data-toggle="dropdown"></i>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="http://127.0.0.1:8000/admin/profile"><i class="fa fa-user" style="font-size:20px;">&nbsp;&nbsp;Profile</i></a>
    <a class="dropdown-item" href="{{route('admin.logout')}}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-power" viewBox="0 0 16 16">
                    <path d="M7.5 1v7h1V1h-1z"/>
                  <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
                </svg>&nbsp;&nbsp;LogOut</a>
  </div>
</div>
                </li>
    </ul>
  </nav>
  <!-- /.navbar -->
<style>
  .nav6 {
    font-weight: 900;
    color: white;
}
.input-box{
  position:relative;
  margin-left:255px;
}
.input-box i{
  position: absolute;
  right:13px;
  top:13px;
  color:purple;
  cursor: pointer;
}

.form-control{
  height: calc(3.25rem + 2px)
}
.len{
  width:500px;
}
.nav6{
  color:white;
}
.pl-logo{
  float:right;
  margin-left:32%;
  }
.dropdown .dropbtn {
  font-size: 35px;  
  border: none;
  outline: none;
  color: white;
  background-color: inherit;
  font-family: inherit;
  }
.dropdown-content{
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 150px;
  box-shadow: 0px 5px 12px 0px rgba(0,0,0,0.2);
  / z-index: 1; /
  }
.dropdown-content a {
  float: left;
  color: black;
  padding: 10px 14px;
  text-decoration: none;
  display: block;
  text-align: left;
  }
.dropdown-content a:hover{
  background-color: #ddd;
  }
.dropdown:hover .dropdown-content{
  display: block;
  }
  i#dropdownMenuButton {
    color: #fff;
    font-size: 34px;
}
</style>
