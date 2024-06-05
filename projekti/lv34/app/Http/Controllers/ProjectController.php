<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projects = Project::with('teamMembers')->where('user_id', Auth::id())->orWhereHas('teamMembers', function($query) {
            $query->where('user_id', Auth::id());
        })->get();

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $users = User::all();
        return view('projects.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ime' => 'required|string|max:255',
            'opis' => 'nullable|string',
            'cijena' => 'nullable|numeric',
            'datum_pocetka' => 'nullable|date',
            'datum_zavrsetka' => 'nullable|date',
            'clanovi_tima' => 'nullable|array',
        ]);

        $project = Auth::user()->projects()->create($validated);

        if ($request->has('team_members')) {
            $project->teamMembers()->attach($request->team_members);
        }

        return redirect()->route('projects.index');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $this->authorize('update', $project);
        $users = User::all();
        return view('projects.edit', compact('project', 'users'));
    }

    public function update(Request $request, Project $project)
    {
        $this->authorize('update', $project);

        $validated = $request->validate([
            'ime' => 'required|string|max:255',
            'opis' => 'nullable|string',
            'cijena' => 'nullable|numeric',
            'datum_pocetka' => 'nullable|date',
            'datum_zavrsetka' => 'nullable|date',
            'clanovi_tima' => 'nullable|array',
            'obavljeni_poslovi' => 'nullable|string',

        ]);

        $project->update($validated);

        if ($request->has('team_members')) {
            $project->teamMembers()->sync($request->team_members);
        }

        return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);
        $project->delete();
        return redirect()->route('projects.index');
    }
}
