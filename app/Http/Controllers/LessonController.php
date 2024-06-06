<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Http\Requests\StoreLessonRequest;
use App\Models\Lesson;
use App\Http\Requests\UpdateLessonRequest;

class LessonController extends Controller
{
    // public function index(Course $course)
    // {
    //     $lessons = $course->lessons;
    //     return view('lessons.index', compact('course', 'lessons'));
    // }

    public function create(Course $course)
    {
        return view('lessons.create', compact('course'));
    }

    public function store(StoreLessonRequest $request, Course $course)
    {
        $course->lessons()->create($request->validated());

        return redirect()->route('courses.show', $course->id)->with('success', 'Lesson created successfully.');
    }

    public function show(Course $course, Lesson $lesson)
    {
        return view('lessons.show', compact('course', 'lesson'));
    }

    public function edit(Course $course, Lesson $lesson)
    {
        return view('lessons.edit', compact('course', 'lesson'));
    }

    public function update(UpdateLessonRequest $request, Course $course, Lesson $lesson)
    {
        $lesson->update($request->validated());

        return redirect()->route('courses.show', $course->id)->with('success', 'Lesson updated successfully.');
    }

    public function destroy(Course $course, Lesson $lesson)
    {
        $lesson->delete();

        return redirect()->route('courses.show', $course->id)->with('success', 'Lesson deleted successfully.');
    }
}
