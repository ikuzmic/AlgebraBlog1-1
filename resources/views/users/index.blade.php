@extends('layouts.master')

@section('content')

    <div class="mb-4">
        <a href="{{ route('users.create') }}" class="btn btn-primary">Dodaj novog korisnika</a>
    </div>

    @if($users->count())
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th>{{ $user->id }}</th>
                <td><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">Uredi</a>
                        <button class="btn btn-sm btn-danger">Obriši</button>
                    </form>                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

@endsection