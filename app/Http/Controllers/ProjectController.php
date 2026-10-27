<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private function rules(): array
    {
        return [
            'title'       => 'required|max:80',
            'description' => 'required|max:300',
            'image_url'   => 'nullable|url|max:255',
            'project_url' => 'nullable|url|max:255',
        ];
    }

    // Halaman portofolio (template) - READ dari database
    public function portfolio()
    {
        return view('portfolio', ['projects' => Project::latest()->get()]);
    }

    // ADMIN: READ daftar
    public function index()
    {
        return view('admin.projects.index', ['projects' => Project::latest()->get()]);
    }

    // ADMIN: CREATE (form)
    public function create()
    {
        return view('admin.projects.form', ['project' => null]);
    }

    // ADMIN: CREATE (simpan)
    public function store(Request $request)
    {
        Project::create($request->validate($this->rules()));
        return redirect()->route('projects.index')->with('status', 'Proyek ditambahkan.');
    }

    // ADMIN: UPDATE (form terisi)
    public function edit(Project $project)
    {
        return view('admin.projects.form', ['project' => $project]);
    }

    // ADMIN: UPDATE (simpan)
    public function update(Request $request, Project $project)
    {
        $project->update($request->validate($this->rules()));
        return redirect()->route('projects.index')->with('status', 'Proyek diperbarui.');
    }

    // ADMIN: DELETE
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('status', 'Proyek dihapus.');
    }
}
