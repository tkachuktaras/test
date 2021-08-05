@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('users.index') }}" class="mr-3">Users</a>
        <a href="{{ route('products.index') }}">Products</a>
        <a href="{{ route('product.create') }}" class="float-right">Create Product</a>
        <br><br>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">DESCRIPTION</th>
                <th scope="col">ACTIONS</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" onclick="location.href='{{ route('product.show', $product->id) }}'">Show</button>
                        <button type="button" class="btn btn-secondary" onclick="location.href='{{ route('product.edit', $product->id) }}'">Edit</button>
                        <form action="{{ route('product.destroy', $product->id) }}" method="post" style="display: inline;">
                            @csrf
                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
@endsection