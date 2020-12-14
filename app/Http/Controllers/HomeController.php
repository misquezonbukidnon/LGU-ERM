<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Employee;
use App\Office;
use App\Position;
use App\Status;
use App\EmploymentStatus;
use App\Role;
use App\User;
use App\Auth;
use DataTables;
use input;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $offices = Office::all();
        $statuses = Status::all();
        $employmentstatuses = EmploymentStatus::all();
        $positions = Position::all();

        if ($request->ajax()) {

            if(!empty($request->filter_office) && $request->filter_office != 'Office' && !empty($request->filter_classification) && $request->filter_classification != 'Classification' && !empty($request->filter_status) && $request->filter_status != 'Status')
            {
                // Office, Classification, Statuses is not empty
                $data = Employee::with('offices', 'statuses', 'employmentstatuses', 'positions')
                    ->where('offices_id','=', $request->filter_office)
                    ->where('statuses_id','=', $request->filter_classification)
                    ->where('employment_statuses_id','=', $request->filter_status)
                    ->get();
            }elseif (!empty($request->filter_office) && $request->filter_office != 'Office' && $request->filter_classification == 'Classification' && !empty($request->filter_status) && $request->filter_status != 'Status') {
                // Office, Statuses is not empty
                $data = Employee::with('offices', 'statuses', 'employmentstatuses', 'positions')
                ->where('offices_id','=', $request->filter_office)
                ->where('employment_statuses_id','=', $request->filter_status)
                ->get();
            }elseif (!empty($request->filter_office) && $request->filter_office != 'Office' && !empty($request->filter_classification) && $request->filter_classification != 'Classification' && $request->filter_status == 'Status') {
                // Office, Classification is not empty
                $data = Employee::with('offices', 'statuses', 'employmentstatuses', 'positions')
                    ->where('offices_id','=', $request->filter_office)
                    ->where('statuses_id','=', $request->filter_classification)
                    ->get();
            }elseif (!empty($request->filter_office) && $request->filter_office != 'Office' && $request->filter_classification == 'Classification' && $request->filter_status == 'Status') {
                // Office is not empty
                $data = Employee::with('offices', 'statuses', 'employmentstatuses', 'positions')
                    ->where('offices_id','=', $request->filter_office)
                    ->get();
            }elseif ($request->filter_office == 'Office' && !empty($request->filter_classification) && $request->filter_classification != 'Classification' && $request->filter_status == 'Status') {
                //filter classification
                $data = Employee::with('offices', 'statuses', 'employmentstatuses', 'positions')
                    ->where('statuses_id','=', $request->filter_classification)
                    ->get();
            }elseif ($request->filter_office == 'Office' && $request->filter_classification == 'Classification' && !empty($request->filter_status) && $request->filter_status != 'Status') {
                //filter employment status
                $data = Employee::with('offices', 'statuses', 'employmentstatuses', 'positions')
                    ->where('employment_statuses_id','=', $request->filter_status)
                    ->get();
            }elseif ($request->filter_office == 'Office' && $request->filter_classification == 'Classification' && $request->filter_status == 'Status'){
                $data = Employee::with('offices', 'statuses', 'employmentstatuses', 'positions')->get();
            }
            else{
                $data = Employee::with('offices', 'statuses', 'employmentstatuses', 'positions')->get();
                // $data = Employee::with('offices')->get();
            }

            return Datatables::of($data)
            ->addColumn('action', function($data){

                if(auth()->user()->roles_id == 3)
                    $button = '<a href="/edit/employee/'.$data->id.'"class="btn btn-sm btn-outline-primary""><span class="mdi mdi-lead-pencil mdi-1x"></span></a>&nbsp;<a href="/view/employee/'.$data->id.'" class="btn btn-sm btn-outline-primary view" target="_blank""><span class="mdi mdi-magnify mdi-1Px"></span></a>&nbsp;<a href="/editimage/employee/'.$data->id.'" class="btn btn-sm btn-outline-primary view""><span class="mdi mdi-account-box mdi-1x"></span></a>';
                else
                    $button = '<a href="/view/'.$data->id.'" target="_blank" class="btn btn-sm btn-outline-primary""><span class="mdi mdi-magnify mdi-2x"></span></button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('home',compact('offices', 'statuses', 'employmentstatuses', 'positions'));
    }

    /*
    | View - Employee by Employee ID
    */

    Public function view($id){
        $employees = Employee::findOrFail($id);
        $offices = Office::all();
        $positions = Position::all();
        $statuses = Status::all();
        return view('guest.view', compact('employees', 'offices','positions', 'statuses'));
    }

}
