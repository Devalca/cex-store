@extends('layouts.dashboard')

@section('body')
    @include('alert')
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($games as $game)
            <tr>
                <td>{{$games->count() * ($games->currentPage() - 1) + $loop->iteration}}</td>
                <td>{{$game->name}}</td>
                <td>
                    <a href="{{ route('games.edit', $game)}}" class="btn btn-primary">Update</a>
                    <form action="{{ route('games.destroy', $game->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$games->links()}}
@endsection
