@extends('layouts.dashboard')
@section('content')
    @if ($created_message)
        <div class="alert alert-info" role="alert">
            Piatto Creato 
       </div>
    @endif

    @if ($updated_message)
        <div class="alert alert-info" role="alert">
            Piatto Modificato
        </div>
    @endif
    
    <h1>{{$dish->name}}</h1>
    @if ($dish->dish_cover)
        <img class="w-25" src="{{ asset('storage/' . $dish->dish_cover )}}" alt="{{$dish->name}}">
    @endif
        {{-- <h3>Categoria: {{ $dish->category ? $dish->category->name : 'Nessuna' }}</h3> --}}
        {{-- <div>Data creazine: {{$dish->created_at->format('D d-m-Y')}}</div> --}}
        {{-- <div>Ultimo aggiornamento: {{$dish->updated_at->format('D d-m-Y / H.i' )}}</div> --}}
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
        
        <div class="d-flex">
            <a class="btn btn-primary mr-3" href="{{ route('admin.dishes.edit', ['dish' => $dish->id]) }}"> Modifica Piatto</a>
            <input class="btn btn-danger mr-3" type="submit" value="Elimina" onClick="document.getElementById('pop-up').style.display='block'">
        </div>

        <div id="pop-up"  >
            <form action="{{route('admin.dishes.destroy', ['dish' => $dish->id ])}}" method="post">
                @csrf
                @method('DELETE')
                
                <div>
                    <h3>Vuoi davvero eliminare il piatto?</h3>
                </div>

                <div>
                    <button type="button" class="cancelbtn btn btn-primary mr-3" onClick="document.getElementById('pop-up').style.display='none'">Annulla</button>
                    <button type="button submit" class="deletebtn btn btn-danger">Elimina</button>
                </div>

                
            </form>

        </div>
@endsection


<style>
    #pop-up{
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        background-color: lightgray;
        border: 3px solid #ffba00;
        border-radius: 10px;
        padding: 30px;
    }
</style>