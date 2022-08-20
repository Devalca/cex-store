@extends('layouts.dashboard')

@section('title')
Update Game
@endsection

@section('body')
    @include('alert')
    <div class="card">
        <div class="card-header">Edit Games</div>
        <div class="card-body">
            <form enctype="multipart/form-data" action="{{ route('games.edit', $game) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" value="{{ $game->name }}" id="name" class="form-control">
                    @error('name')
                    <div class="mt-2 text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                 <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="number" name="price" value="{{ $game->price }}" id="price" class="form-control">
                    @error('price')
                    <div class="mt-2 text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <input type="text" name="description" value="{{ $game->description }}" id="description" class="form-control">
                    @error('description')
                    <div class="mt-2 text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="categories">Kategori</label>
                    <input type="text" name="categories"  value="{{ $game->categories }}" id="categories" class="form-control">
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
