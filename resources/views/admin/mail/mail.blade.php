@extends('admin.layouts.master')
@push("after-styles")
<style>
.cont {
    font-family: 'Poppins', sans-serif, 'arial';
    font-weight: 600;
    margin-left: 26%;
    color:#fff;
    font-size: 65px;
}

h4 {
    font-family: 'Roboto', sans-serif, 'arial';
    margin-left: 34%;
    font-weight: 400;
    font-size: 20px;
    color: #fff;
    line-height: 1.5;
}
/* ///// inputs /////*/

input:focus ~ label, textarea:focus ~ label, input:valid ~ label, textarea:valid ~ label {
    font-size: 0.75em;
    color: #999;
    top: -5px;
    -webkit-transition: all 0.225s ease;
    transition: all 0.225s ease;
}

.styled-input {
    float: left;
    width: 293px;
    margin: 1rem 0;
    position: relative;
    border-radius: 4px;
}

@media only screen and (max-width: 768px){
    .styled-input {
        width:100%;
    }
}

.styled-input label {
    color: #999;
    padding: 1.3rem 30px 1rem 30px;
    position: absolute;
    top: -10px;
    left: 0;
    -webkit-transition: all 0.25s ease;
    transition: all 0.25s ease;
    pointer-events: none;
}

.styled-input.wide { 
    width: 650px;
    max-width: 100%;
}

input,
textarea {
    padding: 13px;
    border: 0;
    width: 100%;
    font-size: 1rem;
    background-color: #fff;
    color: #000000;
    border-radius: 4px;
}

input:focus,
textarea:focus { outline: 0; }

input:focus ~ span,
textarea:focus ~ span {
    width: 100%;
    -webkit-transition: all 0.075s ease;
    transition: all 0.075s ease;
}

textarea {
    width: 100%;
    min-height: 6em;
}

.input-container {
    width: 650px;
    max-width: 100%;
    margin: 20px auto 25px auto;
}

.submit-btn {
    float: right;
    padding: 7px 35px;
    border-radius: 60px;
    display: inline-block;
    background-color: #4b8cfb;
    color: white;
    font-size: 18px;
    cursor: pointer;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.06),
              0 2px 10px 0 rgba(0,0,0,0.07);
    -webkit-transition: all 300ms ease;
    transition: all 300ms ease;
}
.container {
    background: #d1e0e0;
}

.submit-btn:hover {
    transform: translateY(1px);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,0.10),
              0 1px 1px 0 rgba(0,0,0,0.09);
}

@media (max-width: 768px) {
    .submit-btn {
        width:100%;
        float: none;
        text-align:center;
    }
}

input[type=checkbox] + label {
  color: #ccc;
  font-style: italic;
} 

input[type=checkbox]:checked + label {
  color: #f00;
  font-style: normal;
}
.card-body {
    background-color: white;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1.25rem;
}
input:valid ~ label, textarea:valid ~ label {
    font-size: 0.75em;
    color: #999;
    top: -23px;
    -webkit-transition: all 0.225s ease;
    transition: all 0.225s ease;
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
  <div class="head">
  <div class="card-body">
  <div class="container">
	<div class="row">
			<h2 class="cont">contact us</h2>
	</div>
	<div class="row">
			<h4 style="text-align:center">We'd love to hear from you!</h4>
	</div>
    <form action="{{route('admin.mail.mail')}}" method="post" enctype="multipart/form-data">
    @csrf

	<div class="row input-container">
			<div class="col-xs-12">
				<div class="styled-input wide">
					<input type="text" name="name" required />
					<label>Name</label> 
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="styled-input">
					<input type="email" name="email" required />
					<label>Email</label> 
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="styled-input" style="float:right;">
					<input type="text" name="subject" required />
					<label>Subject</label> 
				</div>
			</div>
            
            <div class="col-xs-12">
				<div class="styled-input wide">
					<input type="file" name="file[]" multiple="multiple"/>
					<label>File</label> 
				</div>
			</div>
			<div class="col-xs-12">
				<div class="styled-input wide">
					<textarea type="text" name="body" required></textarea>
					<label>Message</label>
				</div>

			<div class="col-xs-12">
			<input class="btn-lrg submit-btn" type="submit" value="Send Message">
			</div>
	</div>
</div>

</div>
</div>
</form>
</div>
  @endsection
@push("after-scripts")
@endpush