@extends('layouts.app')

@section('content')
    <h1>Create Project</h1>
    <form method="POST" action="{{ route('projects.store') }}">
        @csrf
        <label>Ime projekta:</label>
        <input type="text" name="name">
        <label>Opis:</label>
        <textarea name="description"></textarea>
        <label>Cijena:</label>
        <input type="text" name="price">
        <label>Datum početka:</label>
        <input type="date" name="start_date">
        <label>Datum završetka:</label>
        <input type="date" name="end_date">
        <label>Članovi tima:</label>
        <select name="team_members[]" multiple>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        <button type="submit">Spremi</button>
    </form>
@endsection
