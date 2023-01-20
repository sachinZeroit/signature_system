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

  .form-control {
    height: calc(3.25rem + 2px);
}
.from{
  height: calc(4.25rem + 2px);
}

.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    min-height: 1px;
    background-color: white;
    padding: 2.25rem;
    margin: 49px;
    margin-top: -20px;
}
.imag {
    /* margin-top: 40px; */
    margin: 15px;
}
.form-group {
    margin-bottom: 2rem;
}
.footer{
  text-align:center;
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


.row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-bottom: 33px;
    margin-right: -7.5px;
    margin-left: -7.5px;
}

</style>
@endpush
@section('content')

<div class="card-header">
<h3 class="card-title">User Edit</h3>
</div>

<div class="row">
<div class="col-sm-12" id="resultres">
<div class="card-body">


<form method="post" action="<?=route('admin.user.update',$user->id);?>" enctype="multipart/form-data">
@csrf

<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Full Name</label>
    <input type="text" name="full_name" class="form-control from" value="{{$user->full_name}}">
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputname">User Name</label>
      <input type="text" class="form-control from" name="name" value="{{$user->name}}" disabled>
    </div>
    <div class="form-group col-md-6">
      <label for="inputpin">New Password</label>
      <input type="text" class="form-control from" name="new_password">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputname">Email</label>
      <input type="text" class="form-control from" name="email" value="{{$user->email}}" disabled>
    </div>
    <div class="form-group col-md-6">
      <label for="inputpin">Role</label>
      @if(Auth()->user()->role == 'admin')
            <select class="form-control from" name="role" required>
              <option value="">please select role</option>
              <option value="admin">admin</option>
              <option value="users">users</option>
            </select>
          @else
            <select class="form-control from" name="role" required>
              <option value="users">users</option>
            </select>
          @endif
    </div>

    <div class="col-md-8">
          <label for="exampleInputEmail1">Image</label>
          
          <input type="file" class="form-control from" name="image[]">
          </div>
          <div class="col-md-4">
            <div class="imag">
          <img src="{{$user->image}}" height="100px" width="100px">
        </div>
        </div>
        </div>
  </div>


  <div class=" footer my-5">
          <button type="cancel" class="cancel">Cancel</button>
          <button type="submit" value="submit" class="cancel">Save Changes</button>
        </div>

</form>
</div>
</div>
</div>
</div>
</div>

            @endsection