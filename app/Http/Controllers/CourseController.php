<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        $teachers = Teacher::all();
       return view('courses.index', compact('courses','teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $techers = Teacher::all();
        return view('courses.create',compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'teacher_id' => 'required'
    ]);

    Course::create([
        'title' => $request->title,
        'teacher_id' => $request->teacher_id
    ]);

    flash()->title('Course Added')->success('Course Added Successfully!');

    return back();
}

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
