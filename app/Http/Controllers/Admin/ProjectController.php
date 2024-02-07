<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $request_validated = $request->validated();
        $project = new Project();
        $project->fill($request_validated);
        $project->slug = Str::of($project->title)->slug('-');
        switch ($request['application_type']) {
            case '1':
                $project->is_frontend = true;
                break;
            case '2':
                $project->is_backend = true;
                break;
            case '3':
                $project->is_monolith = true;
                break;
        }
        $project->save();
        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {

        $data_validated = $request->validated();

        $project->slug = Str::of($project->title)->slug('-');
        switch ($request['application_type']) {
            case '1':
                $project->is_frontend = true;
                $project->is_backend = false;
                $project->is_monolith = false;
                break;
            case '2':
                $project->is_frontend = false;
                $project->is_backend = true;
                $project->is_monolith = false;
                break;
            case '3':
                $project->is_frontend = true;
                $project->is_backend = true;
                $project->is_monolith = false;
                break;
        }

        $project->update($data_validated);
        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
