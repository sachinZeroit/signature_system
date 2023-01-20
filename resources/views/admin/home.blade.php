@extends('admin.layouts.master')
@push("after-styles")
<style>
  .card-footer{
    background: white;
  }
  .statss {
    margin-top: -17px;
}
hr {
    color: white;
    border-top: 2px solid rgba(0,0,0,0.1);
    width: 310px;
    margin-left: -37px;
}
.headds {
    color: #8C64D2;
    float: left;
    font-size: 34px;
}
  .statse {
    margin-top: -25px;
}
  .card-body{
    border-radius:10px;
  }
  span {
    font-size: 21px;
    color: #878787;
    /* margin-top: 10px; */
    margin-left: 60px;
}
.material-icons {
    font-family: 'Material Icons';
    font-weight: normal;
    font-style: normal;
    font-size: 27px;
    line-height: 1;
    letter-spacing: normal;
    text-transform: none;
    display: inline-block;
    white-space: nowrap;
    word-wrap: normal;
    direction: ltr;
    -webkit-font-feature-settings: 'liga';
    -webkit-font-smoothing: antialiased;
}
.bt {
    color: #8C64D2;
    float: right;
    background: #fff;
    border: none;
}
.deac {
    background: #c1bbfa;
    border-radius: 12px;
    color: #fff;
    border: none;
    width: 75px;
}
.act{
  background: #8C64D2;
    border-radius: 12px;
    color: #fff;
    width:75px;
    border: none;
}
.statusss{
  background:#8C64D2;
  color:#fff;
  padding: 11px;
  cursor:pointer;
}
.statuss{
  padding: 11px;
  background:#c1bbfa;
  color:#fff;
}
  .card-category {
    /* float: left; */
    margin: -34px;
    color: #878787;
    position: absolute;
}
.dotlogo {
    color: #878787;
    position: absolute;
    /* font-size: 40px; */
    margin-top: -30px;
    margin-left: 246px;
}

  .head{
    color: #8C64D2;
    float: left;
    font-size: 25px;
  }
  i.head.fa.fa-clone {
    font-size: 50px;
    margin-top: -33px;
}
i.headd.fa.fa-play-circle {
    font-size: 45px;
    color: #8C64D2;
}
i.head.fa.fa-bar-chart {
    font-size: 50px;
    margin-top: -33px;
}
  i.head.fa.fa-user-circle {
    font-size: 50px;
    margin-top:-33px;
    /* margin-right: 20px; */
}
  .status{
    text-align: center;
  }
  .card {
    box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
    margin-bottom: 1rem;
    border-radius: 11px;
}
  .row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin: 32px;
    }
</style>
@endpush
@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="row">
        <div class="col-lg-4 col-md-8 col-sm-8">
          <div class="card card-stats">
            <div class="card-body ">
              <div class="row">
                
                <div class="col-7 col-md-8">
                  <div class="numbers">
                    <h3 class="card-category">ALL USERS</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="dotlogo" viewBox="0 0 16 16">
  <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
</svg>


                  </div>
                  <hr>
                </div>
              </div>
              
            <div class="card-footer ">
              
              <div class="stats">
                <i class=" head fa fa-user-circle">
                 <span><strong><?=($status);?></strong>&nbsp;ACTIVE</span>
                 </i></div>
              </div>
            </div>
          </div>
          </div>

          <div class="col-lg-4 col-md-8 col-sm-8">
          <div class="card card-stats">
            <div class="card-body ">
              <div class="row">
                
                <div class="col-7 col-md-8">
                  <div class="numbers">
                    <h3 class="card-category">SIGNAGE</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="dotlogo" viewBox="0 0 16 16">
  <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
</svg>
                  </div>
                  <hr>
                </div>
              </div>
            <div class="card-footer ">
              
              <div class="statss">
              <i class='headds fas fa-broadcast-tower'></i>
                 <span><strong><?=($signage);?></strong>&nbsp;LIVE</span>
                 </i>
                </div>
              </div>
            </div>
          </div>
          </div>

          <div class="col-lg-4 col-md-8 col-sm-8">
          <div class="card card-stats">
            <div class="card-body ">
              <div class="row">
                
                <div class="col-7 col-md-8">
                  <div class="numbers">
                    <h3 class="card-category">ALL PLAYLIST</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="dotlogo" viewBox="0 0 16 16">
  <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
</svg>


                  </div>
                  <hr>
                </div>
              </div>
              <div class="card-footer ">
              
              <div class="statse">
                <i class=" headd fa fa-play-circle">
                 <span><strong><?=($playlist);?></strong>&nbsp;ACTIVE</span>
                 </i>
                </div>
              </div>
          </div>
        </div>
</div>
    </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="card card-stats">
            <div class="card-body ">
            <a href="http://127.0.0.1:8000/admin">
            <button class="bt" id="but">
              <i id="material-icons" class="material-icons">&#xe5d0;</i>
            </button>
            
            <button class="bt" id="">
            <i class="material-icons">&#xe5d5;</i>
            </button>
            </a>
            <table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Live</th>
      <th scope="col">Device Id</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  @foreach($signages as $vl)
    <tr>
      <td>{{$vl->name}}</td>
      <td><?php if($vl->live_status == 'offline'){ ?>
<i class='statuss fas fa-broadcast-tower '></i>
<?php }else{ ?>
<i class=' statusss fas fa-broadcast-tower'></i>
<?php } ?></td>
      <td>{{$vl->device_id}}</td>
      <td><?php if($vl->status == 'Active'){ ?>
        <button type="button" class="deac">Deactive</button>
  
</a>     
<?php }else{ ?>
  <button type="button" class="act">Active</button>  
<?php } ?>
</td>
    </tr>
    @endforeach
  </tbody>
</table>
            </div>
          </div>
          </div>
          </div>
</div>
</div>
    <!-- /.content-header -->
<!-- Main content -->
@endsection
@push("after-scripts")

@endpush