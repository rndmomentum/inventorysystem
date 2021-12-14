@extends('layouts.app')

@section('css')
<style>
    .border-20{
        padding: 10px;
        border-radius: 25px;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none text-danger" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">Transaction</li>
                    <li class="breadcrumb-item" aria-current="page">Stock In</li>
                    <li class="breadcrumb-item"><a class="text-decoration-none text-danger" href="{{ url('transaction/stockin/create') }}">...</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Report</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 mt-3">
            <h4>Report Stock In</h4>
            <hr>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Total Stock</th>
                        <th>Last Update</th>
                    </thead>
                    <tbody>
                        @foreach ($stock_in_report as $value)
                            @foreach ($transaction_in as $in)
                                @if ($value->tracking_id == $in->tracking_id)
                                    <tr>
                                        <td>{{ $value->tracking_id }}</td>
                                        <td>{{ $in->name }}</td>
                                        <td>{{ $value->total_stock }}</td>
                                        <td>{{ Carbon\Carbon::parse($value->updated_at)->toDateString() }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    
@endsection