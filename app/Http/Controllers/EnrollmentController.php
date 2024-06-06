<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Auth::user()->enrollments()->with('course')->get();
        return view('enrollments.index', compact('enrollments'));
    }

    public function enroll(Course $course)
    {
        $user = Auth::user();

        // Check if the user is already enrolled in the course
        if ($user->enrollments()->where('course_id', $course->id)->exists()) {
            return redirect()->route('user-courses')->with('warning', 'You are already enrolled in this course.');
        }

        // Enroll the user in the course
        $user->enrollments()->create(['course_id' => $course->id]);

        return redirect()->route('user-courses')->with('success', 'Enrolled in course successfully.');
    }
    public function drop(Course $course)
    {
        $user = Auth::user();

        // Check if the user is enrolled in the course
        $enrollment = $user->enrollments()->where('course_id', $course->id)->first();
        if ($enrollment) {
            $enrollment->delete();
            return redirect()->route('user-courses')->with('success', 'Dropped the course successfully.');
        }

        return redirect()->route('user-courses')->with('warning', 'You are not enrolled in this course.');
    }
}

