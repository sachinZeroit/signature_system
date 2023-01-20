
@extends('admin.layouts.master')
@push("after-styles")
<style>
   .card-header {
    color: white;
    background-color: #3B2C8B;
    margin: 23px;
    border-radius: 5px;
    padding: 31px;
    margin-top: 10px;
}
.form-control{
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

<div class="col-lg-12 col-md-12 col-sm-12">
    
    @if($errors->any())
    <div class="alert alert-danger">
    {{$errors->first()}}
    @endif

@if (Session::has('success'))
    <div class="alert alert-success">
    {!! Session::get('success') !!}
    </div>
    @endif
</div>

<div class="card-header ">
<h3">Profile</h3>
</div>

    <form method="post" action="<?=route('admin.update_profile',$user->id);?>" enctype="multipart/form-data">
      {{ csrf_field() }}
<div class="card-body">
<div class="form-group">
    <label for="exampleInputEmail1">Full Name</label>
    <input type="text" class="form-control" name="full_name" value="{{$user->full_name}}">
</div>

  <div class="row">
    <div class="col">
      <label for="exampleInputName">Name</label>
      <input type="text" class="form-control" name="name" value="{{$user->name}}">
    </div>
    <div class="col">
      <label for="exampleInputEmail1">Email</label>
      <input type="email" class="form-control" name="email" value="{{$user->email}}" readonly>
    </div>
</div>
    <div class="row">
      <div class="col">
        <label for="exampleInputPassword1">New Password</label>
        <input type="text" class="form-control" name="new_password" >
      </div>
      <div class="col">
        <label for="cars">Role</label>
        <input type="text" class="form-control" name="role" value= "<?=$user->role;?>" readonly>
      </div>
    </div>

  <div class="row">
    <div class="col">
    <label for="exampleInputEmail1">Image</label>
    <input type="file" class="form-control" name="image[]">
    </div>
    <div class="col">
    <label for="cars">Status</label>
      <input type="text" class="form-control" name="status" value="{{$user->status}}" readonly>
    </div>
  </div>

  <div class=" footer my-5">
          <button type="cancel" class="cancel">Cancel</button>
          <button type="submit" value="submit" class="cancel">Save Changes</button>
        </div>
</div>
<!-- /.card-body -->
</form>
</div>
</div>
</div>
@endsection