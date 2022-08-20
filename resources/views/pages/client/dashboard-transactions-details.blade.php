@extends('layouts.dashboard')

@section('title')
Dashboard Transaction Detail
@endsection

@section('body')
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    @foreach ($transaction as $transactions)
    <div class="dashboard-heading">
      <h2 class="dashboard-title text-white">#{{ $transactions->code }}</h2>
    </div>
    <div class="dashboard-content" id="transactionDetails">
      <div class="row">
        <div class="col-12">
          <div class="card bg-light mb-3">
            <div class="card-header">Detail Transaksi</div>
            <div class="card-body">
              <div class="col-12 col-md-12 col-lg-6">
                <div class="product-title">Nama</div>
                <div class="product-subtitle">{{ $transactions->user->name }}</div>
              </div>
              <hr>
              <div class="col-12 col-md-12 col-lg-6">
                <div class="product-title">Nomor HP</div>
                <div class="product-subtitle">{{ $transactions->user->phone_number }}</div>
              </div>
              <hr>
              <div class="col-12 col-md-12 col-lg-6">
                <div class="product-title">Tanggal Transaksi</div>
                <div class="product-subtitle">{{ $transactions->created_at }}</div>
              </div>
              <hr>
              <div class="col-12 col-md-12 col-lg-6">
                <div class="product-title">Total Pembayaran</div>
                <div class="product-subtitle">Rp. {{ number_format($transactions->total_cost) }}</div>
              </div>
              <hr>
              <div class="col-12 col-md-12 col-lg-12">
                <div class="product-title">Status Pembayaran</div>
                <div class="product-subtitle text-primary">{{ $transactions->transaction_status }}</div>
              </div>
              <hr>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <div class="row">


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection