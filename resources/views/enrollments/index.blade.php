@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Enrollments</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif

    @if($enrollments->isEmpty())
        <p>You are not enrolled in any courses.</p>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Course Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($enrollments as $enrollment)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $enrollment->course->title }}</td>
                            <td>{{ $enrollment->course->description }}</td>
                            <td>
                                <a href="{{ route('courses.show', $enrollment->course->id) }}" class="btn btn-info btn-sm">View Course</a>
                                <form action="{{ route('courses.drop', $enrollment->course->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Drop Course</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
