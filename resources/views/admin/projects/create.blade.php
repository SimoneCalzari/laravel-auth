@extends('layouts.admin')


@section('content')
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h1 class="fs-2 py-2">New Project Form</h1>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-dark">Back to Projects<i
                    class="fa-solid fa-backward ms-3"></i></a>
        </div>
        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="stack" class="form-label">Technologies Stack</label>
                <input type="text" class="form-control" id="stack" name="technologies_stack">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Project Description</label>
                <textarea class="form-control" style="height: 100px" id="description" name="description"></textarea>
            </div>
            <h5 class="fw-lighter">Project Type</h5>
            <div class="mb-2 form-check">
                <input type="radio" class="form-check-input" id="frontEnd" value="1" name="application_type">
                <label class="form-check-label" for="frontEnd">Front End</label>
            </div>
            <div class="mb-2 form-check">
                <input type="radio" class="form-check-input" id="backEnd" value="2" name="application_type">
                <label class="form-check-label" for="backEnd">Back End</label>
            </div>
            <div class="mb-4 form-check">
                <input type="radio" class="form-check-input" id="fullStack" value="3" name="application_type">
                <label class="form-check-label" for="fullStack">Full Stack</label>
            </div>
            <button type="submit" class="btn btn-dark">Submit</button>
        </form>
    </div>
@endsection
