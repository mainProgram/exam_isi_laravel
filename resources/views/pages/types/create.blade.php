@extends('layouts.app')
@section('content')
    <div class="container mt-5 d-flex flex-column align-items-center">
        @if(session()->has('success'))
            <div class="alert alert-success" id="alert">{{ session()->get('success') }}</div>
        @endif
        <h3>Ajout d'un nouveau type <a href="{{ route('types.index') }}"><i class="fa fa-list"></i></a></h3>
        <form action="{{ route('types.store') }}" method="post" class="w-50">
            @csrf
            @method("post")
            <div class="form-group mb-5">
                <label>{{ __('Libellé') }}:</label>
                <input type="text" name="libelle" id="libelle" class="form-control mt-2 @error('libelle') is-invalid @enderror" value="{{ old('libelle') }}">
                @error('libelle')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-outline-success">Créer</button>                               
            </div>     
        </form>
    </div>
@stop
