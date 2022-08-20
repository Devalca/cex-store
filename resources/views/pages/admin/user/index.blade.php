@extends('layouts.dashboard')

@section('title')
User
@endsection

@section('body')
@include('alert')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">
        + Tambah Data
    </a>
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title text-white">Admin</h2>
            <p class="dashboard-subtitle text-white">Semua Admin</p>
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
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Roles</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users->where('roles', 'ADMIN') as $user)
                                        <tr>
                                            <td>{{$users->count() * ($users->currentPage() - 1) + $loop->iteration}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->roles}}</td>
                                            <td>
                                                <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary">Update</a>
                                               @if (Auth::user()->email == $user->email)
                                               
                                               @else
                                               <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                </form>
                                               @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$users->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="dashboard-heading">
                <h2 class="dashboard-title text-white">User</h2>
                <p class="dashboard-subtitle text-white">Semua User</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Roles</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users->where('roles', 'USER') as $user)
                                        <tr>
                                            <td>{{$users->count() * ($users->currentPage() - 1) + $loop->iteration}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->roles}}</td>
                                            <td>
                                                <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary">Update</a>
                                                <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$users->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection