<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentImport implements ToModel, WithHeadingRow, WithValidation
{

    public $student_import_id;

    public function __construct($admission_id)
    {
        $this->student_import_id = $admission_id;
    }

    public function model(array $row)
    {
        $student = Student::query()
            ->where('ic_number', $row['ic_number'])
            ->orWhere('college_number', $row['college_number'])
            ->orWhere('email', $row['email'])
            ->first();

            if ($student) {
                throw new \Exception('Student already exists');
            }

            $student = Student::create([
                'name' => $row['name'],
                'ic_number' => $row['ic_number'],
                'college_number' => $row['college_number'],
                'email' => $row['email'],
                'phone' => $row['phone'],

                'password' => bcrypt($row['ic_number']),

                'student_import_id' => $this->student_import_id,
            ]);

            return $student;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'ic_number' => 'required|unique:students,ic_number',
            'college_number' => 'required|unique:students,college_number',
            'email' => 'required|unique:students,email',
            'phone' => 'required|unique:students,phone',
        ];
    }

}
