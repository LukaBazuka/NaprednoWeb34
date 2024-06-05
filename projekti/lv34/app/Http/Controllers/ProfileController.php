<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $projects = $user->projects;
        $teamProjects = $user->projectTeams;

        return view('profile.index', compact('user', 'projects', 'teamProjects'));
    }
}


