@extends('layouts.app')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb outlined-primary has-arrow">
      <li class="breadcrumb-item">
        <a href="/home">Home</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Filtered No Image</li>
    </ol>
</nav>
<div class="col-md-12" align="right">
    <div class="container">
        <a href="/export/noimage" class ="btn btn-outline-success btn-rounded"> Export List</a><br><br>
    </div>
</div>

<div class="container">
    @csrf
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="grid">
                <div class="grid-header">List of Employees Without Image</div>
                    <div class="grid-body">
                        <div class="item-wrapper">
                            <div class="table-responsive">
                                <table id="noimages-data-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Employee ID</th>
                                            <th>Lastname</th>
                                            <th>Firstname</th>
                                            <th>Middlename</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($employees as $item)
                                       <tr>
                                            <td>{{ $item->employee_number }}</td>
                                            <td>{{ $item->lastname }}</td>
                                            <td>{{ $item->firstname }}</td>
                                            <td>{{ $item->middlename }}</td>
                                            <td>{{ $item->positions->name }}</td>
                                            <td>{{ $item->offices->name }}</td>
                                        </tr>
                                       @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Employee ID</th>
                                            <th>Lastname</th>
                                            <th>Firstname</th>
                                            <th>Middlename</th>
                                            <th>Position</th>
                                            <th>Office</th>
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
            $('#noimages-data-table').DataTable();
        });
    </script>

@endsection
