<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        $layout = 'index';

        // dd($studentst)

        return view('students.index', compact('students', 'layout'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        $layout = 'create';

        return view('students.index', compact('students', 'layout'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required|unique:students|min:8|max:10',
            'fullname' => 'required|max:150',
            'birth' => 'required',
            'phone' => 'required|min:10|max:14',
            'speciality' => 'required|max:38',
            'address' => 'required',
        ]);

        $student = Student::create([
            'nik' => $request['nik'],
            'fullname' => $request['fullname'],
            'birth' => $request['birth'],
            'phone' => $request['phone'],
            'speciality' => $request['speciality'],
            'address' => $request['address'],
        ]);

        return redirect('/administrator/students')->with(['success' => 'Data was successfully created.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        $students = Student::all();
        $layout = 'show';

        return view('students.index', compact('student', 'students', 'layout'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $students = Student::all();
        $layout = 'edit';

        return view('students.index', compact('student', 'students', 'layout'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::where('id', $id)->update([
            'nik' => $request['nik'],
            'fullname' => $request['fullname'],
            'birth' => $request['birth'],
            'phone' => $request['phone'],
            'speciality' => $request['speciality'],
            'status' => $request['status'],
            'address' => $request['address'],
        ]);

        return redirect('/administrator/students')->with(['success' => 'Student data was successfully updated.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::destroy($id);

        return redirect('/administrator/students')->with(['success' => 'Data was successfully deleted.']);
    }
}
