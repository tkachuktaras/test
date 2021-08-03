@extends('layouts.app')

@section('content')
    <div class="container">
        <button type="button" class="btn btn-link" onclick="location.href='{{ route('users.index') }}'">Users</button>
        <button type="button" class="btn btn-link" onclick="location.href='{{ route('products.index') }}'">Products</button>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">ADDRESS</th>
                <th scope="col">ACTIONS</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->address }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" onclick="location.href='{{ route('user.show', $user->id) }}'">Show</button>
                        <button type="button" class="btn btn-secondary" onclick="location.href='{{ route('user.edit', $user->id) }}'">Edit</button>
                        <form action="{{ route('user.destroy', $user->id) }}" method="post" style="display: inline;">
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