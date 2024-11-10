@extends('layouts.master')
@section('content')

<!-- Include jQuery and Chart.js -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/chart.min.js') }}"></script>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
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
    <div class="row">
      <div class="col-md-6">
        <!-- LINE CHART -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Income vs Expenses (Line Chart)</h3>
          </div>
          <div class="card-body">
            <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <!-- BAR CHART -->
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Monthly Income & Expenses (Bar Chart)</h3>
          </div>
          <div class="card-body">
            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <!-- PIE CHART -->
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">Total Income vs Expenses (Pie Chart)</h3>
          </div>
          <div class="card-body">
            <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>

<script>
  $(function () {
    // Prepare data for charts
    const months = @json($months);
    const monthlyIncome = @json($monthlyIncome);
    const monthlyExpenses = @json($monthlyExpenses);
    const totalIncome = @json($totalIncome);
    const totalExpenses = @json($totalExpenses);

    // Line Chart
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d');
    var lineChartData = {
      labels: months,
      datasets: [
        {
          label: 'Income',
          backgroundColor: 'rgba(60,141,188,0.2)',
          borderColor: 'rgba(60,141,188,1)',
          data: monthlyIncome,
          fill: true
        },
        {
          label: 'Expenses',
          backgroundColor: 'rgba(255,99,132,0.2)',
          borderColor: 'rgba(255,99,132,1)',
          data: monthlyExpenses,
          fill: true
        }
      ]
    };
    var lineChartOptions = { responsive: true, maintainAspectRatio: false };
    new Chart(lineChartCanvas, { type: 'line', data: lineChartData, options: lineChartOptions });

    // Bar Chart
    var barChartCanvas = $('#barChart').get(0).getContext('2d');
    var barChartData = {
      labels: months,
      datasets: [
        {
          label: 'Income',
          backgroundColor: 'rgba(60,141,188,0.9)',
          data: monthlyIncome
        },
        {
          label: 'Expenses',
          backgroundColor: 'rgba(255,99,132,0.9)',
          data: monthlyExpenses
        }
      ]
    };
    var barChartOptions = { responsive: true, maintainAspectRatio: false };
    new Chart(barChartCanvas, { type: 'bar', data: barChartData, options: barChartOptions });

    // Pie Chart
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
    var pieData = {
      labels: ['Total Income', 'Total Expenses'],
      datasets: [
        {
          data: [totalIncome, totalExpenses],
          backgroundColor: ['#3c8dbc', '#f56954']
        }
      ]
    };
    var pieOptions = { responsive: true, maintainAspectRatio: false };
    new Chart(pieChartCanvas, { type: 'pie', data: pieData, options: pieOptions });
  });
</script>

@endsection
