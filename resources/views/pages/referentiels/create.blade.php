@extends('layouts.app')
@section('content')
    <div class="container mt-5 d-flex flex-column align-items-center">
        @if(session()->has('success'))
            <div class="alert alert-success" id="alert">{{ session()->get('success') }}</div>
        @endif
        <h3>Ajout d'un nouveau référentiel <a href="{{ route('referentiels.index') }}"><i class="fa fa-list"></i></a></h3>
        <form action="{{ route('referentiels.store') }}" method="post" class="w-50">
            @csrf
            @method("post")
            <div class="form-group mb-5">
                <label>{{ __('Libellé') }}:</label>
                <input type="text" name="libelle" id="libelle" class="form-control mt-2 @error('libelle') is-invalid @enderror" value="{{ old('libelle') }}">
                @error('libelle')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group mb-5">
                <label>{{ __('Horaire') }}:</label>
                <input type="number" name="horaire" id="horaire" class="form-control mt-2 @error('horaire') is-invalid @enderror" value="{{ old('horaire') }}">
                @error('horaire')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <label class="mb-2" for="type_id">{{ __('Sélectionner un type') }}:</label>
            <select name="type_id" id="type_id" class="form-select mb-5">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->libelle }}</option>
                @endforeach
            </select>
            <div class="col-xs-12 col-sm-12 col-md-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-outline-success">Créer</button>                               
            </div>     
        </form>
    </div>
@stop
