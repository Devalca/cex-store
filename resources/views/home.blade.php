@extends('layouts.app')

@section('content')
@include('alert')
<section class="pricing_part padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_tittle text-center">
                    <h2>Semua Game</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
        @php $incrementGame = 0 @endphp
          @forelse ($games as $game)
            <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $incrementGame+= 100 }}">
            <div class="card.bg-transparent mb-3" style="max-width: 540px;">
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
          @empty
          <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
            No Products Found
          </div>
          @endforelse
        </div>
        {{$games->links()}}
    </div>
</section>

@endsection