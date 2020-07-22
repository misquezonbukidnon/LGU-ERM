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
												<label for="oldIdnumber"><strong>Employee ID Number: </strong></label>
												{{ $employees->employee_number}}
											</div>
											<div class="form-group">
												<label for="oldLastname"><strong>Lastname: </strong></label>
												{{ $employees->lastname }}
											</div>
											<div class="form-group">
												<label for="oldFirstname"><strong>Firstname: </strong></label>
												{{ $employees->firstname }}
											</div>
											<div class="form-group">
												<label for="oldMiddlename"><strong>Middlename/Initial: </strong></label>
												{{ $employees->middlename }}
											</div>
											<div class="form-group">
												<label for="oldPosition"><strong>Position: </strong></label>
												{{ $employees->positions->name }}
											</div>
											<div class="form-group">
												<label for="oldOffice"><strong>Office: </strong></label>
												{{ $employees->offices->name }}
											</div>
											<div class="form-group">
												<label for="oldAddress"><strong>Address: </strong></label>
												{{ $employees->address }}
											</div>
										</div>
										<div class="col-sm-4">
                                            <div class="form-group">
												<label for="oldContactnumber"><strong>Contact Number: </strong></label>
												{{ $employees->contact_number }}
											</div>
											<div class="form-group">
												<label for="oldEmergency"><strong>Emergency Contact Person: </strong></label>
												{{ $employees->emergency_contact_person }}
											</div>
											<div class="form-group">
												<label for="oldEcpcontact"><strong>Contact Number: </strong></label>
												{{ $employees->ecp_contact_number }}
											</div>
											<div class="form-group">
												<label for="oldservicestart"><strong>Date Started: </strong></label>
												{{ $employees->employment_start_date }}
                                            </div>
											<div class="form-group">
												<label for="oldStatus"><strong>Classification: </strong></label>
												{{ $employees->statuses->name }}
											</div>
											<div class="form-group">
												<label for="oldClassification"><strong>Status: </strong></label>
												{{ $employees->employmentstatuses->name }}
											</div>
                                            <div class="form-group">
												<label for="oldservicestart"><strong>Employment Date: </strong></label>
												{{ $employees->employment_start_date }}
											</div>
                                            <div class="form-group">
												<label for="oldserviceended"><strong>Service Ended: </strong></label>
												{{ $employees->employment_end_date }}
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
