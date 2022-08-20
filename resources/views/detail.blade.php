@extends('layouts.detail')

@section('content')
@include('alert')
<div class="container">
    <div class="row justify-content-center" style="padding-top: 100px;">
        <div class="col-md-8">
            <a href="{{ url('/') }}" class="btn btn-danger" style="margin-bottom:10px">Kembali</a>
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">{{ $game->name }}</div>
                <div class="card-body">
                    <div class="col-md-12 py-3">
                        <img style="object-fit: none; height: 200px;" src="/storage/{{$game->photo}}" class="card-img" alt="...">
                    </div>
                    <h5 class="card-title" style="color: gray;">{{$game->categories}}</h5>
                    <p class="card-text" style="color: gray;">{{$game->description}}</p>
                    <hr>
                    <p class="text-primary">Silahkan Lengkepai Data Untuk Melakukan Topup</p>
                    <form enctype="multipart/form-data" action="{{ route('checkout') }}" method="post">
                    @csrf
                        <input type="hidden" name="total_cost" value="{{ $game->price }}">
                        <input type="hidden" name="products_id" value="{{ $game->id }}">
                        <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nickname">Nickname</label>
                                    <input type="text" class="form-control" id="nickname" name="nickname" />
                                    @error('nickname')
                                    <div class="mt-2 text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="game_id">ID Game</label>
                                    <input type="text" class="form-control" id="game_id" name="game_id" />
                                    @error('game_id')
                                    <div class="mt-2 text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="server_id">Server Game</label>
                                    <input type="text" class="form-control" id="server_id" name="server_id" />
                                    @error('server_id')
                                    <div class="mt-2 text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="phone_number">Nomor HP</label>
                                    <input type="number" class="form-control" id="phone_number" name="phone_number" />
                                    @error('phone_number')
                                    <div class="mt-2 text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12 py-3">
                            <p class="mb-2" style="color: gray;">Informasi Pembayaran</p>
                            <p class="card-text"><small class="text-muted">Rp. {{number_format ($game->price) }}</small></p>
                        </div>
                        <button type="submit" class="btn btn-primary">Topup</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection