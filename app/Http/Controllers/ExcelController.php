<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Model\Student;
use App\Exports\{StudentExport, BookExport};
use App\imports\StudentImport;

class ExcelController extends Controller
{
    public function studentexport() {
        return Excel::download(new StudentExport, 'datastudents.xlsx');
    }

    public function studentimport(Request $request) {
        $file = $request->file('file');
        $filename = time().'-'.$file->getClientOriginalName();
        $file->move('imports/DataStudent', $filename);

        Excel::import(new StudentImport, public_path('imports/DataStudent/'.$filename));

        return redirect(route('students.index'))->withMessage('Berhasil Menginport data');
    }

    public function bookexport() {
        return Excel::download(new BookExport, 'databuku.xlsx');
    }
}
