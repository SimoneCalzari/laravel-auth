@extends('layouts.admin')


@section('content')
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h1 class="fs-2 py-2">My personal projects</h1>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-dark">New Project<i
                    class="fa-solid fa-plus ms-3"></i></a>
        </div>

        <table class="table table-bordered table-dark table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Stack</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</th>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->tecnologies_stack }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
