@extends('layouts.dashboard')
@section('content')
    <h1>Crea nuovo Piatto</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="{{route('admin.dishes.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome Piatto</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label for="ingredients" class="form-label">Ingredienti</label>
                <input type="text" class="form-control" id="ingredients" name="ingredients" value="{{ old('ingredients') }}">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}">
            </div>

            <div class="custom-control custom-switch">
                <input class="custom-control-input" type="checkbox" id="available" checked>
                <label class="custom-control-label" for="available">Disponibilità</label>
            </div>

            <div class="mb-3">
                <label for="dish_cover" class="form-label">Immagine</label>
                <input  class="form-control" type="file" id="dish_cover" name="dish_cover">
            </div>
        
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione Piatto</label>
                <textarea class="form-control" id="description" name="description" rows="6">{{ old('description') }}</textarea>
            </div>
            <input class="btn btn-primary" type="submit" value="Crea Piatto">
        </form>

@endsection