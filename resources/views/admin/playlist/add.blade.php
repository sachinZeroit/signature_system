@extends('admin.layouts.master')
@push("after-styles")
<style>
#drop-zone {
  width: 100%;
  min-height: 150px;
  border: 3px dashed rgba(0, 0, 0, .3);
  border-radius: 5px;
  font-family: Arial;
  text-align: center;
  position: relative;
  font-size: 20px;
  color: #7E7E7E;
}
#drop-zone input {
  position: absolute;
  cursor: pointer;
  left: 0px;
  top: 0px;
  opacity: 0;
}
/*Important*/
.btn:not(:disabled):not(.disabled) {
    background: #8C64D2;
    color: #fff;
    cursor: pointer;
}
.btn.disabled, .btn:disabled {
    background: #8C64D2;
    cursor: not-allowed;
}

.btn:not(:disabled):not(.disabled):hover{
  background:#3B2C8B;
}
.row.paginationrow {
    float: right;
    /* margin: -1px; */
    margin-top: 36px;
}

#drop-zone.mouse-over {
  border: 3px dashed rgba(0, 0, 0, .3);
  color: #7E7E7E;
}
/*If you dont want the button*/

#clickHere {
  display: inline-block;
  cursor: pointer;
  color: white;
  font-size: 17px;
  width: 150px;
  border-radius: 4px;
  background-color: #4679BD;
  padding: 10px;
}
.filename{
  position: relative;
    margin: 8px 0;
    border: 3px dashed rgba(0, 0, 0, .3);
    min-height: 50px;
}
.fa-lg {
    font-size: 1.33333333em;
    line-height: 0.70em;
    vertical-align: 379%;
    background:#3B2C8B;
    margin-left: -23px;
    color: white;
}
img {
    margin:1px;
    vertical-align: middle;
    border-style: none;
    
}
.uploadfiles {
    display: inline-block;
    padding: 8px 11px;
    position: relative;
}
.error{
  color:red;
}
.addi{
  margin-top:100px;
}
body {
  font-family: Arial;

}
h2 {
    font-size: 2rem;
    margin-top: 21px;
    margin-left: 22px;
}
.from{
  height: calc(4.25rem + -2px);
  margin-top:10px;
}
.paginationrow .hide{
    display: none;
}

.paginationrow .finals .active{
    display: block;
}

.tabrow li {
    display: inline-block;
    width: 33%;
    background: #dedede;
    padding: 30px 0;
    text-align: center;
    color: #fff;
    font-size: 16px;
}
.tabrow li a{
color:#fff;
}

.tabrow li.active{
    background: #3b2c8b !important;
}

.row.table-content .contents {
    display: none;
}
label:not(.form-check-label):not(.custom-file-label) {
    font-weight: 700;
    text-align: center;
    margin-top: 21px;
    /* margin: 27px; */
}
.tabcontent {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -6.5px;
    margin-left: -0.5px;
}
.row.table-content .contents.active {
    display: block;
}

.demo {
    margin-left: 29px;
    font-size: 2.5rem;
    background-color: #3B2C8B;
    padding: 19px;
    margin: 61px;
    color: white;
    border-radius: 8px;
    margin-top: 3px;
}
.card{
  margin: 64px;
  margin-top: -60px;
}
</style>
@endpush
@section('content')
<div class="demo">
<h1>Add New Playlist</h1>
</div>
<div class="card">
  <h2>New Playlist</h2>
  <br>
  <br>
  <div class="container-fluid">
    <form method="post" action="<?=route('admin.playlist.store');?>" enctype="multipart/form-data">
      @csrf
      <!---------tabs--------->
      <div class="row tabcontent">
            <ul class="col-sm-12 tabrow">
            <li class="item active" data-count="1">
            <a class="hyper" href="#step1"> tab1</a>
            </li>
            <li class="item" data-count="2">
                <a class="hyper" href="#step2"> tab2</a>
            </li>
            <li class="item" data-count="3">
                <a class="hyper" href="#step3"> tab3</a>
            </li>
            </ul>
      </div>
         <!-----//----tabs--------->
        <div class="row table-content">
                <!---------step1---------> 
          <div class="col-sm-12 contents active" id="step1">
          <div class="row">
            <label for="inputname" class="col-sm-4 col-form-label">Playlist Name:</label>
            <div class="col-sm-7">
              <input type="text" name="name" class="form-control from" placeholder="Please Enter Unique Name">
              @if($errors->any())
                <div class="error">    
                  {{$errors->first()}}
                </div>
              @endif

              @if (Session::has('success'))
                {!! Session::get('success') !!}
              @endif
            </div>
          </div>
          </div>
          <!----/-----step1--------->

          <!---------step2--------->
          <div class="col-sm-12 contents"  id="step2">
          <h1>The input accept attribute</h1>
        <center>
          <div id="drop-zone">
            <p>Drop files here...</p>
            <div id="clickHere">or click here.. <i class="fa fa-upload"></i>
              <input type="file" class="from" name="image[]" id="file" accept="audio/*,video/*, image/png, image/peng, image/jpeg, image/jpg, image/gif" multiple />
            </div>
          </div>
        </center>        
        <div id='filename' class="filename">
        </div>
          </div>
            <!-----/----step2--------->

              <!---------step3--------->
          <div class="col-sm-12 contents"  id="step3">
          <input type="number" class="from form-control" name="slidechangetime" value="5"> 
          </div>
              <!-----/----step3--------->
      </div>
       <!---------paginationrow--------->
       <div class="row paginationrow">
            <ul class="col-sm-12 pagepdbtnsec">
            <li class="btn  pagepdbtn prevbtn disabled">
            <a class="btn " href="#">Preview</a>
            </li>
            <li class="btn  pagepdbtn nextbtn">
            <a class="btn " href="#">next</a>
            </li>
            <li class="btn  hide finals">
            <button class="btn  sevsdbtn" type="submit">save</button>
            </li>
            </ul>
        </div>
         <!-----//----paginationrow--------->

    </form>
  </div>
</div>
</div>
@endsection
@push("after-scripts")
<script>
    $(document).ready(function(){

    /***************** tabrow start ******************************/
      $("body").on('click','ul.tabrow li a',function(e){
        e.preventDefault();
        const self=$(this);
        const parents=self.parent();
        const count=parents.data('count');
        const showpageId=$(this).attr('href');

        $('ul.tabrow li').removeClass('active');

        parents.addClass('active');

        $('.row.table-content .contents').removeClass('active');
        $(showpageId).addClass('active');

        if(count == '1'){
            $('.pagepdbtnsec li.prevbtn').addClass('disabled');
        }else{

            $('.pagepdbtnsec li').removeClass('disabled');
        }

        if(count == '3'){
         
            $('.pagepdbtnsec li.nextbtn').addClass('hide');
            $('.pagepdbtnsec li.finals').removeClass('hide');
        }else{
            $('.pagepdbtnsec li.finals').addClass('hide');
            $('.pagepdbtnsec li.nextbtn').removeClass('hide');
        }

      });
     
    /***************** tabrow end ******************************/


    
    /***************** pre pagepdbtnsec start ******************************/
    $("body").on('click','ul.pagepdbtnsec li.prevbtn',function(e){
        e.preventDefault();
        const self=$(this);
        const parents=self.parent();
        const countnum=($('ul.tabrow li.active').data('count'))?$('ul.tabrow li.active').data('count'):1;
        const count=countnum-1;
        if(self.hasClass('disabled') == false){
            const showpageId= $('ul.tabrow li:nth-child('+count+') a').attr('href');

            $('ul.tabrow li').removeClass('active');
            if(countnum == '1'){
            $('ul.tabrow li:nth-child(1)').addClass('active');
            }else{
            $('ul.tabrow li:nth-child('+count+')').addClass('active');
            }

            if(count == '3'){

            $('ul.pagepdbtnsec li.nextbtn').addClass('hide');
            $('ul.pagepdbtnsec li.finals').removeClass('hide');
            }else{

                $('ul.pagepdbtnsec li.finals').addClass('hide');
                $('ul.pagepdbtnsec li.nextbtn').removeClass('hide');

                if(count == '1'){
                    $('ul.pagepdbtnsec li:nth-child(1)').addClass('disabled');
                }

            }

        $('.row.table-content .contents').removeClass('active');
        $(showpageId).addClass('active');

        }   
       
      });
     
    /*****************  pre  pagepdbtnsec end ******************************/

     
    /***************** next pagepdbtnsec start ******************************/
    $("body").on('click','ul.pagepdbtnsec li.nextbtn',function(e){
        e.preventDefault();
        const self=$(this);
        const parents=self.parent();
        const countnum=($('ul.tabrow li.active').data('count'))?$('ul.tabrow li.active').data('count'):1;
        const count=countnum+1;
        const showpageId= $('ul.tabrow li:nth-child('+count+') a').attr('href');
       
        $('ul.tabrow li').removeClass('active');

        if(count>1){
            $('ul.pagepdbtnsec li:nth-child(1)').removeClass('disabled');
            $('ul.pagepdbtnsec li.nextbtn').addClass('hide');
            $('ul.pagepdbtnsec li.finals').removeClass('hide');
        }else{
            $('ul.pagepdbtnsec li:nth-child(1)').addClass('disabled');
        }

        if(countnum == '3'){
            $('ul.tabrow li:nth-child(3)').addClass('active');
          
        }else{
            $('ul.tabrow li:nth-child('+count+')').addClass('active');
        }
       
        if(count == '3'){
            $('ul.pagepdbtnsec li.nextbtn').addClass('hide');
            $('ul.pagepdbtnsec li.finals').removeClass('hide');
        }else{
            $('ul.pagepdbtnsec li.finals').addClass('hide');
            $('ul.pagepdbtnsec li.nextbtn').removeClass('hide');
        }

        $('.row.table-content .contents').removeClass('active');
        $(showpageId).addClass('active');
        
      });
     
    /*****************  next pagepdbtnsec end ******************************/
console.log('sssss');

var finalFiles = {};
var dropZoneId = "drop-zone";
  var buttonId = "clickHere";
  var mouseOverClass = "mouse-over";
var dropZone = $("#" + dropZoneId);
 var inputFile = dropZone.find("input.from");
 
$(function() {
  var ooleft = dropZone.offset().left;
  var ooright = dropZone.outerWidth() + ooleft;
  var ootop = dropZone.offset().top;
  var oobottom = dropZone.outerHeight() + ootop;
 
  document.getElementById(dropZoneId).addEventListener("dragover", function(e) {
    e.preventDefault();
    e.stopPropagation();
    dropZone.addClass(mouseOverClass);
    var x = e.pageX;
    var y = e.pageY;

      inputFile.offset({
        top: y - 15,
        left: x - 100
      });
    

  }, true);

  if (buttonId != "") {
    var clickZone = $("#" + buttonId);

    var oleft = clickZone.offset().left;
    var oright = clickZone.outerWidth() + oleft;
    var otop = clickZone.offset().top;
    var obottom = clickZone.outerHeight() + otop;

    $("#" + buttonId).mousemove(function(e) {
      var x = e.pageX;
      var y = e.pageY;
      
      inputFile.offset({
          top: y - 15,
          left: x - 160
        });
    });
  }

  document.getElementById(dropZoneId).addEventListener("drop", function(e){
    $("#" + dropZoneId).removeClass(mouseOverClass);
  }, true);


  inputFile.on('change', function(e){
    finalFiles = {};
    $('#filename').html("");
    var fileNum = this.files.length,
      initial = 0,
      counter = 0;

    $.each(this.files,function(idx,elm){
       finalFiles[idx]=elm;
    });

console.log('sssss',finalFiles);

$.each(this.files,function(idx,f){

var reader = new FileReader();
reader.onload = function (e) {

if(f.type.match("image.*")) {

var html = '<div class="uploadfiles" id="file_'+ idx +'"><img width="150px" height="150px" src="'+e.target.result+'" data-file="'+f.name+'" class="selFile"><span class="fa fa-times-circle fa-lg closeBtn removeimgbt" title="remove"></span></div>';
}else if(f.type.match("video.*")){
    var html = '<div class="uploadfiles videofiles" id="file_'+ idx +'"><video class="selFile" width="150px" height="150px" controls name="media"><source src="'+e.target.result+'" type="video/mp4"></video><span class="fa fa-times-circle fa-lg closeBtn removeimgbt" title="remove"></span></div>';
}else{
   var html = '';
}

$('.filename').append(html);

}
reader.readAsDataURL(f); 
});



})

$(document).on("click",".removeimgbt",function(e)
{
  inputFile.val('');
  var jqObj = $(this);
  var container = jqObj.closest('div');
  var index = container.attr("id").split('_')[1];
  container.remove(); 

  delete finalFiles[index];
  console.log(finalFiles);


});

});

});
$("#file").change(function (e) {
    var file, img;
    if ((file = this.files[0])) {
       
     var reader = new FileReader();     
     reader.onload = (r) => {
     img = new Image();
     img.src = r.target.result;  
     img.onload = function () {
          var height = this.height;
          var width = this.width;
          if (height > 100 || width > 100) {
            alert("Height and Width must not exceed 100px.");
            return false;
          }
          alert("Uploaded image has valid Height and Width.");
          return true;
       };

    };
    reader.readAsDataURL(file);
  } 
});
</script>

@endpush