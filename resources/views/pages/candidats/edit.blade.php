@extends('layouts.app')
@section('content')
    <h3 class="text-center my-5">
        Modification du candidat
        <a href="{{ route("candidats.index") }}">
            <i class="fa fa-list"></i>
        </a>
    </h3>
    <div class="container mt-5 d-flex flex-column align-items-center">
        @if(session()->has('success'))
            <div class="alert alert-success" id="alert">{{ session()->get('success') }}</div>
        @endif
        <form action="{{ route('candidats.update', $candidat->id) }}" method="post" class="w-50">
            @csrf
            @method("put")
            <div class="form-group mb-3">
                <label>{{ __('Prénom (s)') }}:</label>
                <input type="text" name="prenom" id="prenom" class="form-control mt-1 @error('prenom') is-invalid @enderror" value="{{ $candidat->prenom }}">
                @error('prenom')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group mb-3">
                <label>{{ __('Nom') }}:</label>
                <input type="text" name="nom" id="nom" class="form-control mt-1 @error('nom') is-invalid @enderror" value="{{ $candidat->nom }}">
                @error('nom')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group mb-3">
                <label>{{ __('Email') }}:</label>
                <input type="email" name="email" id="email" class="form-control mt-1 @error('email') is-invalid @enderror" value="{{ $candidat->email }}">
                @error('email')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group mb-3">
                <label>{{ __('Âge') }}:</label>
                <input type="number" name="age" id="age" class="form-control mt-1 @error('age') is-invalid @enderror" value="{{ $candidat->age }}">
                @error('age')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group mb-3">
                <label>{{ __('Niveau d\'étude') }}:</label>
                <input type="text" name="niveau_etude" id="niveau_etude" class="form-control mt-1 @error('niveau_etude') is-invalid @enderror" value="{{ $candidat->niveau_etude }}">
                @error('niveau_etude')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <label class="mb-2" for="sexe">{{ __('Sélectionner le sexe') }}:</label>
            <select name="sexe" id="sexe" class="form-select mb-3">
                <option value="masculin" @if ($candidat->sexe == "masculin") selected @endif>Masculin</option>
                <option value="feminin"@if ($candidat->sexe == "feminin") selected @endif>Féminin</option>
            </select>
            <label class="mb-2" for="formation_id">{{ __('Sélectionner une formation') }}:</label>
            <select name="formation_id" id="formation_id" class="form-select mb-3">
                @foreach ($formations as $formation)
                    <option value="{{ $formation->id }}">{{ $formation->nom }}</option>
                @endforeach
            </select>
            <div class="col-xs-12 col-sm-12 col-md-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-outline-success">Modifier</button>                               
            </div>     
        </form>
    </div>
@stop
