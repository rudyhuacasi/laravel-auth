<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\category;
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
        $categories= category::all();
        return view('admin.projects.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();

        $slug = Str::of($data['title'])->slug();

        $data['slug'] = $slug;

        $project = new Project();

        $project->title = $data['title'];
        $project->content = $data['content'];
        $project->slug = $data['slug'];
        $project->category_id = $data['category_id'];

        $project->save();

        return redirect()->route('admin.projects.index')->with('message', 'Articolo creato corretamento');
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
        $data = $request->validated();

        $slug = Str::of($data['title'])->slug();

        $data['slug'] = $slug;

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('message', 'Articolo aggiornato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('message', 'Articolo eliminato correttamente');
    }
}
