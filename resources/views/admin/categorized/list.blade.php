@extends('admin.layouts.master')
@push("after-styles")
<style>
  .addnew{
    color:white;
    float:right;
    background-color:#8605ff;
  }
  .card-header{
    color:white;
    background-color:#5d05ff;
  }
  .nav5{
    margin-left:10px;
    color:white;
  }
  
  .tab{
    background-color:white;
  }
  .tablinks{
    border:none;
    background-color:white;
    margin-left:16px;
  }
  .btn-group>.btn-group:not(:first-child)>.btn, .btn-group>.btn:not(:first-child) {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    border-radius: 23px;
    margin-left: 10px;
    background-color:white;
    border-color: darkgrey;
}
.btn-group>.btn-group:not(:last-child)>.btn, .btn-group>.btn:not(:last-child):not(.dropdown-toggle) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-radius: 36px;
}
.btn-group>.btn:not(:last-child):not(.dropdown-toggle) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    margin-left: 8px;
    background-color:white;
    border-radius: 36px;
    border-color: darkgray;
}
.card-body {
    background-color: white;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1.25rem;
}
.nav3{
  color:darkgrey;
}
.status{
  color:black;
}
</style>

@endpush
@section('content')

<div class="card-header my-4">
<h3 class="card-title">List of Users</h3>
<a href="http://127.0.0.1:8000/admin/user/add" ><button type="button" class="addnew">Add New Users<i class="nav5 fas fa-plus-circle"></i></button></a>
</div>
<div id="London" class="tabcontent">
<div class="row">
<div class="col-sm-12" id="resultres">
<div class="card-body">
<table id="example1" class="table">
<thead>
<tr>
<th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">#</th>
<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">NAME</th>
<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">EMAIL</th>
<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">CONTACT</th>
<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">ROLE</th>
<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Parent_Id</th>
<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">STATUS</th>
<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">ACTION</th>
</tr>
</thead>
<tbody>
<?php
$count=0; ?>
@foreach($superdistributor as $vl)
<?php
 $count=$count+1;
  ?>
<tr>
<td>{{ $count }}</td>
<td>{{ $vl->name }}</td>
<td>{{ $vl->email }}</td>
<td>{{ $vl->contact }}</td>
<td>{{ $vl->role }}</td>
<td>{{ $vl->parent_id }}</td>
<td>
<?php if($vl->status == 'Active'){ ?>
<a href="{{route('admin.user.deactive',$vl->id )}}" class="status">
  Deactive
</a>     
<?php }else{ ?>
<a href="{{route('admin.user.active',$vl->id )}}" class="status">
  Active
</a>  
<?php } ?>
</td>
                      
<td class="action-icon">
<a href="{{route('admin.user.edit',$vl->id )}}" ><button type="button" class="btn btn-success "><i class="ser fa fa-edit"></i></button></a>

<a href="{{route('admin.user.delete',$vl->id )}}"><button type="button" class="btn btn-danger" ><i class="ser fa fa-trash"></i></button></a>

</td>

</tr>
@endforeach
</tbody>
<tfoot>
<tr>
<th>#</th>
<th>NAME</th>
<th>EMAIL</th>
<th>CONTACT</th>
<th>ROLE</th>
<th>Parent_Id</th>
<th>STATUS</th>
<th>ACTION</th>
</tr>
</tfoot>

</table>
</div>
</div>
</div>
</div>
</div>

@endsection
@push("after-scripts")
<script>
$(document).ready(function () {

  
    $("#example1").DataTable({
      "responsive": true,
      "buttons": [
        {
            extend:'copyHtml5',
            text: '<i class="nav3 fa fa-copy"></i>',
                titleAttr: 'COPY',
            footer: true,
          colspan: true,
             exportOptions: {
            columns: [0,1,2,3,4,5,6],
            
                 // Column index which needs to export
             }
                },
    {
            extend:'excelHtml5',
            text: '<i class="nav3 fa fa-file-excel"></i>',
                titleAttr: 'EXCEL',
            footer: true,
          colspan: true,
             exportOptions: {
            columns: [0,1,2,3,4,5,6],
            
                 // Column index which needs to export
             }
                },
            
            {
            extend:'csvHtml5',
            text: '<i class="nav3 fa fa-file-csv"></i>',
                titleAttr: 'CSV',
            footer: true,
          colspan: true,
             exportOptions: {
            columns: [0,1,2,3,4,5,6],
            
                 // Column index which needs to export
             }
                },
            
            {
            extend:'pdfHtml5',
            text: '<i class="nav3 fa fa-file-pdf"></i>',
                titleAttr: 'PDF',
            footer: true,
          colspan: true,
             exportOptions: {
            columns: [0,1,2,3,4,5,6],
                 // Column index which needs to export
             }
                },
            
            {
            extend:'print',
            text: '<i class="nav3 fa fa-print"></i>',
            titleAttr: 'PRINT',
            footer: true,
          colspan: true,
             exportOptions: {
            columns: [0,1,2,3,4,5,6],
                 // Column index which needs to export
          }

        },
          ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
  });  
</script>


@endpush