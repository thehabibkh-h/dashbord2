@extends('layouts.dashbord')


@section('styles')

 <link href="{{asset('dist/css/bootstrap-editable.css')}}" rel="stylesheet"/>

@stop

@section('navTables')

              <li class="nav-item">
                <a href="{{route('bcc.index')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DataTables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.bcc.versions.index')}}" class="nav-link">
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
                
                <table id="example1" class="table table-bordered table-striped" style="width:100%"
                  data-toggle="table" data-pagination="true" data-show-refresh="true"
                >

                  <thead>
                  <tr>
                    <th>ID </th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Contrepartie</th>
                    <th>Contrepartie</th>
                    <th>Create Date</th>
                    <th>Update Date</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Create Date</th>
                    <th>Update Date</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                  
                    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($files as $row)
                    <tr >
                        <td>
                          <a href="#"
                             data-pk="{{$row->id}}"
                             data-name="name">
                             {{$row->id}}</a>
                        </td>

                        <td>{{ $row->name }}</td>

                         <td>
                          

                             <a href="#" class='xedit' data data-type="select" data-pk="{{$row->id}}" data-name="name"  data-value="{{$row->category_id}}" data-url="{{route('bcc.update',$row->category_id)}}" data-title="Select status"></a>
                        </td>

                        <td>
                          <div class='xconfirm{{$row->id}}' >{{$row->status}}</div>
                        </td>
                        <td>
                          <div>{{$row->contrepartie}}</div>
                        </td>
                         <td>
                          <div>{{$row->contrepartie}}</div>
                        </td>
                        <td>
                          <div class='xcreated{{$row->id}}'>{{$row->created_at->diffForHumans()}}</div>
                        </td>

                        <td>
                          <div class='xupdated{{$row->id}}'>{{$row->updated_at->diffForHumans()}}</div>
                        </td>
                        <td>
                          <a href="#"
                             data-pk="{{$row->id}}"
                             data-name="name">
                             {{$row->id}}</a>
                        </td>

                        <td>{{ $row->name }}</td>

                         <td>
                          

                             <a href="#" class='xedit' data data-type="select" data-pk="{{$row->id}}" data-name="name"  data-value="{{$row->category_id}}" data-url="{{route('bcc.update',$row->category_id)}}" data-title="Select status"></a>
                        </td>

                        <td>
                          <div class='xcreated{{$row->id}}'>{{$row->created_at->diffForHumans()}}</div>
                        </td>

                        <td>
                          <div class='xupdated{{$row->id}}'>{{$row->updated_at->diffForHumans()}}</div>
                        </td>
                        <td>
                          <a href="#"
                             data-pk="{{$row->id}}"
                             data-name="name">
                             {{$row->id}}</a>
                        </td>

                        <td>{{ $row->name }}</td>

                         <td>
                          

                             <a href="#" class='xedit' data data-type="select" data-pk="{{$row->id}}" data-name="name"  data-value="{{$row->category_id}}" data-url="{{route('bcc.update',$row->category_id)}}" data-title="Select status"></a>
                        </td>

                        
                      

                    </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th colspan="14" class="text-right">Total</th>
                    <th colspan="2"></th>
                    
                   
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


<script src="../../dist/js/bootstrap-editable.min.js"></script>

<script>
    $(document).ready(function () {
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': '{{csrf_token()}}'
                  }
              });

              $.fn.editable.defaults.ajaxOptions = {type: "put"}

               $('.xedit').editable({
                
               
              source: [
                    {value: 1, text: 'Category 1'},
                    {value: 2, text: 'Caegory 2'},
                    {value: 3, text: 'Category 3'},
                    
                ],
                success: function (response, newValue) {
                      console.log('Updated', newValue);
                      
                        $('.xconfirm'+response['id']).text(response['status']);
                      	$('.xcreated'+response['id']).text(response['created_at']);
                      	$('.xupdated'+response['id']).text(String(response['updated_at']));

                  }
            });

           
      })


        

        $.fn.editable.defaults.ajaxOptions = {type: "put"}

        		var table =	$('#example1').DataTable({
        				  paging: true,
    				      lengthChange: true,
    				      
    				      info: true,
    				     
    				      lengthMenu:[[5,10,25,50,-1],[5,10,25,50,'All']],
                  scrollX: true,
                  orderCellsTop: true,
              

               
              
               createdRow: function(row,data,index){
                  if(data[3].replace(/(&nbsp;|<([^>]+)>)/ig,"") == 'Oui'){
                    $('td',row).eq(3).addClass('text-success');
                  }
               },

      				"fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
      				      $('.xedit').editable({
                              source: [
                                    {value: 1, text: 'Category 1'},
                                    {value: 2, text: 'Caegory 2'},
                                    {value: 3, text: 'Category 3'},
                                ],
                              
                              success: function (response, newValue) {
                                  console.log('Updated', newValue);
                                  $('.xconfirm'+response['id']).text(response['status']);
                                	$('.xcreated'+response['id']).text(response['created_at']);
                                	$('.xupdated'+response['id']).text(String(response['updated_at']));
                                }
                      });
      				      },

              columnDefs: [
                  { visible: false,targets:4}
              ],
              order:[[4,'asc']],
              displaylength:25,
              drawCallback: function( settings ) {
                var api = this.api();
                var rows = api.rows( {page:'current'}).nodes();
                var last=null;

                api.column(4,{page:'current'}).data().each( function(group,i){
                    if (last !== group ){
                      $(rows).eq( i ).before(
                          '<tr class="bg-primary text-light"><td colspan="16">'+group+'</td></tr>'
                        );

                        last = group;
                    }
                });
              },

              initComplete:function(){

          this.api().columns().every(function(){
                var column = this;

                var select = $('<select id="mySelect'+column[0][0]+'" style="width:100%"><option value=""></option></select>')
                    .appendTo( $(column.header()) )
                    .on( 'change', function(){
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                          );

                        column
                              .search( val ? '^'+val+'$' : '',true,false )
                              .draw();
                    });

                var data = [];

                for (i = 0; i < column.data().length; i++){
                    data[i] = column.data()[i].replace(/(&nbsp;|<([^>]+)>)/ig,"").replace(/ /g,"");
                }

                column.data().unique().sort().each( function (d,j){
                    
                      d = d.replace(/(&nbsp;|<([^>]+)>)/ig,"").trim();
                      

                      var optionExists = ($("#mySelect"+column[0][0]+" option[value='"+d+"']").length > 0);

                      if(!optionExists){
                          select.append( '<option value="'+d+'">'+d+'</option>')
                        }
                });
          });

        }, 
              footerCallback: function(row,data,start,end,display){
                    var api = this.api(),data;

                    var intVal = function( i ){
                        return typeof i === 'string' ?
                            i.replace(/(&nbsp;|<([^>]+)>)/ig,"")*1 :
                            typeof i === 'number' ?
                            i:0;
                    };

                    total = api
                      .column( 0 )
                      .data()
                      .reduce( function(a,b){
                        return intVal(a) + intVal(b);
                      },0);

                    // Total over this page
                    pageTotal = api
                      .column(0,{ page: 'current'} )
                      .data()
                      .reduce( function(a,b) {
                        return intVal(a) + intVal(b);
                      },0);

                      


                      // Update footer
                      $( api.column( 14 ).footer() ).html(
                          pageTotal + ' ( '+ total +' total)'
                        );
                  },

				    });

            
				
</script>

@stop

