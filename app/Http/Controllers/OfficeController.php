<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Office;
use input;
use DataTables;

class OfficeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    | Page Redirection - Office/Create
    */
    Public function create(Request $request){
        // $offices = Office::all();
    	// return view('office.create',compact('offices'));
        if ($request->ajax()) {
            $data = Office::latest()->get();
            return Datatables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<a href="/edit/office/'.$data->id.'" class="btn btn-sm btn-outline-primary""><i class="mdi mdi-lead-pencil"><i></a>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('office.create');
    }
    
    /*
    | Store - Offices
    */
    Public function store(Request $request){
        $input = $request->input('name');
        $ucword = ucwords($input);
    	$data = new Office;    	
    	$data->name = $ucword; 
    	$data->save();
    	flash('Recorded Successfully!')->success();
    	return back()->withInput();
    }

    /*
    | Edit - Offices
    */
    Public function edit($id){
        $offices = Office::findOrFail($id);
        return view('office.edit', compact('offices'));
    }

    /*
    | Update - Offices
    */
    Public function update(Request $request, $id){
        $input = $request->input('name');
        $ucword = ucwords($input);
        $data = Office::findOrFail($id);     
        $data->name = $ucword; 
        $data->save();
        flash('Updated Successfully!')->success();
        // return back()->withInput();
        return redirect('/create/office');
    }
}
