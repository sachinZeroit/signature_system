@extends('admin.layouts.master')
@push("after-styles")
<style>
.card-header{
color:white;
background-color:#3B2C8B;
margin: 23px;
border-radius:5px;
padding:25px;
margin-top:-13px;

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
  <div class="col-md-12">
    @if($errors->any())
      <div class="alert alert-danger">
        {{$errors->first()}}
      </div>
    @endif

    @if (Session::has('success'))
      <div class="alert alert-success">
        {!! Session::get('success') !!}
      </div>
    @endif
  </div>
  <div class="card-header">
    <h2>Add New User<h2>
  </div>

  <form method="POST" action="<?=route('admin.user.store');?>" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Full Name</label>
        <input type="text" class="form-control from" name="full_name" required>
      </div>

      <div class="row">
        <div class="col">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" class="form-control from" name="name" required>
        </div>
        <div class="col">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" class="form-control from" name="email" required>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="exampleInputEmail1">Password</label>
          <input type="password" class="form-control from" name="password" required>
        </div>
        <div class="col">
          <label for="exampleInputEmail1">Confirm Password</label>
          <input type="password" class="form-control from" name="confir_password" required>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="exampleInputEmail1">Image</label>
          <input type="file" class="form-control from" name="image[]">
        </div>
        <div class="col">
          <label for="cars">Role</label>
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
      </div>

      <div class=" footer my-5">
        <button type="cancel" class="cancel">Cancel</button>
        <button type="submit" value="submit" class="cancel">Save Changes</button>
      </div>
    </div>
    <!-- /.card-body -->
  </form>
  </div>
 
@endsection

