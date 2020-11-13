@extends('layouts.app')
@section('content')
	<div class="container">
		@include('flash::message')
		<form action="/update/position/{{ $positions->id }}" method ="POST">
			@csrf
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb outlined-primary has-arrow">
				  <li class="breadcrumb-item">
					<a href="/home">Home</a>
				  </li>
				  <li class="breadcrumb-item">
					<a href="/create/position">Create Position</a>
				  </li>
				  <li class="breadcrumb-item active" aria-current="page">Edit</li>
				</ol>
			</nav>
			<div class="col-md-9 offset-3">
				<div class="row">
					<div class="col-md-8">
						<div class="grid">
							<div class="grid-header">Update Position</div>
								<div class="grid-body">
									<div class="item-wrapper">
										<div class="form-group">
											<label for="inputpositionname">Position</label>
											<input type="text" class="form-control" id="inputpositionname" name="name" aria-describedby="positionnameHelp" value="{{ $positions->name }}" required>
											<small id="positionnameHelp" class="form-text text-muted"> Please enter position.</small>
										</div>
										<div align="center">
											<button type="submit" class="btn btn-outline-primary">Update</button>
											<a href="/home" class="btn btn-outline-primary">Back</a>
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
