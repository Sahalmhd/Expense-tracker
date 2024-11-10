@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">New Transaction</h1>
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
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Add New Transaction</h3>
          </div>
          <form method="POST" action="{{ route('transactions.store') }}">
            @csrf
            <div class="card-body">
              <!-- Description Field -->
              <div class="form-group">
                <label for="transactionDescription">Description</label>
                <input type="text" class="form-control" id="transactionDescription" name="description" placeholder="Enter transaction description" required>
              </div>

              <!-- Type Selection -->
              <div class="form-group">
                <label>Type</label>
                <div class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
                  <label class="btn btn-outline-success btn-sm flex-fill">
                    <input type="radio" name="type" value="income" autocomplete="off" required> Income
                  </label>
                  <label class="btn btn-outline-danger btn-sm flex-fill">
                    <input type="radio" name="type" value="expense" autocomplete="off" required> Expense
                  </label>
                </div>
              </div>

              <!-- Destination Selection -->
              <div class="form-group">
                <label>Destination</label>
                <div class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
                  <label class="btn btn-outline-primary btn-sm flex-fill">
                    <input type="radio" name="destination" value="bank" autocomplete="off" required> Bank
                  </label>
                  <label class="btn btn-outline-secondary btn-sm flex-fill">
                    <input type="radio" name="destination" value="cash" autocomplete="off" required> Cash
                  </label>
                </div>
              </div>

              <!-- Amount Field -->
              <div class="form-group">
                <label for="transactionAmount">Amount</label>
                <input type="number" class="form-control" id="transactionAmount" name="amount" placeholder="Enter amount" required>
              </div>

              <!-- Date Field -->
              <div class="form-group">
                <label for="transactionDate">Date</label>
                <input type="date" class="form-control" id="transactionDate" name="date" required>
              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Add Transaction</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
<style>
  .btn-group-toggle .btn {
    margin: 0.25rem;
    font-size: 0.875rem; /* Smaller font size */
    padding: 0.375rem 0.75rem; /* Adjust padding to make buttons more compact */
  }
  .card-title {
    font-weight: 600;
  }
</style>

@endsection
