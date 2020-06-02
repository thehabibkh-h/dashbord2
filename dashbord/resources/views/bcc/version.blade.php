@extends('layouts.dashbord')




@section('navTables')

              <li class="nav-item">
                <a href="{{route('bcc.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DataTables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.bcc.versions.index')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>VersionsTables</p>
                </a>
              </li>

@stop

@section('content')

<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                   <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Create Date</th>
                    <th>Update Date</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($versions as $row)
                    <tr >
                        <td>
                          {{$row->id}}
                        </td>

                        <td>{{ $row->file->name }}</td>

                         <td>
                             {{$row->category->name}}
                        </td>

                        <td>
                              {{$row->status}}
                        </td>
                        <td>
                              {{$row->created_at->diffForHumans()}}
                        </td>

                        <td>
                              {{$row->updated_at->diffForHumans()}}
                        </td>

                    </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Create Date</th>
                    <th>Update Date</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
      
@stop



@section('scripts')



<script>
   

    $('#example1').DataTable();
        
</script>

@stop

