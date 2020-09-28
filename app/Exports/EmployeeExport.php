<?php

namespace App\Exports;

use App\Employee;
use App\Position;
use App\Office;
use App\Status;
use App\EmploymentStatus;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Sheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;

Sheet::macro('styleCells', function (Sheet $sheet, string $cellRange, array $style) {
    $sheet->getDelegate()->getStyle($cellRange)->applyFromArray($style);
});


Sheet::macro('setOrientation', function (Sheet $sheet, $orientation) {
    $sheet->getDelegate()->getPageSetup()->setOrientation($orientation);
});

class EmployeeExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        $employees = Employee::all();
        $offices = Office::all();
        $positions = Position::all();
        $statuses = Status::all();
        $employmentstatuses = EmploymentStatus::all();
        return view('employee.employees', compact('employees', 'offices','positions', 'statuses','employmentstatuses'));
    }

}
