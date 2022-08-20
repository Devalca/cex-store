@extends('layouts.dashboard')

@section('title')
Games
@endsection

@section('body')
@include('alert')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title text-white">Transaksi</h2>
            <p class="dashboard-subtitle text-white">Semua Transaksi</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> @foreach($games as $game)
                                        <tr>
                                            <td>{{$games->count() * ($games->currentPage() - 1) + $loop->iteration}}</td>
                                            <td>{{$game->name}}</td>
                                            <td>
                                                <a href="{{ route('games.edit', $game)}}" class="btn btn-primary">Update</a>
                                               
                                            </td>
                                            <td>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection