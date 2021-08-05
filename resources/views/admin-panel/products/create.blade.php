@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('users.index') }}" class="mr-3">Users</a>
        <a href="{{ route('products.index') }}">Products</a>
        <br><br>
        @if ($errors->has('name') || $errors->has('description'))
            <div class="alert alert-danger">
                <ul>
                    @if($errors->has('name'))
                        <li>{{ $errors->first('name') }}</li>
                    @endif
                    @if($errors->has('description'))
                        <li>{{ $errors->first('description') }}</li>
                    @endif
                </ul>
            </div>
        @endif
        <form action="{{ route('product.store') }}" method="post">
            @csrf
            <div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" placeholder="Description" name="description"></textarea>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-warning pull-right">Create</button>
            </div>
        </form>
    </div>
@endsection