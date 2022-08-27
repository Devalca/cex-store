@extends('layouts.dashboard')

@section('title')
Update Transaction
@endsection

@section('body')
    <!-- Section Content-->
          <div class="section-content section-dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title text-white">Transaksi</h2>
                <p class="dashboard-subtitle text-white">Update Transaksi</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('transaction.edit', $item->id) }}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="transaction_status" class="form-control">
                                                    @if ($item->transaction_status == 'SUCCESS')
                                                    <option selected disabled value="{{ $item->transaction_status }}">{{ $item->transaction_status }}</option>
                                                    @elseif ($item->transaction_status == 'PENDING')
                                                    <option selected disabled value="{{ $item->transaction_status }}"> Status Saat INI : {{ $item->transaction_status }}</option>
                                                    <option value="SUCCESS">SUCCESS</option>
                                                    @else
                                                    <option selected disabled value="{{ $item->transaction_status }}"> Status Saat INI : {{ $item->transaction_status }}</option>
                                                    <option value="SUCCESS">SUCCESS</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Harga</label>
                                                <input type="number" name="total_cost" class="form-control" value="{{ $item->total_cost }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($item->transaction_status == 'PAID' || $item->transaction_status == 'PENDING')
                                    <div class="row py-3">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-primary px-5">
                                                Process
                                            </button>
                                        </div>
                                    </div>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
@endsection

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
            CKEDITOR.replace( 'editor' );
    </script>
@endpush