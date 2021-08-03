@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
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