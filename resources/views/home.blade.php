@extends('layouts.app')

@section('content')
@include('alert')
<div class="page-content page-home">
  <section class="store-new-products mt-2">
    <div class="container">
      <div class="row">
        <div class="col-12" data-aos="fade-up">
          <h5>Semua Game</h5>
        </div>
      </div>
      <div class="card feature-card card-title p-3">
        <div class="row">
          @php $incrementGame = 0 @endphp
          @forelse ($games as $game)
          <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $incrementGame+= 100 }}">
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row no-gutters">
                <div class="col-md-12">
                  <a href="{{ route('detail', $game->id) }}">
                    <img style="object-fit: center; height: 200px;" src="/storage/{{$game->photo}}" class="card-img" alt="...">
                  </a>
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">{{ $game->name }}</h5>
                    <p class="card-text"><small class="text-muted">Rp. {{number_format ($game->price) }}</small></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{$games->links()}}
          @empty
          <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
            No Products Found
          </div>
          @endforelse
        </div>
      </div>
    </div>
  </section>
</div>
@endsection