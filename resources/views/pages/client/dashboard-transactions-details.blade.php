@extends('layouts.dashboard')

@section('title')
Dashboard Transaction Detail
@endsection

@section('body')
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    @foreach ($transaction as $transactions)
    <div class="dashboard-heading">
      <h2 class="dashboard-title">#{{ $transactions->code }}</h2>
      <p class="dashboard-subtitle">Transactions Details</p>
    </div>
    <div class="dashboard-content" id="transactionDetails">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <div class="row">
                    <div class="col-12 col-md-12 col-lg-6">
                      <div class="product-title">Customer Name</div>
                      <div class="product-subtitle">{{ $transactions->user->name }}</div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-6">
                      <div class="product-title">Mobile</div>
                      <div class="product-subtitle">{{ $transactions->user->phone_number }}</div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-6">
                      <div class="product-title">Date of Transaction</div>
                      <div class="product-subtitle">{{ $transactions->created_at }}</div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-6">
                      <div class="product-title">Total Amount</div>
                      <div class="product-subtitle">Rp. {{ number_format($transactions->total_cost) }}</div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12">
                      <div class="product-title">Payment Status</div>
                      <div class="product-subtitle text-danger">{{ $transactions->transaction_status }}</div>
                    </div>
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