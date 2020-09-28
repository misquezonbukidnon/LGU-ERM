<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Position;
use App\Office;
use App\Status;
use App\EmploymentStatus;
use DataTables;
use Image;
use input;
use App\Exports\EmployeeExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Validator;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   /*
    | Page Redirection - Create New Employee
    */
    Public function create(Request $request){

        $employees = Employee::with('offices', 'positions', 'statuses', 'employmentstatuses')->get();
        $offices = Office::all();
        $positions = Position::all();
        $statuses = Status::all();
        $employmentstatuses = EmploymentStatus::all();
        return view('employee.create',compact('employees', 'offices','positions', 'statuses', 'employmentstatuses'));
    }

    Public function store(Request $request){


        $employee_number = $request->input('employee_number');
        $input_2 = $request->input('lastname');
        $ucword_2 = ucwords($input_2);
        $input_3 = $request->input('firstname');
        $ucword_3 = ucwords($input_3);
        $input_4 = $request->input('middlename');
        $ucword_4 = ucwords($input_4);
        $suffix = $request->input('suffix');
        $positions_id = $request->input('positions_id');
        $offices_id = $request->input('offices_id');
        $input_5 = $request->input('address');
        $ucword_5 = ucwords($input_5);
        $input_6 = $request->input('contact_number');
        $ucword_6 = ucwords($input_6);
        $input_7 = $request->input('emergency_contact_person');
        $ucword_7 = ucwords($input_7);
        $input_8 = $request->input('ecp_contact_number');
        $ucword_8 = ucwords($input_8);
        $statuses_id = $request->input('statuses_id');
        $employment_statuses_id = $request->input('employment_statuses_id');
        $employment_start_date = $request->input('employment_start_date');
        $employment_end_date = $request->input('employment_end_date');
        $query = Employee::where('employee_number', '=', $employee_number)->first();

        /*
            Checking for duplicate entries
        */

        if ($query != null) {
            flash('Oops! '. $employee_number.' already exist from our records.')->error();
            return back()->withInput();
        }else{
            $data = new Employee;
            $data->employee_number = $employee_number;
            $data->lastname = $ucword_2;
            $data->firstname = $ucword_3;
            $data->middlename = $ucword_4;
            $data->suffix = $suffix;
            $data->positions_id = $positions_id;
            $data->offices_id = $offices_id;
            $data->address = $ucword_5;
            $data->contact_number = $ucword_6;
            $data->emergency_contact_person = $ucword_7;
            $data->ecp_contact_number = $ucword_8;
            $data->statuses_id = $statuses_id;
            $data->employment_statuses_id = $employment_statuses_id;
            $data->employment_start_date = $employment_start_date;
            $data->employment_end_date = $employment_end_date;
            $data->statuses_id = $statuses_id;

             /*
                Save Image
            */

            $this->validate($request, [
                'image' => '
                    required|image|mimes:jpg,jpeg,png|max:20000']);
            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $image_name = $data->lastname.'-'.$data->firstname. '.' . $image->getClientOriginalExtension();
                $resize_image = Image::make($image->getRealPath());
                $resize_image->resize(800, 800)->save('uploads/employee/'.$image_name);
                $data->image = $image_name;
            } else {
                    return $request;
                    $data->image = '';
                }

            $data->save();

            flash($employee_number.' has been successfully recorded to database!')->success();
            return back()->withInput();
        }

    }


    /*
    | Edit - Employee
    */
    Public function edit($id){

        $employees = Employee::findOrFail($id);
        $offices = Office::all();
        $positions = Position::all();
        $statuses = Status::all();
        $employmentstatuses = EmploymentStatus::all();
        return view('employee.edit', compact('employees', 'offices','positions', 'statuses', 'employmentstatuses'));
    }

    /*
    | Update - Employee
    */

    Public function update(Request $request, $id){


        $employee_number = $request->input('employee_number');
        $input_2 = $request->input('lastname');
        $ucword_2 = ucwords($input_2);
        $input_3 = $request->input('firstname');
        $ucword_3 = ucwords($input_3);
        $input_4 = $request->input('middlename');
        $ucword_4 = ucwords($input_4);
        $suffix = $request->input('suffix');
        $positions_id = $request->input('positions_id');
        $offices_id = $request->input('offices_id');
        $input_5 = $request->input('address');
        $ucword_5 = ucwords($input_5);
        $input_6 = $request->input('contact_number');
        $ucword_6 = ucwords($input_6);
        $input_7 = $request->input('emergency_contact_person');
        $ucword_7 = ucwords($input_7);
        $input_8 = $request->input('ecp_contact_number');
        $ucword_8 = ucwords($input_8);
        $statuses_id = $request->input('statuses_id');
        $employment_statuses_id = $request->input('employment_statuses_id');
        $employment_start_date = $request->input('employment_start_date');
        $employment_end_date = $request->input('employment_end_date');

        $data = Employee::findOrFail($id);
    	$data->employee_number = $employee_number;
        $data->lastname = $ucword_2;
        $data->firstname = $ucword_3;
        $data->middlename = $ucword_4;
        $data->suffix = $suffix;
        $data->positions_id = $positions_id;
        $data->offices_id = $offices_id;
        $data->address = $ucword_5;
        $data->contact_number = $ucword_6;
        $data->emergency_contact_person = $ucword_7;
        $data->ecp_contact_number = $ucword_8;
        $data->statuses_id = $statuses_id;
        $data->employment_statuses_id = $employment_statuses_id;
        $data->employment_start_date = $employment_start_date;
        $data->employment_end_date = $employment_end_date;

        $this->validate($request, [
            'image' => '
                image|mimes:jpg,jpeg,png|max:20000']);
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $image_name = $data->lastname.'-'.$data->firstname. '.' . $image->getClientOriginalExtension();
            $resize_image = Image::make($image->getRealPath());
            $resize_image->resize(800, 800)->save('uploads/employee/'.$image_name);
            $data->image = $image_name;
            $data->save();
        } else {
            $data->save();
            }
        flash($employee_number.' has been successfully updated to database!')->success();
        // return back()->withInput();
        return redirect('/home');
    }

    /*
    | View - Employee by Employee ID
    */

    Public function view(Request $request, $id){

        $employees = Employee::findOrFail($id);
        $offices = Office::all();
        $positions = Position::all();
        $statuses = Status::all();
        $employmentstatuses = EmploymentStatus::all();
        return view('employee.view', compact('employees', 'offices','positions', 'statuses', 'employmentstatuses'));

        // if($request()->ajax())
        // {
        //     $data = Employee::findOrFail($id);
        //     return response()->json(['data' => $data]);
        // }
    }

    public function export()
    {
        $date = Carbon::now()->format('M d Y');
        return Excel::download(new EmployeeExport, "Employees - $date.xlsx");
    }

}
