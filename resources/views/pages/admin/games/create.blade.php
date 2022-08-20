@extends('layouts.dashboard')

@section('title')
Add Game
@endsection

@section('body')
    @include('alert')
    <div class="card">
        <div class="card-header">Games</div>
        <div class="card-body">
            <form enctype="multipart/form-data" action="{{route('games.create')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" class="form-control">
                    @error('name')
                    <div class="mt-2 text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                 <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="number" name="price" id="price" class="form-control">
                    @error('price')
                    <div class="mt-2 text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <input type="text" name="description" id="description" class="form-control">
                    @error('description')
                    <div class="mt-2 text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="categories">Kategori</label>
                    <input type="text" name="categories" id="categories" class="form-control">
                    @error('categories')
                    <div class="mt-2 text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group py-3">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" id="photo" class="form-control-file">
                    @error('photo')
                    <div class="mt-2 text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
