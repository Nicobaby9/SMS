<?php

namespace App\Imports;

use App\Model\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'nisn' => $row[1],
            'fullname' => $row[2],
            'religion' => $row[3],
            'gender' => $row[4],
            'birth' => $row[5],
            'phone' => $row[6],
            'photo' => $row[7],
            'speciality' => $row[8],
            'address' => $row[9],
            'start_year' => $row[10],
            'end_year' => $row[11],

        ]);
    }
}
