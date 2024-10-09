<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeesExport implements FromCollection, WithHeadings
{
    /**
     * Return all employees from the database.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Employee::all();
    }

    /**
     * Return the headings for each column.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Employee Name',
            'Department',
            'Employee ID',
            'Designation',
            'Contact',
            'Email',
            'Created',
            'Updated'

        ];
    }
}
