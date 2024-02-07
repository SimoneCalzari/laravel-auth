@extends('layouts.admin')


@section('content')
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h1 class="fs-2 py-2">My personal projects</h1>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-dark">New Project<i
                    class="fa-solid fa-plus ms-3"></i></a>
        </div>
        @if (session('new_record'))
            <div class="alert alert-success" role="alert">
                {{ session('new_record') }}
            </div>
        @endif
        @if (session('delete_record'))
            <div class="alert alert-danger" role="alert">
                {{ session('delete_record') }}
            </div>
        @endif

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
                        {{-- <td>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td> --}}
                        <td>
                            <!-- FORM CANCELLAZIONE RIGA  -->
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <!-- BUTTON CHE APRE LA MODALE -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modale-delete{{ $project['id'] }}">
                                    Delete
                                </button>
                                <!-- /BUTTON CHE APRE LA MODALE -->
                                <!-- MODALE -->
                                <div class="modal fade" id="modale-delete{{ $project['id'] }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content text-black">
                                            <!-- MODALE HEADER -->
                                            <div class="modal-header">
                                                <h3 class="modal-title fs-5">Delete project Confirmation</h3>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <!-- /MODALE HEADER -->
                                            <!-- MODALE BODY -->
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete {{ $project['title'] }}?</p>
                                            </div>
                                            <!-- /MODALE BODY -->
                                            <!-- MODALE FOOTER -->
                                            <div class="modal-footer">
                                                <!-- BUTTON CHIUSURA MODALE -->
                                                <button type="button" class="btn btn-primary"
                                                    data-bs-dismiss="modal">No</button>
                                                <!-- /BUTTON CHIUSURA MODALE -->
                                                <!-- BUTTON SUBMIT FORM PER CANCELLARE RIGA -->
                                                <button type="submit" class="btn btn-danger">Yes</button>
                                                <!-- /BUTTON SUBMIT FORM PER CANCELLARE RIGA -->
                                            </div>
                                            <!-- /MODALE FOOTER -->
                                        </div>
                                    </div>
                                </div>
                                <!-- /MODALE -->
                            </form>
                            <!-- /FORM CANCELLAZIONE RIGA  -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
