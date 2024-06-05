@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $project->ime_projekta }}</h1>
    <p>{{ $project->opis_projekta }}</p>
    <p><strong>Cijena:</strong> {{ $project->cijena_projekta }}</p>
    <p><strong>Obavljeni posao:</strong> {{ $project->obavljeni_poslovi }}</p>
    <p><strong>Datum pocetka:</strong> {{ $project->datum_pocetka }}</p>
    <p><strong>Datum zavrsetka:</strong> {{ $project->datum_zavrsetka }}</p>
    <h3>Članovi tima</h3>
    <ul>
        @foreach ($project->users as $user)
            <li>{{ $user->ime }}</li>
        @endforeach
    </ul>
    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary">Uredi Projekt</a>
    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Izbriši Projekt</button>
    </form>
</div>
@endsection
