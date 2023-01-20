@extends('admin.layouts.master')
@push("after-styles")
<style>
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 44px;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 25px;
    position: absolute;
    top: 14px;
    right: 1px;
    width: 23px;
}

i#addmorebtn {
    font-size: 48px;
    margin-top: -2px;
}
i.fa.fa-minus-circle.btn-remove {
    font-size: 49px;
}

.select2-container--default.select2-container--focus .select2-selection--single {
    border-color: #ccd0d5;
}
.select2-container--default .select2-selection--single {
    border: 1px solid #ced4da;
    padding: 0.46875rem 0.75rem;
    height: calc(3.25rem + 2px);
}
.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #8C64D2;
    /* border: 1px solid; */
    border-radius: 4px;
    cursor: default;
    float: left;
    margin-right: 5px;
    margin-top: 5px;
    padding: 8px 8px;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
    /* color: #999; */
    color: white;
    cursor: pointer;
    display: inline-block;
    font-weight: bold;
    margin-right: 2px;
}

.select2-container--default.select2-container--focus .select2-selection--multiple {
    border: solid #bdbebf8c 1px;
    outline: 0;
}
.select2-container--default .select2-selection--multiple .select2-selection__rendered li:first-child.select2-search.select2-search--inline .select2-search__field {
    width: 100%!important;
    height: 41px;
}

.demo{
margin-top:10px;
}
.footer{
text-align:center;
}
.card-body {
-ms-flex: 1 1 auto;
flex: 1 1 auto;
min-height: 1px;
padding: 1.25rem;
margin-bottom: 30px;
}

.card{
margin:21px;
margin-top:-15px;
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

.from{
height: calc(4.25rem + 2px);
}

.btn-addrow {
color: #8C64D2;
font-size:45px;
margin-top: 9px;
}

.btn-addrow:hover {
color:#3B2C8B;
}
.editor{
background-color:#3B2C8B;
color:white;
padding:25px;
border-radius:5px;
margin:10px;
}

.container, .container-lg, .container-md, .container-sm, .container-xl {
max-width: 1433px;
}

.btn-remove{
color: #3B2C8B;
font-size: 45px;
margin-top: 9px;
}

.btn-remove:hover{
color:#8C64D2 ;

}
.duplicate-row{
margin-top:15px;
}
</style>

@endpush

@section('content')
  <div class="editor my-3">
    <h4>Signages Edit Schedule</h4>
  </div>
  <div class="card card-primary">
    <div class="card-body">
      <form method="post" id="multiples" action="<?=route('admin.signage.edit_update',$signages->id);?>" enctype="multipart/form-data" class="multiple">
        @csrf  
        <div class="container">
          <div class="row py-3">
            <div class="col-sm-3">
              <h4>Playlist</h4>
            </div>
            
            <div class="col-sm-2">
              <h4>Schedule Start</h4>
            </div>
            
            <div class="col-sm-3">
              <h4>Days</h4>
            </div>
            
            <div class="col-sm-3">
              <h4>Schedule</h4>
            </div>
            <div class="col-sm-1">
              <h4>Action</h4>        
            </div>
          </div>
        </div>

        @if(!$schedule->isEmpty())
          @foreach($schedule as $val) 
            <div class="container duplicate-row ">
              <input type="hidden" name="schedule_id[]" value="{{$val->id}}"> 
              <div class="row ">
              
              <div class="col-sm-3">
                <div class="form-group">
                  <select name="playlist_id[]" class=" select2 " style="width: 100%;">
                    <option selected="selected" value="0">Select Playlist</option>
                    @foreach($playlists as $vl)  
                      <option value="<?=$vl->id?>"<?=($val->playlist_id == $vl->id)?'selected':'';?>>
                        <?=$vl->name;?>
                      </option>
                    @endforeach
                    </select>
                </div>
              </div>
              
                <div class="col-sm-2">
                <div class="form-group">
                  <select name="start_schedule" class=" select2 " style="width: 100%;">
                    <option selected="selected">{{$val->start_schedule}}</option>
                    <option value="days">Days</option>
                    <option value="stop schedule">Stop Schedule</option>
                    <option value="schedule">Schedule</option>
                    </select>
                </div>
              </div>
                
              <div class="col-sm-3">
                <div class="form-group ">
                  <select name="days" class="select2" multiple="multiple" data-placeholder="Choose" style="width: 100%;">
                  <option selected="selected">{{$val->days}}</option>
                  <option value="all">All</option>  
                  <option value="monday">Monday</option>
                    <option alue="tuesday">Tuesday</option>
                    <option value="wednesday">Wednesday</option>
                    <option value="thursday">Thursday</option>
                    <option value="friday">Friday</option>
                    <option value="saturday">Saturday</option>
                    <option value="sunday">Sunday</option>
                  </select>
                </div>
                </div>
                
                <div class="col-sm-3">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="text" name="daterange" class="form-control">
                    </div>
                    <!-- /.input group -->
                  </div>
                </div>
                
                <div class="col-sm-1">
                  <i id="addmorebtn" class="fa fa-plus-circle btn-addrow"></i>    
                  <i class="fa fa-minus-circle btn-remove"></i>    
                </div>
              </div>
            </div>
          @endforeach
            </div>
            </div>
        @else
          <div class="container duplicate-row ">
            <input type="hidden" name="schedule_id[]" value="0">
            <div class="row ">

            <div class="col-sm-3">
                <div class="form-group">
                  <select name="playlist_id[]" class="select2" style="width: 100%;">
                    <option selected="selected" value="0">Select Playlist</option>
                    @foreach($playlists as $vl)  
                    <option value="<?=$vl->id?>"><?=$vl->name;?></option>
                  @endforeach
                    </select>
                </div>
              </div>

              <div class="col-sm-2">
                <div class="form-group">
                  <select name="start_schedule" class="select2" style="width: 100%;">
                  <option selected="selected" value="0">Select Schedule</option>
                    <option value="days">Days</option>
                    <option value="stop schedule">Stop Schedule</option>
                    <option value="schedule">Schedule</option>
                    </select>
                </div>
              </div>

              <div class="col-sm-3">
              <div class="form-group ">
                  <select name="days" class="select2" multiple="multiple" data-placeholder="Choose" style="width: 100%;">
                  <option value="all">All</option>  
                  <option value="monday">Monday</option>
                    <option alue="tuesday">Tuesday</option>
                    <option value="wednesday">Wednesday</option>
                    <option value="thursday">Thursday</option>
                    <option value="friday">Friday</option>
                    <option value="saturday">Saturday</option>
                    <option value="sunday">Sunday</option>
                  </select>
                </div>    
              </div>
              
              <div class="col-sm-3">
                <div class="form-group">
                    <div class="input-group">
                      <input type="text" name="daterange" class="form-control">
                    </div>
                      <!-- /.input group -->
                </div>
              </div>
              
              <div class="col-sm-1">
                <i id="addmorebtn" class="fa fa-plus-circle btn-addrow"></i>    
                <i class="fa fa-minus-circle btn-remove"></i>    
              </div>
            </div>
          </div>
        @endif  
        <div class=" footer my-5">
          <button type="cancel" class="cancel">Cancel</button>
          <button type="submit" value="submit" class="cancel">Save Changes</button>
        </div>
      </form>

<div class="schedule" style="display:none;">
  <div class="container duplicate-row  ">
    <input type="hidden" name="schedule_id[]" value="0">
    <div class="row">
      <div class="col-sm-3">
        <div class="form-group">
          <select name="playlist_id[]" class="select2" style="width: 100%;">
            <option selected="selected" value="0">Select Playlist</option>
            @foreach($playlists as $vl)  
              <option value="<?=$vl->id?>"><?=$vl->name;?></option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="col-sm-2">
        <div class="form-group">
          <select name="start_schedule" class="select2" style="width: 100%;">
            <option selected="selected" value="0">Select Schedule</option>
            <option value="days">Days</option>
            <option value="stop schedule">Stop Schedule</option>
            <option value="schedule">Schedule</option>
          </select>
        </div>
      </div>
      
      <div class="col-sm-3">
        <div class="form-group ">
          <select name="days" class="select2" multiple="multiple"  data-placeholder="Choose" style="width: 100%;">
          <option value="all">All</option>  
          <option value="monday">Monday</option>
            <option value="tuesday">Tuesday</option>
            <option value="wednesday">Wednesday</option>
            <option value="thursday">Thursday</option>
            <option value="friday">Friday</option>
            <option value="saturday">Saturday</option>
            <option value="sunday">Sunday</option>
          </select>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <div class="input-group">
            <input type="text" name="daterange" class="form-control">
          </div>
        </div>
      </div>

      <div class="col-sm-1">
        <i id="addmorebtn" class="fa fa-plus-circle btn-addrow"></i>    
        <i class="fa fa-minus-circle btn-remove"></i>    
      </div>
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
  $(document).ready(function(){
    
    $("#addmorebtn").click(function(){
      
      const apphtml= $(".schedule").html();
      
      $(".multiple .duplicate-row:last-child").after(apphtml);
    datepicker();  
    });
    
    $(document).on('click','.btn-remove',function(){
      if($(".multiple .duplicate-row").length>1)
      {
        $(this).parents(".duplicate-row").remove();
      }
    });

    });

    
    function datepicker(){
      $(function () {
            //Initialize Select2 Elements
        $('.select2').select2()
  
        //Date range picker
        $('input[name="daterange"]').daterangepicker({
        opens: 'left'
        },
        function(start, end, label){
          console.log("A new date selectin was made:" + start.format('MM-DD-YYYY') + 'to' + end.format('MM-DD-YYYY'));
        });   
          });
}
  datepicker();

</script>

@endpush
