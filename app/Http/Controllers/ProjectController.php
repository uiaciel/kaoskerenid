<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Klien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = Project::All();
        $kliens = Klien::OrderBy('created_at', 'DESC')->get();

        return view('project.index', [
            'projects' => $project,
            'kliens' => $kliens
        ]);
    }

    public function create()
    {
        return view('project.create');
    }

    public function store(Request $request)
    {
        $project = new Project;
        $project->nama = $request->nama;
        $project->klien_id = $request->klien_id;
        $project->nilai = $request->nilai;
        $project->status = $request->status;
        $project->kategori = $request->kategori;
        $project->jatuhtempo = $request->jatuhtempo;
        $project->save();

        return redirect()->back()->with('success', 'Project posted successfully.');
    }

    public function show(Project $project)
    {
    }

    public function edit(Project $project)
    {
        return view('project.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $project->update($request->all());

        return redirect()->back()->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->back()->with('success', 'Project deleted successfully.');
    }
}
