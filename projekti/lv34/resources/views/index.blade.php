@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Projects</h1>
    <a href="{{ route('projects.create') }}" class="btn btn-primary">Kreiraj novi projekt</a>
    <ul>
        @foreach ($projects as $project)
            <li>
                <a href="{{ route('projects.show', $project->id) }}">{{ $project->project_name }}</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
