@extends('layouts.dashboard')
@section('content')



<h1 class="mb-4">Benvenuto {{$user->name}}</h1>
<span>DEBUG: {{$user->id}}</span>
<div class="row row-cols-2">
    <div class="col">
        <h2>I miei ordini:</h2>
        <ul>
            @foreach ($orders as $order)
                <div class="mb-4">
                    <div>Cliente: {{$order->name}}</div>
                    <div>Totale: {{$order->total_price}}</div>
                    <a href="#">Dettagli ordine</a>
                </div>
            @endforeach
        </ul>
    </div>
    <div class="col ">
        <div class="card w-50">
            @if ($user->user_cover)
                <img src="{{asset('storage/' . $user->user_cover)}}" alt="Foto profilo">
            @endif
            <div class="card-body">
              <p class="card-text"><b>Indirizzo:</b> {{$user->address}}</p>
              <p class="card-text"><b>Partita IVA:</b> {{$user->VAT_number}}</p>
              <p class="card-text"><b>Email:</b> {{$user->email}}</p>
            </div>
        </div>
    </div>
</div>


@endsection
