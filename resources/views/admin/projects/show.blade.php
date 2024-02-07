@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h1 class="fs-2 py-2">{{ $project->title }}</h1>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-dark">Back to Projects<i
                    class="fa-solid fa-backward ms-3"></i></a>
        </div>
        @if (session('update_record'))
            <div class="alert alert-success" role="alert">
                {{ session('update_record') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Title</h5>
                <p class="card-text">{{ $project->title }}</p>
                <h5 class="card-title">Stack</h5>
                <p class="card-text">{{ $project->technologies_stack }}</p>
                <h5 class="card-title">Description</h5>
                <p class="card-text">{{ $project->description }}</p>
                <h5 class="card-title">Project Type</h5>
                <p class="card-text">
                    @if ($project->is_frontend)
                        Frontend
                    @elseif ($project->is_backend)
                        Backend
                    @else
                        Fullstack
                    @endif
                </p>
                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
@endsection
