@extends('layouts.dashboard')
@section('content')

<h1>Lista Ordini:</h1>

<div class="col-lg-6 col-sm-12">
    <ul>
        @foreach ($orders as $order)
            <li>
                {{$order['name']}} {{$order['email']}}:

            </li>

            @foreach ($all_dishes_ids as $dish_info)

                @if($order['id'] == $dish_info['order_id'])

                    <ul>
                        <li>

                            @foreach ($dishes as $dish)

                                @if($dish_info['dish_id'] == $dish['id'])
                                    {{$dish['name']}}

                                    {{$dish_info['qty']}}
                                @endif

                            @endforeach

                        </li>
                    </ul>

                @endif

            @endforeach
        @endforeach
    </ul>
</div>

@endsection