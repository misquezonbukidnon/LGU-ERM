@extends('layouts.app')
@section('content')
	<div class="container">
		@include('flash::message')
		<form action="/update/office/{{ $offices->id }}" method ="POST">
			@csrf
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb outlined-primary has-arrow">
				  <li class="breadcrumb-item">
					<a href="/home">Home</a>
				  </li>
				  <li class="breadcrumb-item">
					<a href="/create/office">Create Office</a>
				  </li>
				  <li class="breadcrumb-item active" aria-current="page">Edit</li>
				</ol>
			</nav>
			<div class="col-md-9 offset-3">
				<div class="row">
					<div class="col-md-8">
						<div class="grid">
							<div class="grid-header">Update Office Name</div>
								<div class="grid-body">
									<div class="item-wrapper">
										<div class="form-group">
											
											<label for="inputOfficename">Name of Office</label>
											<input type="text" class="form-control" id="inputOfficename" name="name" aria-describedby="officenameHelp" value="{{ $offices->name }}" required>
											<small id="officenameHelp" class="form-text text-muted"> Please enter office name.</small>
										</div>	
										<div align="center">	
											<button type="submit" class="btn btn-outline-primary">Update</button>
											<a href="/create/office" class="btn btn-outline-primary">Back</a>
										</div>		
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
@endsection
