@extends('layouts.app')

@section('css')
    
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none text-danger" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">Report</li>
                    <li class="breadcrumb-item" aria-current="page">Shirt</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 mb-3">
            <h4>Stock In</h4>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Size</th>
                    <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($information as $value)
                        @foreach ($stock_in as $in)
                            @if($value->information_id == $in->size_id)
                                <tr>
                                    <td>{{ $monthly }}</td>
                                    <td>{{ $value->size }}</td>
                                    <td>{{ \App\Models\Transactions::where('type_transaction', 'IN')->where('size_id', $in->size_id)->where('short_code', 'BJ')->whereRaw("(created_at >= ? AND created_at <= ?)", [$from . " 00:00:00", $to . " 23:59:59"])->count() }}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
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
  ['Stock In', {{ $stock_in }}],
  ['Stock Out', {{ $stock_out }}],
  ['Stock Return', {{ $stock_return }}],
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Monthly Transactions', 'width':650, 'height':500};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
@endsection