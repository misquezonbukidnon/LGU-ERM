<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;
use DataTables;
use input;

class PositionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    | Page Redirection - Position/Create
    */
    Public function create(Request $request){
        // $positions = Position::all();
    	// return view('position.create',compact('positions'));
        if ($request->ajax()) {
            $data = Position::latest()->get();
            return Datatables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<a href="/edit/position/'.$data->id.'" class="btn btn-sm btn-outline-primary""><i class="mdi mdi-lead-pencil"><i></a>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('position.create');
    }
    
    /*
    | Store - positions
    */
    Public function store(Request $request){
        $input = $request->input('name');
        $ucword = ucwords($input);
    	$data = new position;    	
    	$data->name = $ucword; 
    	$data->save();
    	flash('Recorded Successfully!')->success();
    	return back()->withInput();
    }

    /*
    | Edit - positions
    */
    Public function edit($id){
        $positions = Position::findOrFail($id);
        return view('position.edit', compact('positions'));
    }

    /*
    | Update - positions
    */
    Public function update(Request $request, $id){
        $input = $request->input('name');
        $ucword = ucwords($input);
        $data = Position::findOrFail($id);     
        $data->name = $ucword; 
        $data->save();
        flash('Updated Successfully!')->success();
        // return back()->withInput();
        return redirect('/create/position');
    }
    
}
