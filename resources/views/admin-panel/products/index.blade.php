@extends('layouts.app')

@section('content')
    <div class="container">
        <button type="button" class="btn btn-link" onclick="location.href='{{ route('users.index') }}'">Users</button>
        <button type="button" class="btn btn-link" onclick="location.href='{{ route('products.index') }}'">Products</button>
        <button type="button" class="btn btn-link" onclick="location.href='{{ route('product.create') }}'">Create Product</button>
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