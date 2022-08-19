@extends('layouts.dashboard')

@section('title')
Transaction
@endsection

@section('body')
<!-- Section Content-->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Transaksi</h2>
            <p class="dashboard-subtitle">Semua Transaksi</p>
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
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Tanggal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> @foreach($transactions as $transaction)
                                        <tr>
                                            <td>{{$transactions->count() * ($transactions->currentPage() - 1) + $loop->iteration}}</td>
                                            <td>{{$users->where('id', $transaction->users_id)->first()->name}}</td>
                                            <td>{{$transaction->total_cost}}</td>
                                            <td>{{$transaction->transaction_status}}</td>
                                            <td>{{$transaction->created_at}}</td>
                                            <td>
                                                <a href="{{ route('transaction.edit', $transaction->id)}}" class="btn btn-primary">Update</a>
                                                <form action="{{route('transaction.destroy', $transaction->id)}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$transactions->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection