<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;


class EnrollmentController extends Controller
{
    public function index()
    {
        $courses = Auth::user()->enrollments->map->course;
        return view('enrollments.index', compact('courses'));
    }

    public function enroll(Course $course)
    {
        Auth::user()->enrollments()->create(['course_id' => $course->id]);

        return redirect()->route('userCourses')->with('success', 'Enrolled in course successfully.');
    }
}
