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

<div class="card-header">
<h3 >Term Condition</h3>
<a href="http://127.0.0.1:8000/admin/term" ><button type="button" class="addnew">Term Condition List</button></a>
</div>

<div class="row">
<div class="col-sm-12" id="resultres">
<div class="card-body">


<form method="post" action="<?=route('admin.term.store');?>" enctype="multipart/form-data">
@csrf
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" name="name" class="form-control">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Content</label>
    <input type="text" name="content" class="form-control">
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
@endsection
