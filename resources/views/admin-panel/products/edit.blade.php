@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('users.index') }}" class="mr-3">Users</a>
        <a href="{{ route('products.index') }}">Products</a>
        <a href="{{ route('product.create') }}" class="float-right">Create Product</a>
        <br><br>
        <h3>Product:</h3>
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
        <br>
        <hr class="big-hr">
        <br>
        <h3>Add product's options:</h3>
        @if ($errors->has('option_type') || $errors->has('option'))
            <div class="alert alert-danger">
                <ul>
                    @if($errors->has('option_type'))
                        <li>{{ $errors->first('option_type') }}</li>
                    @endif
                    @if($errors->has('option'))
                        <li>{{ $errors->first('option') }}</li>
                    @endif

                </ul>
            </div>
        @endif
        <form action="{{ route('product-option.add')}}" method="POST">
            @csrf
            <div>
                <input type="hidden" class="form-control" name="product_id" value="{{ $product->id }}">

                <div class="form-group">
                    <label>Option Type</label>
                    <input type="text" class="form-control" name="option_type" value="">
                </div>
                <div class="form-group">
                    <label>Option</label>
                    <input type="text" class="form-control" name="option" value="">
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-warning pull-right">Add</button>
            </div>
        </form>
        <hr>
        <h3>Options:</h3>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Option Type</th>
                <th scope="col">Option</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($product->product_option as $option)
                <tr>
                    <th scope="row">{{ $option->id }}</th>
                    <td>{{ $option->option_type }}</td>
                    <td>{{ $option->option }}</td>
                    <td>
                        <form action="{{ route('product-option.destroy', $option->id) }}" method="post" style="display: inline;">
                            @csrf
                            <input type="hidden" class="form-control" name="product_id" value="{{ $product->id }}">
                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br>
        <hr class="big-hr">
        <br>
        <h3>Add supplier's products:</h3>
        @if ($errors->has('count') || $errors->has('price'))
            <div class="alert alert-danger">
                <ul>
                    @if($errors->has('count'))
                        <li>{{ $errors->first('count') }}</li>
                    @endif
                    @if($errors->has('price'))
                        <li>{{ $errors->first('price') }}</li>
                    @endif

                </ul>
            </div>
        @endif
        <form action="{{ route('user-product.add')}}" method="POST">
            @csrf
            <div>
                <input type="hidden" class="form-control" name="id" value="{{ $product->id }}">

                <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" class="form-control" name="count" @if($disabled == true) disabled @endif value="">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" name="price" @if($disabled == true) disabled @endif value="">
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-warning pull-right"  @if($disabled == true) disabled @endif>Add</button>
            </div>
        </form>
        <hr>
        <h3>My offers:</h3>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Actions</th>
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
                    <td>
                        <form action="{{ route('user-product.destroy', $user_product->id) }}" method="post" style="display: inline;">
                            @csrf
                            <input type="hidden" class="form-control" name="product_id" value="{{ $product->id }}">
                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>

    </div>
@endsection