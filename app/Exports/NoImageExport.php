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

class NoImageExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        $employees = Employee::with('positions', 'offices', 'statuses', 'employmentstatuses')->where('image', '=', null)->get();
        return view('employee.exportfilternoimage',compact('employees'));
    }
}
