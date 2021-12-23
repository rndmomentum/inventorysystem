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
        {{-- <div class="col-md-12 mb-3">
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
        </div> --}}
        <div class="col-md-12 mb-3">
            <h4>Daily Transactions ( {{ date('d-m-Y') }} )</h4>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Size</th>
                    <th>Stock In</th>
                    <th>Stock Out</th>
                    <th>Stock Return</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>XS</td>
                        <td>{{ $stock_in_xs }}</td>
                        <td>{{ $stock_out_xs }}</td>
                        <td>{{ $stock_return_xs }}</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>S</td>
                        <td>{{ $stock_in_s }}</td>
                        <td>{{ $stock_out_s }}</td>
                        <td>{{ $stock_return_s }}</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>M</td>
                        <td>{{ $stock_in_m }}</td>
                        <td>{{ $stock_out_m }}</td>
                        <td>{{ $stock_return_m }}</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>L</td>
                        <td>{{ $stock_in_l }}</td>
                        <td>{{ $stock_out_l }}</td>
                        <td>{{ $stock_return_l }}</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>XL</td>
                        <td>{{ $stock_in_xl }}</td>
                        <td>{{ $stock_out_xl }}</td>
                        <td>{{ $stock_return_xl }}</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>2XL</td>
                        <td>{{ $stock_in_2xl }}</td>
                        <td>{{ $stock_out_2xl }}</td>
                        <td>{{ $stock_return_2xl }}</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>3XL</td>
                        <td>{{ $stock_in_3xl }}</td>
                        <td>{{ $stock_out_3xl }}</td>
                        <td>{{ $stock_return_3xl }}</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>4XL</td>
                        <td>{{ $stock_in_4xl }}</td>
                        <td>{{ $stock_out_4xl }}</td>
                        <td>{{ $stock_return_4xl }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection