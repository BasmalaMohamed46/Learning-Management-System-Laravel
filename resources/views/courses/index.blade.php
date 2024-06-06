@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Courses</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" width="7%">#</th>
                    <th scope="col" width="23%">Title</th>
                    <th scope="col" width="45%">Description</th>
                    <th scope="col" width="25%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->description }}</td>
                        <td class="align-middle text-center">
                            <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info mr-2">View</a>
                            @if(Auth::check() && Auth::user()->role == 'admin')
                                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-secondary mr-2">Edit</a>
                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger ">Delete</button>
                                </form>
                            @else
                                @if(Auth::user()->enrollments()->where('course_id', $course->id)->exists())
                                    <form action="{{ route('courses.drop', $course->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mr-2">Drop</button>
                                    </form>
                                @else
                                    <form action="{{ route('courses.enroll', $course->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Enroll</button>
                                    </form>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        {{ $courses->links() }}
    </div>
</div>
@endsection
