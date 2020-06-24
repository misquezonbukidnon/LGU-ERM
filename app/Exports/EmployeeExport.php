<?php

namespace App\Exports;

use App\Employee;
use App\Position;
use App\Office;
use App\Status;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EmployeeExport implements FromView
{
    public function view(): View
    {
        $employees = Employee::all();
        $offices = Office::all();
        $positions = Position::all();
        $statuses = Status::all();
        return view('employee.employees', compact('employees', 'offices','positions', 'statuses'));
    }
}
