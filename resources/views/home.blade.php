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
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <select class="form-control" name="filter_office" id="filter_office" required>
                                    <option>Select Office</option>
                                    @foreach ($offices as $office)
                                        <option value="{{$office->id}}"> {{ $office->name}}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button> <button type="button" name="reset" id="reset" class="btn btn-primary">Reset</button>
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
                                <table id="employees-data-table" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            {{-- <th>ID</th> --}}
                                            <th>ID Number</th>
                                            <th>Lastname</th>
                                            <th>Firstname</th>
                                            <th>Middlename</th>
                                            <th>Suffix</th>
                                            <th>Position</th>
                                            <th align="center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        {{-- <th>ID</th> --}}
                                            <th>ID Number</th>
                                            <th>Lastname</th>
                                            <th>Firstname</th>
                                            <th>Middlename</th>
                                            <th>Suffix</th>
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
        $(function() {
            $('#employees-data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: 'home',
                columns: [
                    { data: 'employee_number', name: 'employee_number' },
                    { data: 'lastname', name: 'lastname' },
                    { data: 'firstname', name: 'firstname' },
                    { data: 'middlename', name: 'middlename' },
                    { data: 'suffix', name: 'suffix' },
                    { data: 'positions.name', name: 'positions.name' },
                    { data: 'action', name: 'action'}
                ]
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            fill_datatable();
            function fill_datatable(filter_office ='')
            {
                var dataTable = $('#employees-data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    retrieve: true,
                    ajax:{
                        url: "{{ route('customsearch.index') }}",
                        data:{filter_office:filter_office}
                    },
                    columns: [
                        { data: 'employee_number', name: 'employee_number' },
                        { data: 'lastname', name: 'lastname' },
                        { data: 'firstname', name: 'firstname' },
                        { data: 'middlename', name: 'middlename' },
                        { data: 'suffix', name: 'suffix' },
                        { data: 'positions.name', name: 'positions.name' },
                        { data: 'action', name: 'action'}
                ]
                });
            }
            $('#filter').click(function(){
                var filter_office =$('#filter_office').val();

                if(filter_office !='' && filter_office !='')
                {
                    $('#employees-data-table').DataTable().destroy();
                    fill_datatable(filter_office);
                }
                else
                {
                    alert('Select Office to be filter');
                }
            });
            $('#reset').click(function(){
                $('filter_office').val('');
                $('#employees-data-table').DataTable().destroy();
                fill_datatable();
            });
        });
    </script>
@endsection
