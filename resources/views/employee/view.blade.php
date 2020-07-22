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
				  <li class="breadcrumb-item active" aria-current="page">Employee Info</li>
				</ol>
			</nav>
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<div class="grid">
							<div class="grid-header">Employee Details</div>
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
											<div class="form-group">
												<label for="oldAddress"><strong>Address </strong></label>
												<br><p>{{ $employees->address }}</p>
											</div>
										</div>
										<div class="col-sm-3">
                                            <div class="form-group">
												<label for="oldContactnumber"><strong>Contact Number </strong></label>
												<br><p>{{ $employees->contact_number }}</p>
											</div>
											<div class="form-group">
												<label for="oldEmergency"><strong>Emergency Contact Person </strong></label>
												<br><p>{{ $employees->emergency_contact_person }}</p>
											</div>
											<div class="form-group">
												<label for="oldEcpcontact"><strong>Contact Number </strong></label>
												<br><p>{{ $employees->ecp_contact_number }}</p>
											</div>
											<div class="form-group">
												<label for="oldStatus"><strong>Classification </strong></label>
												<br><p>{{ $employees->statuses->name }}</p>
											</div>
											<div class="form-group">
												<label for="oldClassification"><strong>Status </strong></label>
												<br><p>{{ $employees->employmentstatuses->name }}</p>
											</div>
                                            <div class="form-group">
												<label for="oldservicestart"><strong>Employment Date </strong></label>
												<br>
                                                @if($employees->employment_start_date != null)
                                                    <p>{{ $employees->employment_start_date }}</p>
                                                @else
                                                    <p>No Data</p>
                                                @endif
											</div>
                                            <div class="form-group">
												<label for="oldserviceended"><strong>Service Ended </strong></label>
												<br>
                                                @if($employees->employment_end_date != null)
                                                    <p>{{ $employees->employment_end_date }}</p>
                                                @else
                                                    <p>No Data</p>
                                                @endif
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
