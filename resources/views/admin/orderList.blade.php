@extends('layouts.dashboard')
@section('content')

<h1>Lista Ordini:</h1>

<div class="col-lg-6 col-sm-12">
    <ul>
        @foreach ($orders as $order)
            <div class="mb-4 my-orders">
                <div>Cliente: {{$order->name}}</div>
                <div>Totale: {{$order->total_price}}</div>

                @foreach($dishes as $dish)
                    {{-- @if($dish->$order_id == $order->id) --}}
                        {{$dish}}
                    {{-- @endif --}}
                @endforeach

            </div>
        @endforeach
    </ul>
</div>

@endsection