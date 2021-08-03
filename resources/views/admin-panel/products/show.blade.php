@extends('layouts.app')

@section('content')
    <div class="container">
        Product
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

        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">QUANTITY</th>
                <th scope="col">PRICE</th>
            </tr>
            </thead>
            <tbody>
            @foreach($product->user_product as $user_product)
                <tr>
                    <th scope="row">{{ $user_product->id }}</th>
                    <td>{{ $user_product->count }}</td>
                    <td>{{ $user_product->price }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
