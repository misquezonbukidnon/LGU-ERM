@extends('layouts.app')
@section('content')
	<div class="container">
		@include('flash::message')
		<form action="{{ url('/store/employee') }}" method ="POST" enctype="multipart/form-data">
			@csrf
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb outlined-primary has-arrow">
				  <li class="breadcrumb-item">
					<a href="/home">Home</a>
				  </li>
				  <li class="breadcrumb-item active" aria-current="page">New Entry</li>
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
					<div class="col-md-6">
						<div class="grid">
							<div class="grid-header">Personal Information</div>
							<div class="grid-body">
								<div class="item-wrapper">

                                    {{--Employee ID Number--}}
                                    <div class="form-group">
                                        <label for="inputEmployeenumber">Employee ID Number</label>
                                        <input type="text" class="form-control" id="inputEmployeenumber" name="employee_number" aria-describedby="employeenumberHelp" required>
                                        <small id="employeenumberHelp" class="form-text text-muted">Please enter employee ID number.</small>
                                    </div>

                                    {{--Employee Lastname--}}
                                    <div class="form-group">
                                        <label for="inputLastname">Lastname</label>
                                        <input type="text" class="form-control" id="inputLastname" name="lastname" aria-describedby="lastnameHelp" required>
                                        <small id="lastnameHelp" class="form-text text-muted">Please enter employee lastname.</small>
                                    </div>

                                    {{--Employee Firstname--}}
                                    <div class="form-group">
                                        <label for="inputFirstname">Firstname</label>
                                        <input type="text" class="form-control" id="inputFirstname" name="firstname" aria-describedby="firstnameHelp" required>
                                        <small id="firstnameHelp" class="form-text text-muted">Please enter employee firstname.</small>
                                    </div>

                                    {{--Employee Middlename--}}
                                    <div class="form-group">
                                        <label for="inputMiddlename">Middlename/M.I (Optional)</label>
                                        <input type="text" class="form-control" id="inputMiddlename" name="middlename" aria-describedby="middlenameHelp">
                                        <small id="middlenameHelp" class="form-text text-muted">Please enter employee middlename.</small>
                                    </div>

                                    {{--Suffix--}}
                                    <div class="form-group">
                                        <label for="selectSuffix">Suffix</label>
                                        <select class="custom-select" name="suffix">
                                        <option value="">Click to select</option>
                                        <option value="Jr">Jr</option>
                                        <option value="Sr">Sr</option>
                                        <option value="I">I</option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                        </select>
                                        <small id="positionHelp" class="form-text text-muted">Please select suffix (if applicable).</small>
                                    </div>

                                    {{--Employee Address--}}
                                    <div class="form-group">
                                        <label for="inputAddress">Address</label>
                                        <input type="text" class="form-control" id="inputAddress" name="address" aria-describedby="addressHelp" required>
                                        <small id="addressHelp" class="form-text text-muted">Please enter employee address.</small>
                                    </div>

                                    {{--Employee Contact Number--}}
                                    <div class="form-group">
                                        <label for="inputContactnumber">Contact Number</label>
                                        <input type="text" class="form-control" id="inputContactnumber" name="contact_number" aria-describedby="contactnumberHelp">
                                        <small id="contactnumberHelp" class="form-text text-muted">Please enter employee contact number.</small>
                                    </div>

                                    {{--Employee Emergency Contact Person--}}
                                    <div class="form-group">
                                        <label for="inputEcp">Emergency Contact Person</label>
                                        <input type="text" class="form-control" id="inputEcp" name="emergency_contact_person" aria-describedby="ecpHelp">
                                        <small id="ecpHelp" class="form-text text-muted">Please enter employee emergency contact person.</small>
                                    </div>

                                    {{--Employee Emergency Contact Person Contact Number--}}
                                    <div class="form-group">
                                        <label for="inputEcpcn">Emergency Contact Number</label>
                                        <input type="text" class="form-control" id="inputEcpcn" name="ecp_contact_number" aria-describedby="ecpcnHelp">
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
                                        <select class="custom-select" name="positions_id" required>
                                        <option value="">Click to select</option>
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
                                        <select class="custom-select" name="offices_id" required>
                                        <option value="">Click to select</option>
                                        @foreach ($offices as $office)
                                            <option value="{{$office->id}}"> {{ $office->name}}
                                            </option>
                                        @endforeach
                                        </select>
                                        <small id="officeHelp" class="form-text text-muted">Please select office.</small>
                                    </div>

                                    {{--Employee Classification--}}
                                    <div class="form-group">
                                        <label for="selectClass">Classification</label>
                                        <select class="custom-select" name="statuses_id"  required>
                                        @foreach ($statuses as $status)
                                            <option value="{{$status->id}}"> {{ $status->name}} </option>
                                        @endforeach
                                        </select>
                                        <small id="classHelp" class="form-text text-muted">Please select classification.</small>
                                    </div>

                                    {{--Employment Status--}}
                                    <div class="form-group">
                                        <label for="selectStatus">Status</label>
                                        <select class="custom-select" name="employment_statuses_id"  required>
                                        @foreach ($employmentstatuses as $status)
                                            <option value="{{$status->id}}"> {{ $status->name}}
                                            </option>
                                        @endforeach
                                        </select>
                                        <small id="statusHelp" class="form-text text-muted">Please select status.</small>
                                    </div>


                                    {{--Employment Start Date--}}
                                    <div class="form-group">
                                        <label for="inputEmpstartdate">Employment Date</label>
                                        <input type="date" class="form-control" id="inputEmpstartdate" name="employment_start_date" aria-describedby="empstartdateHelp" required>
                                        <small id="empstartdateHelp" class="form-text text-muted">Please enter date of service started.</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" class="form-control" required>
									</div>

                                    <div align="center">
										<button type="submit" class="btn btn-outline-primary">Submit</button>
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
