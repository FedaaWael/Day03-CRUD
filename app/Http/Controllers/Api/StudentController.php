<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return $students;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|min:2',
            'email' => 'required|email|unique:students',
            'track_id' => 'required|exists:tracks,id'
        ];

        // Define custom error messages
        $messages = [
            'name.required' => 'The name field is required',
            'email.required' => 'The email field is required',
            'email.email' => 'The email must be a valid email address',
            'email.unique' => 'This email is already registered',
            'track_id.required' => 'The track ID is required',
            'track_id.exists' => 'The selected track does not exist'
        ];
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('student_photos', 'public');
        }
        $validator = Validator::make($request->all(), $rules, $messages, $data);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $student = Student::create($validator->validated());

        return response()->json(['message' => 'Student created successfully', 'student' => $student], 201);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }
        return response()->json($student, 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);
        $rules = [
            'name' => 'required|string|min:2',
            'email' => ['required', 'email', Rule::unique('students')->ignore($student->id)],
            'track_id' => 'required|exists:tracks,id'
        ];
        $messages = [
            'name.required' => 'The name field is required',
            'email.required' => 'The email field is required',
            'email.email' => 'The email must be a valid email address',
            'email.unique' => 'This email is already registered',
            'track_id.required' => 'The track ID is required',
            'track_id.exists' => 'The selected track does not exist'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $student->update($validator->validated());
        return response()->json(['message' => 'Student updated successfully', 'student' => $student], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }
        $student->delete();
        return response()->json(['message' => 'Student deleted successfully'], 200);
    }
}
