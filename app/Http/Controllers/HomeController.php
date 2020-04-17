<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Office;
use App\Position;
use App\Status;
use App\Role;
use App\User;
use App\Auth;
use DataTables;
use input;


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
        if ($request->ajax()) {

            if(!empty($request->filter_office))
            {
                $data = Employee::with('positions', 'offices')
                    ->where('offices_id','=', $request->filter_office)
                    ->get();
            }
            else
            {
                $data = Employee::with('positions', 'offices')->get();

            }

            return Datatables::of($data)
            ->addColumn('action', function($data){

                if(auth()->user()->roles_id == 3)
                    $button = '<a href="/edit/employee/'.$data->id.'" class="btn btn-sm btn-outline-primary"">Edit</a>&nbsp;<a href="/view/employee/'.$data->id.'" class="btn btn-sm btn-outline-primary"">View</a>';
                else
                    $button = '<a href="/view/'.$data->id.'" class="btn btn-sm btn-outline-primary"">View</a>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('home',compact('offices'));
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
