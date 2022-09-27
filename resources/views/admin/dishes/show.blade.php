@extends('layouts.dashboard')
@section('content')
    {{-- {{dd($dish)}} --}}
    <h1>{{$dish->name}}</h1>
    @if ($dish->dish_cover)
        <img class="w-50" src="{{ asset('storage/' . $dish->dish_cover )}}" alt="$dish->name">
    @endif
        <h3>Categoria: {{ $dish->category ? $dish->category->name : 'Nessuna' }}</h3>
        <div>Data creazine: {{$dish->created_at->format('D d-m-Y')}}</div>
        <div>Ultimo aggiornamento: {{$dish->updated_at->format('D d-m-Y / H.i' )}}</div>
        {{-- <div>Slug: {{$dish->slug}}</div> --}}
        <h2>Ingredienti:</h2>
        <p>{{$dish->ingredients}}</p>

        <h2>Prezzo</h2>
        <div>{{$dish->price}}€</div>

        @if ($dish->available)
            <h2>Disponibile</h2>
        @else
            <h2>Non Disponibile</h2>
        @endif
        

        <h3>Descrizione:</h3>
        <p>{{$dish->description}}</p>
        
        {{-- <div class="d-flex">
            <a class="btn btn-primary mr-3" href="{{ route('admin.dishs.edit', ['dish' => $dish->id]) }}"> Modifica dish</a>

            <form action="{{route('admin.dishs.destroy', ['dish' => $dish->id ])}}" method="post">
                @csrf
                @method('DELETE')
                <input class="btn btn-danger mr-3" type="submit" value="Elimina" onClick="return confirm('Sicuro di cancellare il dish');">
            </form>

        </div> --}}
@endsection