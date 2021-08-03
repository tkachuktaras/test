@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <form action="{{ route('product.update', ['id' => $product->id]) }}" method="POST">
            @csrf
            <div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description">{{ $product->description }}</textarea>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-warning pull-right">Edit</button>
            </div>
        </form>
        <form action="{{ route('user-product.update')}}" method="POST">
            @csrf
            <div>
                <input type="hidden" class="form-control" name="id" value="{{ $product->id }}">

                <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" class="form-control" name="count" value="">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" name="price" value="">
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-warning pull-right">Add</button>
            </div>
        </form>

    </div>
@endsection