<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Student;
use App\Models\Track;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('track')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $tracks = Track::all();
        return view('students.create', compact('tracks'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $student = new Student;
        $student->name = $data['name'];
        $student->email = $data['email'];
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('student_photos', 'public');
        }

        Student::create($data);
        return redirect()->route('students.index');
    }

    public function edit(Student $student)
    {
        $tracks = Track::all();
        return view('students.edit', compact('student', 'tracks'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $updatedStudentData = $request->all();


        if ($request->hasFile('photo')) {
            if ($student->photo) {
                Storage::delete('public/' . $student->photo);
            }
            $updatedStudentData['photo'] = $request->file('photo')->store('student_photos', 'public');
        }

        $student->update($updatedStudentData);
        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        if ($student->photo) {
            Storage::delete('public/' . $student->photo);
        }
        $student->delete();
        return redirect()->route('students.index');
    }
}
