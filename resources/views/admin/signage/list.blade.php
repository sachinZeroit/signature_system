@extends('admin.layouts.master')
@push("after-styles")
<style>
.disabled-link {
  pointer-events: none;
}
button.active {
  border: none;
    padding: 8px;
    border-radius: 5px;
    background: #3B2C8B;
    width: 75px;
}
a {
    color: black;
    text-decoration: none;
    background-color: transparent;
}
a.status {
    color: #fff;
}

button.deactive {
    border: none;
    padding: 8px;
    border-radius: 5px;
    background: #8C64D2;
    width: 75px;
}
a.status.disabled-link {
    color: #fff;
}
button.btn.disabled.deactive {
    border: none;
    background: #8C64D2;
    width:93px;
    /* color: #fff; */
}button.btn.disabled.active {
    border: none;
    background: #3B2C8B;
    width:93px;
    /* color: #fff; */
}

.addnew{
    color:white;
    padding:7px;
    margin:10px;
    float:right;
    background-color:#8C64D2;
    border:none;
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
    margin-top:-13px;
    font-family: Arial, Helvetica, sans-serif;
  }
 
  .tab{
    font-family: Arial, Helvetica, sans-serif;
    background-color:white;
  }
  .tablinks{
    border:none;
    background-color:white;
    margin-left:16px;
    margin-top:23px;
    font-family: Arial, Helvetica, sans-serif;
  }
  
.card-body {
    background-color: white;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1.25rem;
    font-family: Arial, Helvetica, sans-serif;
  }

.cancel {
    margin: 5px;
    color: white;
    font-size: 25px;
    border: none;
    padding: 15px;
    background-color: #3B2C8B;
    border-radius: 9px;
}
    .cancel:hover {
      background-color:#8C64D2;
}
.models{
  padding:30px;
}
  .tab {
    margin-top: -20px;
    background-color: white;
}
.head{
  padding:5px;
  margin:40px;
  margin-top:-28px;
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
    margin-top:-51px;
    cursor: pointer;
}

h2 {
    font-size: 2rem;
    margin-top: 19px;
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

.statuss {
  background-color: #8C64D2;
    padding: 16px;
    color: white;
}
.statuss:hover {
  background-color: #3B2C8B;
    
}
.statusss {
    padding: 16px;
    color: white;
    background-color: #3B2C8B;
}
.statusss:hover{
    
    background-color: #8C64D2;
}

</style>
@endpush
@section('content')
<div class="col-md-12 mt-3">
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


<h2>List of Signages</h2>


  <!-- Trigger the modal with a button -->
  @if(Helper::is_permission())
  <button type="button" class="btn btn-info addnew" data-toggle="modal" data-target="#myModal">Add Signage</button>
</div>
@endif
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <form method="POST" action="{{url('admin/signage/store')}}" id = "addForm" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
        <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputname">Name</label>
      <input type="text" class="form-control models" name="name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputpin">Pin</label>
      <input type="text" class="form-control models" name="pin">
    </div>
  </div>


  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputpin">area_installed</label>
      <input type="text" class="form-control models" name="area_installed">
    </div>
  </div>
    
    
    
  <div class="modal-footer">
          <button type="button" class="cancel" data-dismiss="modal">Close</button>
          <button type="submit" class="cancel" name="submit" value="submit">Save</button>
        </div>
  
      </div>
  
</form>       
    </div>
  </div>
  </div>


  <!-- editModal -->
  <div class="modal fade" id="editModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        
        <form method="POST" action="{{url('admin/signage')}}" id = "editform" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id">

        <div class="modal-body">
        <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputname">Name</label>
      <input type="text" class="form-control models" id="name" name="name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputpin">Pin</label>
      <input type="text" class="form-control models" id="pin" name="pin">
    </div>
  </div>


  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputpin">Area Installed</label>
      <input type="text" class="form-control models" id="area_installed" name="area_installed">
    </div>
  </div>

  </div>
  <div class="modal-footer">
          <button type="button" class="cancel" data-dismiss="modal">Close</button>
          <button type="submit" class="cancel">update</button>
        </div>
  
      </div>
  
</form>       
    </div>
  </div>
  </div>

  <div class="head">
<div id="London" class="tabcontent">
<div class="row">
<div class="col-sm-12" id="resultres">
<div class="card-body">
<table id="example1" class="table">
<thead>
<tr>
<th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">#</th>
<th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Live</th>
<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">NAME</th>
<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">User</th>
<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Pin</th>
<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Area Installed</th>
<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">PREVIEW</th>
<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">STATUS</th>
<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">ACTION</th>
</tr>
</thead>
<tbody>
<?php
$count=0; ?>
@foreach($signages as $vl)
<?php
 $count=$count+1;
  ?>
<tr>
<td>{{ $count }}</td>
<td class="online">
<?php if($vl->live_status == 'offline'){ ?>
<a href="{{route('admin.signage.live',$vl->id )}}"><i class='statuss fas fa-broadcast-tower '></i>
  </a>     
<?php }else{ ?>
<a href="{{route('admin.signage.offline',$vl->id )}}"><i class=' statusss fas fa-broadcast-tower'></i>

</a>  
<?php } ?>
</td>
<td>{{ $vl->name }}</td>
<td>{{ $vl->user_id }}</td>
<td>{{ $vl->pin }}</td>
<td>{{ $vl->area_installed}}</td>
<td><a href="{{route('admin.signage.signage_preview',$vl->id )}}">
                    preview
                    </a></td>
<td>
@if(Helper::is_permission())
<?php if($vl->status == 'Active'){ ?>
  <button class="active"><a href="{{route('admin.signage.deactive',$vl->id )}}" class="status">
  Deactive
</a></button>     
<?php }else{ ?>
  <button class="deactive"><a href="{{route('admin.signage.active',$vl->id )}}" class="status">
  Active
</a>  </button>
<?php } ?>
@else
<?php if($vl->status == 'Active'){ ?>
  <button class="btn disabled active"><a href="{{route('admin.signage.deactive',$vl->id )}}" class="status disabled-link">
  Deactive
</a> </button>    
<?php }else{ ?>
  <button class="btn disabled deactive" disabled><a href="{{route('admin.signage.active',$vl->id )}}" class="status disabled-link">Active</a></button>
<?php } ?>
@endif
</td>
                      
<td>
@if(Helper::is_permission())
<a href="{{route('admin.signage.edit_schedule',$vl->id )}}"><button class="addbutton"><svg width="25" height="25" fill="white" class="bi bi-alarm" viewBox="0 0 16 16">
  <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z"/>
  <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/>
</svg></button></a>
<button type="button" value="{{$vl->id}}" class="editbtn addbutton"><svg width="25" height="25" fill="white" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
</svg></button>
  <a href="{{route('admin.signage.delete',$vl->id )}}"><button class="addbutton"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg></button></a>
@else
<button class="addbutton btn disabled" disabled><a href="{{route('admin.signage.edit_schedule',$vl->id )}}" class="disabled-link"><svg width="25" height="25" fill="white" class="bi bi-alarm" viewBox="0 0 16 16">
  <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z"/>
  <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/>
</svg></a></button>
<button type="button" value="{{$vl->id}}" class="editbtn addbutton btn disabled" disabled><svg width="25" height="25" fill="white" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
</svg></button>
  <button class="addbutton btn disabled" disabled><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-trash" viewBox="0 0 16 16"><a href="{{route('admin.signage.delete',$vl->id )}}"class="disabled-link">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</a></svg></button>

@endif
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
</div>
@endsection
@push("after-scripts")
<script>
$(document).ready(function () {

$(document).on('click','.editbtn', function(){
var id = $(this).val();
//alert(signage_id);

$('#editModal').modal('show');

$.ajax({
type: "GET",
url: "admin/signage/"+id,
success: function(response){
//console.log(response.signage.name);

$('#name').val(response.signage.name);
$('#pin').val(response.signage.pin);
$('#area_installed').val(response.signage.area_installed);
$('#id').val(id);
}
});
});
});
   
</script>

@endpush