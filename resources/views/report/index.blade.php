@extends('layouts.app')

@section('css')
    
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page" style="color:green;">All Report</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-3">

        </div>
        <div class="col-md-5">
            <div id="piechart"></div>
        </div>
        <div class="col-md-4">

        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <h4>Daily Transactions</h4>
                </div>
                <div class="col-md-6">
                    <small class="float-end"><a href="{{ url('report/details/daily') }}" class="text-primary text-decoration-none"> See Details</a></small>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <hr>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Stock In</th>
                    <th scope="col">Stock Out</th>
                    <th scope="col">Stock Return</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $daily }}</td>
                        <td>{{ $stock_in_date + $stock_in_report_daily }}</td>
                        <td>{{ $stock_out_date }}</td>
                        <td>{{ $stock_return_date }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-md-12 mt-4">
            <div class="row">
                <div class="col-md-6">
                    <h4>Monthly Transactions</h4>
                </div>
                <div class="col-md-6">
                    <small class="float-end"><a href="{{ url('report/details/monthly') }}" class="text-primary text-decoration-none"> See Details</a></small>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <hr>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Stock In</th>
                    <th scope="col">Stock Out</th>
                    <th scope="col">Stock Return</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $monthly }}</td>
                        <td>{{ $stock_in + $stock_in_report_monthly }}</td>
                        <td>{{ $stock_out }}</td>
                        <td>{{ $stock_return }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['Stock In', {{ $stock_in + $stock_in_report_daily }}],
  ['Stock Out', {{ $stock_out }}],
  ['Stock Return', {{ $stock_return }}],
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Monthly Transactions', 'width':750, 'height':500};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
@endsection