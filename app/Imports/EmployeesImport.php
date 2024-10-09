<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Employee([
            'employee_name'       => $row['employee_name'],  // Make sure this is the name column
            'employee_department' => $row['department'],
            'employee_id'         => $row['employee_id'],   // Ensure ID from Excel goes to the right field
            'employee_designation'=> $row['designation'],
            'employee_contact'    => $row['contact'],
            'employee_email'      => $row['email'],
        ]);
    }
}
