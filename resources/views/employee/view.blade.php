@extends('layouts.app')
@section('content')
	<div class="container">
		@include('flash::message')
		<form action="#" method ="POST">
			@csrf
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb outlined-primary has-arrow">
				  <li class="breadcrumb-item">
					<a href="/home">Home</a>
				  </li>
				  <li class="breadcrumb-item">
					<a href="/create/employee">New Entry</a>
				  </li>
				  <li class="breadcrumb-item active" aria-current="page">Employee Info</li>
				</ol>
			</nav>
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
												
											</div>                                          
											<div class="form-group" align="center">												
												<img src="{{ asset('uploads/employee/' . $employees->image) }}" width="200px;" height="200px;" alt="">
											</div> 
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label for="oldIdnumber"><strong><u>ID Number:</u> </strong></label>
												<br>{{ $employees->employee_number}}
											</div>
											<div class="form-group">
												<label for="oldLastname"><strong><u>Lastname:</u> </strong></label>
												<br>{{ $employees->lastname }}
											</div>
											<div class="form-group">
												<label for="oldFirstname"><strong><u>Firstname:</u> </strong></label>
												<br>{{ $employees->firstname }}
											</div>
											<div class="form-group">
												<label for="oldMiddlename"><strong><u>Middlename:</u> </strong></label>
												<br>{{ $employees->middlename }}
											</div>
											<div class="form-group">
												<label for="oldSuffix"><strong><u>Suffix:</u> </strong></label>
												<br>{{ $employees->suffix }}
											</div>											
											<div class="form-group">
												<label for="oldPosition"><strong><u>Position:</u> </strong></label>
												<br>{{ $employees->positions->name }}
											</div>
										</div>
										<div class="col-sm-4">											
											<div class="form-group">
												<label for="oldOffice"><strong><u>Office:</u> </strong></label>
												<br>{{ $employees->offices->name }}
											</div>
											<div class="form-group">
												<label for="oldAddress"><strong><u>Address:</u> </strong></label>
												<br>{{ $employees->address }}
											</div>
                                            <div class="form-group">
												<label for="oldContactnumber"><strong><u>Contact Number:</u> </strong></label>
												<br>{{ $employees->contact_number }}
											</div>
											<div class="form-group">
												<label for="oldEmergency"><strong><u>Emergency Contact Person:</u> </strong></label>
												<br>{{ $employees->emergency_contact_person }}
											</div>
											<div class="form-group">
												<label for="oldEcpcontact"><strong><u>Contact Number:</u> </strong></label>
												<br>{{ $employees->ecp_contact_number }}
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
