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
                    <li class="breadcrumb-item"><a href="{{ url('report') }}">All Report</a></li>
                    <li class="breadcrumb-item" aria-current="page" style="color:green;">Daily Transactions</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <h4>Daily Transactions</h4>
                </div>
                <div class="col-md-6">
                    <div class="float-end mb-2">
                        <a onclick="window.print()" class="btn btn-outline-success"><i class="fa fa-print"></i> Print</a>
                    </div>
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
                    @foreach ($stocks as $value)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>
                                @if ($value->type_transaction == 'IN')
                                    {{ $value->name }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if ($value->type_transaction == 'OUT')
                                    {{ $value->name }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if ($value->type_transaction == 'RETURN')
                                    {{ $value->name }}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection