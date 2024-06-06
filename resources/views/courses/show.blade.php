@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Course Details</div>

                <div class="card-body">
                    <h4>{{ $course->title }}</h4>
                    <p>{{ $course->description }}</p>
                    <div class="lesson-section bg-light p-3 mb-3">
                        <h5 class="mb-3">Lessons</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th width="20%">#</th>
                                        <th width="30%">Title</th>
                                        <th width="50%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($course->lessons as $lesson)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $lesson->title }}</td>
                                            <td class="align-middle text-center">
                                                <a href="{{ route('courses.lessons.show', [$course->id, $lesson->id]) }}" class="btn btn-info ">Show</a>
                                                @if(Auth::check() && Auth::user()->role == 'admin')
                                                    <a href="{{ route('courses.lessons.edit', [$course->id, $lesson->id]) }}" class="btn btn-secondary ">Edit</a>
                                                    <form action="{{ route('courses.lessons.destroy', [$course->id, $lesson->id]) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger ">Delete</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 offset-md-6">
                            @if(Auth::check() && Auth::user()->role == 'admin')
                                <a href="{{ route('courses.lessons.create', $course->id) }}" class="btn btn-primary mb-3 float-right">Add Lesson</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
