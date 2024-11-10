@extends('layouts.master')
@section('content')

<!-- Display Success Message -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Transaction</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Transaction Table -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Transaction List</h3>
            <a href="{{ route('transactions.create') }}" class="btn btn-primary btn-sm float-right">Add New Transaction</a>
          </div>

          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Description</th>
                  <th>Type</th>
                  <th>Amount</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($transactions as $transaction)
                <tr>
                  <td>{{ $transaction->id }}</td>
                  <td>{{ $transaction->description }}</td>
                  <td>
                    <span class="badge {{ $transaction->type == 'income' ? 'bg-success' : 'bg-danger' }}">
                      {{ ucfirst($transaction->type) }}
                    </span>
                  </td>
                  <td>{{ number_format($transaction->amount, 2) }}</td>
                  <td>{{ \Carbon\Carbon::parse($transaction->date)->format('d-m-Y') }}</td>
                </tr>
                @endforeach

                @if ($transactions->isEmpty())
                <tr>
                  <td colspan="5" class="text-center">No transactions found</td>
                </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
@endsection
