@extends('layouts.dashboard')
@section('content')

<h1>Lista Ordini:</h1>

<div class="col-lg-6 col-sm-12">

        <ul>
            @foreach ($orders as $order)
                <div class="mb-4 my-orders">
                    {{$order['name']}} {{$order['lastname']}} <br>
                    {{$order['address']}}
                    {{$order['total_price']}}ì
                    {{$order['email']}}


                    @foreach ($all_dishes_ids as $dish_info)

                        @if($order['id'] == $dish_info['order_id'])

                            @foreach ($dishes as $dish)

                                @if($dish_info['dish_id'] == $dish['id'])
                                    {{$dish['name']}}
                                    {{$dish_info['qty']}}
                                @endif

                            @endforeach


                        @endif

                    @endforeach
                </div>
            @endforeach 
        </ul>

</div>

@endsection