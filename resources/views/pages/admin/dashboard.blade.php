@extends('layouts.dashboard')

@section('title')
Dashboard Admin
@endsection

@section('body')
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title text-white">Dashboard</h2>
    </div>
    <div class="dashboard-content">
      <div class="row mt-3">
        <div class="col-12 mt-2">
          <h5 class="mb-3 text-white">Transaksi Terakhir</h5>
          @foreach ($transaction_data as $transaction)
          <a href="#" class="card card-list d-block">
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">{{ $transaction->transaction_status ?? '' }}</div>
                <div class="col-md-4">Rp. {{number_format ($transaction->total_cost ?? '') }}</div>
                <div class="col-md-3">{{ $transaction->created_at ?? '' }}</div>
                <div class="col-md-1 d-none d-md-block">
                  <img src="/images/dashboard-arrow-right.svg" alt="" />
                </div>
              </div>
            </div>
          </a>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection