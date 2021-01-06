@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="grid">
                <div class="grid-header">Filter List of Employees</div>
                <div class="grid-body">
                    <div class="item-wrapper">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <select class="form-control" name="filter_office" id="filter_office" required>
                                    <option>Office</option>
                                    @foreach ($offices as $office)
                                        <option value="{{$office->id}}"> {{ $office->name}}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <select class="form-control" name="filter_classification" id="filter_classification" required>
                                    <option>Classification</option>
                                        @foreach ($statuses as $status)
                                            <option value="{{$status->id}}"> {{ $status->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <select class="form-control" name="filter_status" id="filter_status" required>
                                    <option>Status</option>
                                        @foreach ($employmentstatuses as $status)
                                            <option value="{{$status->id}}"> {{ $status->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <i title="Filter"><button type="button" name="filter" id="filter" class="btn btn-primary"><span class="mdi mdi-filter mdi-1x"></span></button></i> <i title="Remove Filter"><button type="button" name="reset" id="reset" class="btn btn-primary"><span class="mdi mdi-filter-remove mdi-1x"></span></button></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12" align="right">
    <div class="container">
        <a href="/home/excel" class ="btn btn-outline-success btn-rounded"> Export Employees to Excel</a><br><br>
    </div>
</div>

<div class="container">
    @csrf
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="grid">
                <div class="grid-header">List of Employees</div>
                    <div class="grid-body">
                        <div class="item-wrapper">
                            <div class="table-responsive">
                                <table id="employees-data-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Lastname</th>
                                            <th>Firstname</th>
                                            <th>Middlename</th>
                                            <th>Status</th>
                                            <th>Position</th>
                                            <th align="center">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Lastname</th>
                                            <th>Firstname</th>
                                            <th>Middlename</th>
                                            <th>Status</th>
                                            <th>Position</th>
                                            <th align="center">Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
@section('script')

    <script>
        $(document).on('click', '.edit', function(){
            var id = $(this).attr('id');
            $('#form_result').html('');
            $.ajax({
                url:"/view/employee/"+id+/"view",
                dataType:"json",
                success:function(html){
                    $('#lastname').val(html.data.lastname);
                    $('#firstname').val(html.data.firstname);
                    $('#image').html("<img src= {{ URL::to ('/') }}/uploads/employee/"+html.data.image+" width='100' height='100' class='img-thumbnail'>");
                    $('#hidden_id').val(html.data.id);
                    $('#action_button').val("view");
                    $('#action').val("view");
                    // $('#formModal').modal('show');
                }
            })
        });
    </script>

    <script>
        $(function() {
            $('#employees-data-table').DataTable({
                stateSave: true,
                processing: true,
                serverSide: true,
                retrieve: true,
                ajax: 'home',
                columns: [
                    { data: 'lastname', name: 'lastname'},
                    { data: 'firstname', name: 'firstname' },
                    { data: 'middlename', name: 'middlename' },
                    { data: 'statuses.name', name: 'statuses.name' },
                    { data: 'positions.name', name: 'positions.name' },
                    { data: 'action', name: 'action'}
                ],
                order: [[ 0, "asc" ]]
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            fill_datatable();
            function fill_datatable(filter_office ='', filter_classification = '', filter_status = '')
            {
                var dataTable = $('#employees-data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    retrieve: true,
                    ajax:{
                        url: "{{ route('customsearch.index') }}",
                        data:{filter_office:filter_office, filter_classification:filter_classification, filter_status:filter_status}
                    },
                    columns: [
                        { data: 'lastname', name: 'lastname' },
                        { data: 'firstname', name: 'firstname' },
                        { data: 'middlename', name: 'middlename' },
                        { data: 'statuses.name', name: 'statuses.name' },
                        { data: 'positions.name', name: 'positions.name' },
                        { data: 'action', name: 'action'}
                ],
                order: [[ 0, "asc" ]]
                });
            }
            $('#filter').click(function(){

                var filter_office = $('#filter_office').val();
                var filter_classification = $('#filter_classification').val();
                var filter_status = $('#filter_status').val();

                if(filter_office !='' && filter_office !='')
                {
                    $('#employees-data-table').DataTable().destroy();
                    fill_datatable(filter_office, filter_classification, filter_status);
                }
                else
                {
                    alert('Select both filter option');
                }
            });
            $('#reset').click(function(){
                $('filter_office').val('');
                $('filter_classification').val('');
                $('filter_status').val('');
                $('#employees-data-table').DataTable().destroy();
                fill_datatable();
            });
        });
    </script>
@endsection
