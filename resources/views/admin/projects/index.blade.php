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
                    <th>Slug</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr class="align-middle">
                        <td>{{ $project->id }}</th>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->technologies_stack }}</td>
                        <td>{{ $project->slug }}</td>
                        <td>
                            <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-secondary">Details</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
