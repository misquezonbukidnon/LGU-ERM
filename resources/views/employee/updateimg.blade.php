@extends('layouts.app')
@section('content')
	<div class="container">
		@include('flash::message')
		<form action="/upimage/employee/{{ $employees->id }}" method ="POST" enctype="multipart/form-data">
			@csrf
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb outlined-primary has-arrow">
				  <li class="breadcrumb-item">
					<a href="/home">Home</a>
				  </li>
				  <li class="breadcrumb-item active" aria-current="page">Edit</li>
				</ol>
			</nav>

			@if(count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li> {{ $error }} </li>
					@endforeach
				</ul>
			</div>
			@endif
 			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<div class="grid">
							<div class="grid-header">Employee Information</div>
							<div class="grid-body">
								<div class="item-wrapper">
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group" align="center">
												<img src="{{ asset('uploads/employee/' . $employees->image) }}" width="200px;" height="200px;" alt="">
                                            </div>
										</div>
										<div class="col-sm-5">
                                            <div class="form-group">
												<label for="oldIdnumber"><strong>ID Number </strong></label>
												<br><p>{{ $employees->employee_number}}</p>
											</div>
											<div class="form-group">
												<label for="oldLastname"><strong>Lastname </strong></label>
												<br><p>{{ $employees->lastname }}</p>
											</div>
											<div class="form-group">
												<label for="oldFirstname"><strong>Firstname </strong></label>
												<br><p>{{ $employees->firstname }}</p>
											</div>
											<div class="form-group">
												<label for="oldMiddlename"><strong>Middlename </strong></label>
												<br><p>{{ $employees->middlename }}</p>
											</div>
											<div class="form-group">
												<label for="oldsuffix"><strong>Suffix </strong></label>
												<br>
                                                @if($employees->suffix != null)
                                                    <p>{{ $employees->suffix }}</p>
                                                @else
                                                    <p>No Suffix</p>
                                                @endif
                                            </div>
											<div class="form-group">
												<label for="oldPosition"><strong>Position </strong></label>
												<br><p>{{ $employees->positions->name }}</p>
											</div>
											<div class="form-group">
												<label for="oldOffice"><strong>Office </strong></label>
												<br><p>{{ $employees->offices->name }}</p>
                                            </div>
										</div>
										<div class="col-sm-4">

                                            <div class="form-group">
                                                <label for="image">Upload Image</label>
                                                <input type="file" name="image" class="form-control" value="{{ $employees->middlename }}">
                                            </div>

                                            <div align="center">
                                                <button type="submit" class="btn btn-outline-primary">Submit</button>
                                                <a href="/home" class="btn btn-outline-primary">Back</a>
                                            </div>
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
