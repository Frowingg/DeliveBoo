@extends('layouts.dashboard')
@section('content')


<h1>Tutti i Piatti</h1>
@if ($deleted_message)
    <div class="alert alert-info" role="alert">
        Piatto eliminato corretamente
    </div>   
@endif

    <div class="row row-cols-3 ">
        @foreach ($dishes as $dish)
        {{-- start card  --}}
        <div class="col mt-3">
            <div class="card">
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                <div class="card-body">
                  <h4 class="card-title">{{$dish->name}}</h4>
                  <h5>Ingredienti: {{$dish->ingredients}}</h5>
                  {{-- @if ($dish->updated_days_ago > 0)
                  <div> Aggiornato: {{$dish->updated_days_ago}} giorn{{$dish->updated_days_ago > 1 ? 'i' : 'o' }} fa</div>
                  @endif --}}
                  
                  <a href="{{ route('admin.dishes.show', ['dish' => $dish->id]) }}" class="btn btn-primary mt-1">Vedi Prodotto</a>
                </div>
            </div>
        </div> 
        {{--end card  --}}
        @endforeach    
    </div>  

    <div class="mt-3">
        {{ $dishes->links() }}
    </div>
@endsection
