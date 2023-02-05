@extends('layouts.app')
@section('content')
    <div class="container mt-5 d-flex flex-column align-items-center">
        @if(session()->has('success'))
            <div class="alert alert-success" id="alert">{{ session()->get('success') }}</div>
        @endif
        <h3>Ajout d'une nouvelle formation <a href="{{ route('formations.index') }}"><i class="fa fa-list"></i></a></h3>
        <form action="{{ route('formations.store') }}" method="post" class="w-50">
            @csrf
            @method("post")
            <div class="form-group mb-4">
                <label>{{ __('Nom') }}:</label>
                <input type="text" name="nom" id="nom" class="form-control mt-2 @error('nom') is-invalid @enderror" value="{{ old('nom') }}">
                @error('nom')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group mb-4">
                <label>{{ __('Description') }}:</label>
                <textarea name="description" id="" cols="30" rows="3" class="form-control mt-2 @error('description') is-invalid @enderror">{{ (old('description')) }}</textarea>
                @error('description')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group mb-4">
                <label>{{ __('Durée') }}:</label>
                <input type="number" name="duree" id="duree" class="form-control mt-2 @error('duree') is-invalid @enderror" value="{{ old('duree') }}">
                @error('duree')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group mb-4">
                <label>{{ __('Date de début') }}:</label>
                <input type="date" name="date_debut" id="date_debut" class="form-control mt-2 @error('date_debut') is-invalid @enderror" value="{{ old('date_debut') }}">
                @error('date_debut')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <label class="mb-2" for="referentiel_id">{{ __('Sélectionner un référentiel') }}:</label>
            <select name="referentiel_id" id="referentiel_id" class="form-select mb-5">
                @foreach ($referentiels as $referentiel)
                    <option value="{{ $referentiel->id }}">{{ $referentiel->libelle }}</option>
                @endforeach
            </select>
            <div class="col-xs-12 col-sm-12 col-md-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-outline-success">Créer</button>                               
            </div>     
        </form>
    </div>
@stop
