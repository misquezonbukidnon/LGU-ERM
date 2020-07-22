@extends('layouts.app')
@section('content')
	<div class="container">
		@include('flash::message')
		<form action="/update/employee/{{ $employees->id }}" method ="POST" enctype="multipart/form-data">
			@csrf
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb outlined-primary has-arrow">
				  <li class="breadcrumb-item">
					<a href="/home">Home</a>
				  </li>
				  <li class="breadcrumb-item">
					<a href="/create/employee">New Entry</a>
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
							<div class="grid-header">Current Information</div>
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
												<label for="oldMiddlename"><strong>Middlename: </strong></label>
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
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label for="oldAddress"><strong>Address: </strong></label>
												{{ $employees->address }}
											</div>
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
												<label for="oldservicestart"><strong>Employment Started: </strong></label>
												{{ $employees->employment_start_date }}
                                            </div>
                                            <div class="form-group">
												<label for="oldservicestart"><strong>Employment Ended: </strong></label>
												{{ $employees->employment_end_date }}
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="grid">
							<div class="grid-header">Personal Information</div>
							<div class="grid-body">
								<div class="item-wrapper">

                                    {{--Employee ID Number--}}
                                    <div class="form-group">
                                        <label for="inputEmployeenumber">Employee ID Number</label>
                                        <input type="text" class="form-control" id="inputEmployeenumber" name="employee_number" aria-describedby="employeenumberHelp" value="{{ $employees->employee_number }}" required>
                                        <small id="employeenumberHelp" class="form-text text-muted">Please enter employee ID number.</small>
                                    </div>

                                    {{--Employee Lastname--}}
                                    <div class="form-group">
                                        <label for="inputLastname">Lastname</label>
                                        <input type="text" class="form-control" id="inputLastname" name="lastname" aria-describedby="lastnameHelp" value="{{ $employees->lastname }}" required>
                                        <small id="lastnameHelp" class="form-text text-muted">Please enter employee lastname.</small>
                                    </div>

                                    {{--Employee Firstname--}}
                                    <div class="form-group">
                                        <label for="inputFirstname">Firstname</label>
                                        <input type="text" class="form-control" id="inputFirstname" name="firstname" aria-describedby="firstnameHelp" value="{{ $employees->firstname }}" required>
                                        <small id="firstnameHelp" class="form-text text-muted">Please enter employee firstname.</small>
                                    </div>

                                    {{--Employee Middlename--}}
                                    <div class="form-group">
                                        <label for="inputMiddlename">Middlename (Optional)</label>
                                        <input type="text" class="form-control" id="inputMiddlename" name="middlename" aria-describedby="middlenameHelp" value="{{ $employees->middlename }}">
                                        <small id="middlenameHelp" class="form-text text-muted">Please enter employee middlename.</small>
                                    </div>

                                    {{--Employee Suffix--}}
                                    <div class="form-group">
                                        <label for="selectSuffix">Suffix</label>
                                        <select class="custom-select" name="suffix">
                                        <option value="{{ $employees->suffix }}">{{ $employees->suffix }} (Current)</option>
                                        <option value="">Not Applicable</option>
										<option value="Jr">Jr</option>
                                        <option value="Sr">Sr</option>
                                        <option value="I">I</option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                        </select>
                                        <small id="suffixHelp" class="form-text text-muted">Please select suffix (if applicable).</small>
                                    </div>

                                    {{--Employee Address--}}
                                        <div class="form-group">
                                            <label for="inputAddress">Address</label>
                                            <input type="text" class="form-control" id="inputAddress" name="address" aria-describedby="addressHelp" value="{{ $employees->address }}" required>
                                            <small id="addressHelp" class="form-text text-muted">Please enter employee address.</small>
                                        </div>

                                        {{--Employee Contact Number--}}
                                        <div class="form-group">
                                            <label for="inputContactnumber">Contact Number</label>
                                            <input type="text" class="form-control" id="inputContactnumber" name="contact_number" aria-describedby="contactnumberHelp" value="{{ $employees->contact_number }}">
                                            <small id="contactnumberHelp" class="form-text text-muted">Please enter employee contact number.</small>
                                        </div>

                                        {{--Employee Emergency Contact Person--}}
                                        <div class="form-group">
                                            <label for="inputEcp">Emergency Contact Person</label>
                                            <input type="text" class="form-control" id="inputEcp" name="emergency_contact_person" aria-describedby="ecpHelp" value="{{ $employees->emergency_contact_person }}">
                                            <small id="ecpHelp" class="form-text text-muted">Please enter employee emergency contact person.</small>
                                        </div>

                                        {{--Employee Emergency Contact Person Contact Number--}}
                                        <div class="form-group">
                                            <label for="inputEcpcn">Emergency Contact Number</label>
                                            <input type="text" class="form-control" id="inputEcpcn" name="ecp_contact_number" aria-describedby="ecpcnHelp" value="{{ $employees->ecp_contact_number }}">
                                            <small id="ecpcnHelp" class="form-text text-muted">Please enter employee emergency contact number.</small>
                                        </div>

								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
				        <div class="grid">
				        	<div class="grid-header">Employment Information</div>
				          	<div class="grid-body">
					            <div class="item-wrapper">

                                    {{--Employee Position--}}
                                    <div class="form-group">
                                        <label for="selectPosition">Position</label>
                                        <select class="custom-select" name="positions_id"  required>
                                        <option value="{{ $employees->positions->id }}">{{ $employees->positions->name }} (Current)</option>
                                        @foreach ($positions as $position)
                                            <option value="{{$position->id}}"> {{ $position->name}}
                                            </option>
                                        @endforeach
                                        </select>
                                        <small id="positionHelp" class="form-text text-muted">Please select position.</small>
                                    </div>

                                    {{--Employee Office Designate--}}
                                    <div class="form-group">
                                        <label for="selectOffice">Office</label>
                                        <select class="custom-select" name="offices_id"  required>
                                        <option value="{{ $employees->offices->id }}">{{ $employees->offices->name }} (Current)</option>
                                        @foreach ($offices as $office)
                                            <option value="{{$office->id}}"> {{ $office->name}}
                                            </option>
                                        @endforeach
                                        </select>
                                        <small id="officeHelp" class="form-text text-muted">Please select office.</small>
                                    </div>

                                    {{--Employee Status--}}
                                    <div class="form-group">
                                        <label for="selectStatus">Status</label>
                                        <select class="custom-select" name="statuses_id"  required>
                                        <option value="{{ $employees->statuses->id }}">{{ $employees->statuses->name }} (Current)</option>
                                        @foreach ($statuses as $status)
                                            <option value="{{$status->id}}"> {{ $status->name}}
                                            </option>
                                        @endforeach
                                        </select>
                                        <small id="statusHelp" class="form-text text-muted">Please select Status.</small>
                                    </div>

                                    {{--Employment Start Date--}}
                                    <div class="form-group">
                                        <label for="inputEmpstartdate">Employment Date Started</label>
                                        <input type="date" class="form-control" id="inputEmpstartdate" name="employment_start_date" aria-describedby="empstartdateHelp" required>
                                        <small id="empstartdateHelp" class="form-text text-muted">Please enter employee date of service started.</small>
                                    </div>

                                    {{--Employment End Date--}}
                                    <div class="form-group">
                                        <label for="inputEmpenddate">Employment Date Ended</label>
                                        <input type="date" class="form-control" id="inputEmpenddate" name="employment_end_date" aria-describedby="empenddateHelp" value="{{ $employees->employment_end_date }}>
                                        <small id="empenddateHelp" class="form-text text-muted">Please enter employee date of service ended.</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" class="form-control" value="{{ $employees->middlename }}">
                                    </div>

									<div align="center">
										<button type="submit" class="btn btn-outline-primary">Submit</button>
										<a href="/create/employee" class="btn btn-outline-primary">Back</a>
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
