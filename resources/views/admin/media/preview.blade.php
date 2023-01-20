@extends('admin.layouts.master')
@push("after-styles")
<style>
  .addnew{
    color:white;
    padding:7px;
    margin:10px;
    float:right;
    background-color:#8C64D2;
    border:none;
  }
  div.dataTables_wrapper div.dataTables_filter input {
    margin-left: 0.5em;
    display: inline-block;
    width: auto;
    height: 42px;
}
div.dt-buttons {
    position: initial;
    float: right;
    /* height: 53px; */
    margin-top: -56px;
}
div.dataTables_wrapper div.dataTables_length select {
    width: auto;
    height: 41px;
    display: inline-block;
}
  .addnew:hover{
background-color:#3B2C8B;
  }
  .card-header{
    color:white;
    background-color:#3B2C8B;
    margin: 23px;
    border-radius:5px;
    padding:5px;
    margin-top:3px;
    
  }
  .tab{
    background-color:white;
  }
  .tablinks{
    border:none;
    background-color:white;
    margin-left:16px;
    margin-top:23px;
  }
  
.card-body {
    background-color: white;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1.25rem;
}
.tab button:hover {
  text-decoration: underline 4px solid #9B43DF;
  background-color: white;
}
.tab {
    margin-top: -20px;
    background-color: white;
}
.head{
  padding:5px;
  margin:25px;
  margin-top:-12px;
}

.addbutton{
  background-color:#3B2C8B;
  border:none;
  color:white;
  padding:15px;
  width:50px;
  border-radius:3px;
}

.addbutton:hover{
  background:#8C64D2;
}

.btn:not(:disabled):not(.disabled) {
    background-color: #8C64D2;
    margin: 9px;
    border:none;
    cursor: pointer;
    border-radius: 9px;
  }

  
.btn-group>.btn:not(:last-child):not(.dropdown-toggle) {
    border-top-right-radius: -220;
    border-bottom-right-radius: -67;
    border-radius: 9px;
}
.btn:not(:disabled):not(.disabled):hover {
    background-color: #3B2C8B;
    
}
div.dt-buttons {
    position: initial;
    float: right;
}

.page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #3B2C8B;
    border-color: #3B2C8B;
}
hr {
    margin-top: 0rem;
    margin-bottom: 0rem;
    border: 0;
    border-top: 1px solid rgb(0 0 0 / 30%);
}
</style>
@endpush
@section('content')

  @if($errors->any())
    <h4>{{$errors->first()}}</h4>
  @endif

  @if (Session::has('success'))
    <div class="alert alert-success">
      {!! Session::get('success') !!}
    </div>
  @endif

  @if($errors->any())
    <div class="alert alert-danger">
      {{$errors->first()}}
    </div>
  @endif
  <div class="card-header ">


<h2>Preview Playlist</h2>
</div>

  <div class="head">
      <div class="row">
        <div class="col-sm-12" id="resultres">
          <div class="card-body">
            <table id="example2" class="table">
              <thead>
                  <tr>
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">#</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">NAME</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">TIME DURATION</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">TYPE</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">ATTACHMENT</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">ACTION</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                  $count=0; ?>
                @foreach($media as $vl)
                  <?php
                  $count=$count+1;
                  ?>
                  <tr>
                    <td>{{ $count }}</td>
                    @foreach($playlists as $play)
                    <td>{{ $play->name }}</td>
                    <td>@if($vl->type == 'mp4')
                    <p class="mhdi_video_duration"></p>
                      @else
                      {{ $play->slidechangetime }}
                      @endif
                      </td>
                      @endforeach
                    <td>{{ $vl->type }}</td>
                    <td>
                                @if($vl->type == 'mp4')
                                <video class="mhdividdur" width="250px" height="150px" controls>
                                    <source src="<?=asset('/').$vl->url;?>" type="video/mp4">
                                </video>
                                
                            @else
                                <a class="hyperbtn" target="__blank" href="{{asset($vl->url)}}">
                                    <img src="<?=asset('/').$vl->url;?>" class="imgfile" width="150px" height="150px">
                                </a>
                            @endif
                            </td>
                            <td><a href="{{route('admin.media.delete',$vl->id )}}">
                        <button class="addbutton">
                          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                          </svg>
                        </button>
                      </a></td>                 
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      </div>
  </div>
@endsection
@push("after-scripts")

<script>
var videos = document.querySelectorAll(".mhdividdur");
var durationsEl = document.querySelectorAll(".mhdi_video_duration");
for(let i = 0; i < videos.length; i++) {
  videos[i].onloadedmetadata = function() {
    var mzhours = Math.floor(videos[i].duration / 60);
    var mzminutes = Math.floor(videos[i].duration / 60);
    var mzseconds = Math.floor(videos[i].duration - (mzminutes * 60));
    durationsEl[i].innerHTML =mzhours+':'+mzminutes+':'+mzseconds;  };
}
    </script>

@endpush