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
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nome Piatto</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ? old('neme') : $dish->name }}">
            </div>

            <div class="mb-3">
                <label for="ingredients" class="form-label">Ingredienti</label>
                <input type="text" class="form-control" id="ingredients" name="ingredients" value="{{ old('ingredients') ? old('ingredients') : $dish->ingredients }}">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ old('price') ? old('price') : $dish->price }}">
            </div>

            <div class="custom-control custom-switch">
                {{-- <input class="custom-control-input" type="checkbox" id="available" name="available" value=1 {{ old('available', $dish->available )  == $dish->available   ? 'checked' : '' }}> da finire --}}
                <label class="custom-control-label" for="available">Disponibilità</label>
            </div>

            <div class="mb-3">
                <label for="dish_cover" class="form-label">Immagine</label>
                <input  class="form-control" type="file" id="dish_cover" name="dish_cover">
                @if($dish->dish_cover)
                    <div>Immagine attuale:</div>
                    <img class="w-50" src="{{ asset('storage/' . $dish->dish_cover) }}" alt="img-not-found">
                @endif
            </div>
        
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione Piatto</label>
                <textarea class="form-control" id="description" name="description" rows="6">{{ old('description', $dish->description) }}</textarea>
            </div>
            <input class="btn btn-primary" type="submit" value="Crea Piatto">
        </form>

@endsection