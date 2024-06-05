@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Uredi projekt</h1>
    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="project_name">Ime projekta</label>
            <input type="text" class="form-control" id="project_name" name="project_name" value="{{ $project->project_name }}" required>
        </div>
        <div class="form-group">
            <label for="project_description">Opis projekta</label>
            <textarea class="form-control" id="project_description" name="project_description">{{ $project->project_description }}</textarea>
        </div>
        <div class="form-group">
            <label for="project_price">Cijena projekta</label>
            <input type="number" class="form-control" id="project_price" name="project_price" value="{{ $project->project_price }}" required>
        </div>
        <div class="form-group">
            <label for="completed_tasks">Obavljeni poslovi</label>
            <textarea class="form-control" id="completed_tasks" name="completed_tasks">{{ $project->completed_tasks }}</textarea>
        </div>
        <div class="form-group">
            <label for="start_date">Datum pocetka</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $project->start_date }}" required>
        </div>
        <div class="form-group">
            <label for="end_date">Datum zavrsetka</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $project->end_date }}">
        </div>
        <div class="form-group">
            <label for="team_members">Članovi tima</label>
            <select multiple class="form-control" id="team_members" name="team_members[]">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $project->users->contains($user) ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Ažuriraj projekt</button>
    </form>
</div>
@endsection
