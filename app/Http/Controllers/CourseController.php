<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use luminate\Database\Eloquent\Collection;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(3);
        // $courses = Course::all();
        return view('courses.index', compact("courses"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('courses.create', compact("courses"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:courses|min:2',
            'description' => 'required|unique:courses|min:10|max:100',
            'grade' => 'integer|min:0|max:100',
            'hours' => 'integer|min:1|max:20'
        ], [
            'name.unique' => "this course name already exist",
            'name.min' => "course name must be more than 2",
            'description.unique' => 'this course description already exist',
            'grade.integer' => "The total grade must be an integer.",
            'grade.min' => "The total grade must be at least 0.",
            'grade.max' => "The total grade may not be greater than 100.",
            'hours.integer' => "this must be a number",
            'hours.min' => "this must be at least 1",
            'hours.max' => "this must be lower than 20"
        ]);

        Course::create($validatedData);
        return to_route('courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'name' => 'required:courses|min:2',
            'grade' => 'integer|min:0|max:100',
            'description' => 'required|unique:courses|min:10|max:100',
            'hours' => 'integer|min:1|max:20'
        ], [
            'name.min' => "course name must be more than 2",
            'description.required' => 'this course description required',
            'grade.integer' => "The total grade must be an integer.",
            'grade.min' => "The total grade must be at least 0.",
            'grade.max' => "The total grade may not be greater than 100.",
            'hours.integer' => "this must be a number",
            'hours.min' => "this must be at least 1",
            'hours.max' => "this must be lower than 20"
        ]);
        $course->update($validatedData);
        return to_route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return to_route('courses.index');
    }
}
