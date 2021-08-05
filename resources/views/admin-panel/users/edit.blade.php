@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('users.index') }}" class="mr-3">Users</a>
        <a href="{{ route('products.index') }}">Products</a>
        <br><br>
        @if ($errors->has('name') || $errors->has('address'))
            <div class="alert alert-danger">
                <ul>
                    @if($errors->has('name'))
                        <li>{{ $errors->first('name') }}</li>
                    @endif
                    @if($errors->has('address'))
                        <li>{{ $errors->first('address') }}</li>
                    @endif

                </ul>
            </div>
        @endif
        <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST">
            @csrf
            <div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="address">{{ $user->address }}</textarea>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-warning pull-right">Edit</button>
            </div>
        </form>
    </div>
@endsection