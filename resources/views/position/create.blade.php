@extends('layouts.app')
@section('content')
	<div class="container">
		@include('flash::message')
		<form action="{{ url('/store/position') }}" method ="POST">
			@csrf
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb outlined-primary has-arrow">
				  <li class="breadcrumb-item">
					<a href="/home">Home</a>
				  </li>
				  <li class="breadcrumb-item active" aria-current="page">Create Position</li>
				</ol>
			</nav>
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-5">
						<div class="grid">
							<div class="grid-header">Position Registration</div>
							<div class="grid-body">
								<div class="item-wrapper">
									<div class="form-group">
										<label for="inputpositionname">Position</label>
										<input type="text" class="form-control" id="inputpositionname" name="name" aria-describedby="positionnameHelp" required>
										<small id="positionnameHelp" class="form-text text-muted">Please enter position.</small>
									</div>	
									<div align="center">	
										<button type="submit" class="btn btn-primary">Submit</button>
									</div>		
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-7">
				        <div class="grid">
				        	<div class="grid-header">Registered Positions</div>
				          	<div class="grid-body">
					            <div class="item-wrapper">
					              <div class="table-responsive">
					                <table id="positions-data-table" class="table table-bordered">
					                  <thead>
					                    <tr>
											{{-- <th>ID</th> --}}
					                    	<th>Position</th>
					                    	<th align="center">Action</th>
					                    </tr>
					                  </thead>
					                  {{-- <tbody>
					                  	@foreach($positions as $position)
					                  		<tr>
					                  			<td>{{ $position->name }}</td>  			
					                  			<td align="center">
						                           <a href="/edit/position/{{ $position->id }}" class="btn btn-sm btn-outline-primary">Edit</a></td>
					                  		</tr>

					                  	@endforeach --}}
					                  </tbody>
					                  <tfoot>
					                    <tr>
					                    	{{-- <th>ID</th> --}}
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
		</form>
	</div>
@endsection
@section('script')
	<script>
		$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
	</script>

	{{-- <script>
		$(function() {
		    $('#positions-data-table').DataTable();
		});
	</script> --}}
	<script>
        $(function() {
            $('#positions-data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/create/position',
                columns: [
                    // { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'action', name: 'action'}
                ]
            });
        });
    </script>
@endsection
