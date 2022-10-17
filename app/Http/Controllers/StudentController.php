<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function get_all_student()
    {
        $students = Student::all();
        // echo '<pre>';
        // var_dump($students);
        // echo '</pre>';
        return view('students.manage', ['students' => $students]);
    }
    
    public function detail($id)
    {
        $student = Student::findOrFail($id);
        if (!$student) {
            return abort(404);
        }
        return view('students.detail', ['student' => $student]);
    }

    public function create()
    {
        return view('students.add');
    }

    public function store(StoreStudentRequest $request)
    {
        $birthdayStr = Carbon::parse($request->txtBirthday)->format('Y-m-d');
        $newStudent = [
            'fullname' => $request->txtFullname,
            'birthday' => $birthdayStr,
            'address' => $request->txtAddress,
        ];
        Student::create($newStudent);
        return redirect('/students');
    }

    public function get_student_by_id($id)
    {
        $student = Student::findOrFail($id);
        if (!$student) {
            abort(404);
        }
        return view('students.edit', ['student' => $student]);
    }

    public function update(StoreStudentRequest $request, $id)
    {
        $birthdayStr = Carbon::parse($request->txtBirthday)->format('Y-m-d');
        $newStudent = [
            'fullname' => $request->txtFullname,
            'birthday' => $birthdayStr,
            'address' => $request->txtAddress,
        ];
        Student::where('id', $id)->update($newStudent);
        return redirect('/students');
    }

    public function destroy($id)
    {
        Student::destroy($id);
        return redirect('/students');
    }
    
}
