@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header ">Lesson Details</div>

                <div class="card-body">
                    <h4 class="card-title">{{ $lesson->title }}</h4>
                    <p class="card-text">{{ $lesson->content }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
