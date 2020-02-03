@extends('layouts.app')
@section('content')
	<div class="container">
		@include('flash::message')
		<form action="{{ url('/store/office') }}" method ="POST">
			@csrf
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb outlined-primary has-arrow">
				  <li class="breadcrumb-item">
					<a href="/home">Home</a>
				  </li>
				  <li class="breadcrumb-item active" aria-current="page">Create Office</li>
				</ol>
			</nav>
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-5">
						<div class="grid">
							<div class="grid-header">Office Registration</div>
							<div class="grid-body">
								<div class="item-wrapper">
									<div class="form-group">
										<label for="inputOfficename">Name of Office</label>
										<input type="text" class="form-control" id="inputOfficename" name="name" aria-describedby="officenameHelp" required>
										<small id="officenameHelp" class="form-text text-muted">Please enter office name.</small>
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
				        	<div class="grid-header">Registered Offices</div>
				          	<div class="grid-body">
					            <div class="item-wrapper">
					              <div class="table-responsive">
					                <table id="offices-data-table" class="table table-bordered">
					                  <thead>
					                    <tr>
											{{-- <th>ID</th> --}}
					                    	<th>Office</th>
					                    	<th align="center">Action</th>
					                    </tr>
					                  </thead>
					                  <tbody>
					                  	
					                  </tbody>
					                  <tfoot>
					                    <tr>
					                    	{{-- <th>ID</th> --}}
					                      	<th>Office</th>
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
		    $('#offices-data-table').DataTable();
		});
	</script> --}}
	<script>
        $(function() {
            $('#offices-data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/create/office',
                columns: [
                    // { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'action', name: 'action'}
                ]
            });
        });
    </script>
@endsection
