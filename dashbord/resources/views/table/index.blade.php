@extends('layouts.dashbord2')

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

@section('styles')
	
	<link href="https://cdn.jsdelivr.net/gh/Talv/x-editable@develop/dist/bootstrap4-editable/css/bootstrap-editable.css" rel="stylesheet">


<style>
	.color {
  background-color: #eea3a3;
}
</style>	
@stop



@section('content')
	
	
	<div class="table-responsive text-nowrap">

		<div id="toolbar" class="select">
			<select class="form-control">
				<option value="">Export Basic</option>
				<option value="all">Export All</option>
				<option value="selected">Export Selected</option>
			</select>
			
		</div>

		<table 
				id="table"
				data-toggle="table"
				data-pagination="true"
				data-search="true"
				data-search-align="left"
				data-show-columns="true"
				data-show-toggle="true"
				data-show-refrash="true"
				data-show-fullscreen="true"
				data-show-pagination-switch="true"
				data-pagination-pre-text="Previous"
				data-pagination-next-text="Next"
				data-paginationh-align="left"
				data-pagination-detail-h-align="right"
				data-page-list="[10, 20, 30, 40, 50, All]"
				data-advanced-search="true"
				data-id-table="advancedTable"
				data-filter-control="true"
				data-filter-show-clear="true"
				data-toolbar="#toolbar"
				data-show-print="true"
				data-show-export="true"
				data-click-select="true"
				data-unique-id="id"
				

				>

				<thead>
					
					<tr>
						<th data-field="state" data-checkbox="true" data-visible="false"></th>
						<th data-field='id' data-sortable="true">ID </th>
	                    <th data-field='name' data-sortable="true" data-filter-control="select">Name</th>
	                    <th data-field='category' data-sortable="true" data-editable="true" data-editable-type='select' data-editable-source="[{value: 1, text: 'Category 1'},{value: 2, text: 'Caegory 2'},{value: 3, text: 'Category 3'}]">Category</th>
	                    <th data-field='status' data-sortable="true" >Status</th>
	                    <th data-field='contrepartie' data-sortable="true" data-filter-control="select" >Contrepartie</th>
	                    <th data-field='contrepartie-2' data-sortable="true" >Contrepartie</th>
	                    <th data-field='created-date-1' data-sortable="false" >Create Date</th>
	                    <th data-field='updated-date-1' data-sortable="false" >Update Date</th>
	                    <th data-field='created-date-2' data-sortable="false">Create Date</th>
	                    <th data-field='updated-date-2' data-sortable="false" >Update Date</th>
	                    <th data-field='created-date-3' data-sortable="false" >Create Date</th>
	                    <th data-field='updated-date-3' data-sortable="false" >Update Date</th>
					</tr>
				</thead>

				<tbody>
				@foreach($files as $row)
                    <tr class={{ $row->status == "Oui" ? "" : "color"}}>
                    	<td></td>
                        <td>
                          
                             {{$row->id}}
                        </td>

                        <td>{{ $row->name }}</td>

                         <td>
                          
                         	{{$row->category_id}}
                             
                        </td>

                        <td>
                          {{$row->status}}
                        </td>
                        <td>
                          {{$row->contrepartie}}
                        </td>
                         <td>
                          {{$row->contrepartie}}
                        </td>
                        <td>
                          {{$row->created_at->diffForHumans()}}
                        </td>

                        <td>
                          {{$row->updated_at->diffForHumans()}}
                        </td>
                       
                       <td>
                          {{$row->created_at->diffForHumans()}}
                        </td>

                        <td>
                          {{$row->updated_at->diffForHumans()}}
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
			
		</table>
		

	</div>


@stop

@section('scripts')

<script>
	var table = $('#table')


	$('select').on('change',function(){
		if($(this).val() == 'selected'){
			table.bootstrapTable('showColumn','state')
		}else{
			table.bootstrapTable('hideColumn','state')
		}

		table.bootstrapTable('refreshOptions',{

			exportDataType: $(this).val(),
			exportTypes: ['json','xml','csv','txt','sql','excel','pdf']
		})
	})

</script>
<script src="https://cdn.jsdelivr.net/gh/Talv/x-editable@develop/dist/bootstrap4-editable/js/bootstrap-editable.min.js"></script>

<script src="https://unpkg.com/bootstrap-table@1.15.4/dist/extensions/editable/bootstrap-table-editable.min.js"></script>

<script>

		$.fn.editable.defaults.ajaxOptions = {type: "PUT"};

		  
/**
 * @author zhixin wen <wenzhixin2010@gmail.com>
 * extensions: https://github.com/vitalets/x-editable
 */

!function ($) {

    'use strict';

    $.extend($.fn.bootstrapTable.defaults, {
        editable: true,

        
        onEditableSave: function (field, row, oldValue, $el) {
        	var id = row['id'].replace(/(&nbsp;|<([^>]+)>)/ig,"").replace(/ /g,"");
        	


        	$.ajax({
        	 	headers: {
                      'X-CSRF-TOKEN': '{{csrf_token()}}'
                  },
                type:'PUT',
                 url: "table/"+id,
                 data : row,
                 success: function (response, newValue) {

                 			
                 			var $table = $('#table')
                 			
						    $table.bootstrapTable('updateRow', {
						        index: oldValue,
						        row: {
						         
						          status: response['status'],
						       
						        }
						      })

						    if(response['status'] == "Non"){

						    		document.getElementById("table").rows[oldValue+1].className = "bg-info";;
						    }if(response['status'] == "Oui"){

						    		document.getElementById("table").rows[oldValue+1].className = "";;
						    }

                 			//console.log('Updated', $('#table').bootstrapTable('getRowByUniqueId', id)['status'] = "Oui");
                                 /*$('#table').bootstrapTable('updateRow', {index: $(this).data('index'),  row: {
								        id: 1,
								        name: 'Item ' + 123
								    }});*/
								    
                                },
                 error: function(data, status) {
                     console.log('Updated', data['responseText']);
            	   },
                 complete: function() {

                 }
            });
            return false;
        }
    });

    

}(jQuery);


</script>

@stop