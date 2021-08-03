@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">ADDRESS</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->address }}</td>
            </tr>
            </tbody>
        </table><br>
        Products
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">QUANTITY</th>
                <th scope="col">PRICE</th>
                <th scope="col">USER_ID</th>
                <th scope="col">PRODUCT_ID</th>
            </tr>
            </thead>
            <tbody>
            @foreach($user->user_products as $products)
                <tr>
                    <th scope="row">{{ $products->id }}</th>
                    <td>{{ $products->count }}</td>
                    <td>{{ $products->price }}</td>
                    <td>{{ $products->user_id }}</td>
                    <td>{{ $products->product_id }}</td>
                </tr>
            @endforeach
            </tbody>
        </table><br>

    </div>
@endsection
