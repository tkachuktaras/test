@extends('layouts.app')

@section('content')
    <br>
    <div class="container">

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