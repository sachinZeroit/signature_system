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
  a.playlistcolr {
    color: black;
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

  <div class="card-header">
    <h3 class="card-title">List of Playlist</h3>
    <a href="http://127.0.0.1:8000/admin/playlist/add" ><button type="button" class="addnew">Add New Users</button></a>
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
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">TYPE</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">PREVIEW</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">STATUS</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">ACTION</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                  $count=0; ?>
                @foreach($playlists as $vl)
                  <?php
                  $count=$count+1;
                  ?>
                  <tr>
                    <td>{{ $count }}</td>
                    <td>{{ $vl->name }}</td>
                    <td>{{ $vl->type }}</td>
                    <td><a href="{{route('admin.media.preview',$vl->id )}}" class="playlistcolr">
                    preview
                    </a></td>
                    <td>
                      <?php if($vl->status == 'Active'){ ?>
                        <a href="{{route('admin.playlist.deactive',$vl->id )}}" class="playlistcolr">
                          Deactive
                        </a>     
                      <?php }else{ ?>
                        <a href="{{route('admin.playlist.active',$vl->id )}}" class="playlistcolr">
                          Active
                        </a>  
                      <?php } ?>
                    </td>
                    <td class="action-icon">
                      <a href="{{route('admin.playlist.edit',$vl->id )}}" >
                        <button type="button" class="addbutton">
                          <svg width="25" height="25" fill="white" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                          </svg>
                        </button>
                      </a>

                      <a href="{{route('admin.playlist.delete',$vl->id )}}">
                        <button class="addbutton">
                          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                          </svg>
                        </button>
                      </a>
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
@endsection
@push("after-scripts")

<script>
      $(document).ready(function () {
        $("#example2").DataTable({
          "buttons":[
            {
              extend:'copyHtml5',
              titleAttr: 'COPY',
              footer: true,
              colspan: true,
              exportOptions:
              {
                columns: [0,1,2,3,4],
                // Column index which needs to export
              }
            },
            
            {
              extend:'excelHtml5',
              titleAttr: 'EXCEL',
              footer: true,
              colspan: true,
              exportOptions:
              {
                columns: [0,1,2,3,4],
                // Column index which needs to export
              }
            },
                
            {
              extend:'csvHtml5',
              titleAttr: 'CSV',
              footer: true,
              colspan: true,
              exportOptions:
              {
                columns: [0,1,2,3,4],
                // Column index which needs to export
              }
            },
                
            {
              extend:'pdfHtml5',
              titleAttr: 'PDF',
              footer: true,
              colspan: true,
              exportOptions:
              {
                columns: [0,1,2,3,4],
                // Column index which needs to export
              }
            },
                
            {
              extend:'print',
              titleAttr: 'PRINT',
              footer: true,
              colspan: true,
              exportOptions:
              {
                columns: [0,1,2,3,4],
                // Column index which needs to export
              }
            },
          ]
        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
        
        $("#example3").DataTable({
          "buttons": [
            {
              extend:'copyHtml5',
              titleAttr: 'COPY',
              footer: true,
              colspan: true,
              exportOptions:
              {
                columns: [0,2,3,4,5,6,7],
                // Column index which needs to export
              }
            },
            
            {
              extend:'excelHtml5',
              titleAttr: 'EXCEL',
              footer: true,
              colspan: true,
              exportOptions:
              {
                columns: [0,2,3,4,5,6,7],
                // Column index which needs to export
              }
            },
                
            {
              extend:'csvHtml5',
              titleAttr: 'CSV',
              footer: true,
              colspan: true,
              exportOptions:
              {
                columns: [0,2,3,4,5,6,7],
                // Column index which needs to export
              }
            },
                
            {
              extend:'pdfHtml5',
              titleAttr: 'PDF',
              footer: true,
              colspan: true,
              exportOptions:
              {
                columns: [0,2,3,4,5,6,7],
                // Column index which needs to export
              }
            },
                
            {
              extend:'print',
              titleAttr: 'PRINT',
              footer: true,
              colspan: true,
              exportOptions:
              {
                columns: [0,2,3,4,5,6,7],
                // Column index which needs to export
              }
            },
          ]
        }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
        
      });  
    </script>

@endpush