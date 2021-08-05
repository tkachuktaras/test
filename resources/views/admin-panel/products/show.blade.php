@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('users.index') }}" class="mr-3">Users</a>
        <a href="{{ route('products.index') }}">Products</a>
        <a href="{{ route('product.create') }}" class="float-right">Create Product</a>
        <br><br>
        <h3>Product:</h3>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">DESCRIPTION</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                </tr>
            </tbody>
        </table><br>
        <h3>Options:</h3>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Option Type</th>
                <th scope="col">Option</th>
            </tr>
            </thead>
            <tbody>
            @foreach($product->product_option as $option)
                <tr>
                    <th scope="row">{{ $option->id }}</th>
                    <td>{{ $option->option_type }}</td>
                    <td>{{ $option->option }}</td>
                </tr>
            @endforeach
            </tbody>
        </table><br>
        <h3>Your offers:</h3>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">ADDRESS</th>
                <th scope="col">QUANTITY</th>
                <th scope="col">PRICE</th>
            </tr>
            </thead>
            <tbody>
            @foreach($product->user_product as $user_product)
                @if($user_product->user_id == Auth::user()->id)
                    <tr>
                        <th scope="row">{{ $user_product->id }}</th>
                        <td>{{ $user_product->user->name }}</td>
                        <td>{{ $user_product->user->address }}</td>
                        <td>{{ $user_product->count }}</td>
                        <td>{{ $user_product->price }}</td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
