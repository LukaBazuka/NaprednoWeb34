@extends('layouts.app')

@section('content')
    <h1>{{ $user->name }}'s Profil</h1>
    <h2>Moji projekti</h2>
    <ul>
        @foreach ($projects as $project)
            <li><a href="{{ route('projects.show', $project) }}">{{ $project->name }}</a></li>
        @endforeach
    </ul>
    <h2>Projekti u kojima sudjelujem</h2>
    <ul>
        @foreach ($teamProjects as $project)
            <li><a href="{{ route('projects.show', $project) }}">{{ $project->name }}</a></li>
        @endforeach
    </ul>
@endsection
