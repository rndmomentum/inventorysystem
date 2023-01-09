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
        @if($transactions_low->isEmpty())

        @else
            <div class="col-md-12 mb-3">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><i class="fas fa-exclamation-triangle"></i> Please Check Your Stock!</strong> Your stock has reached the minimum amount, please place an order immediately!
                    <br><br>
                    <a href="{{ url('transaction/stockin/list') }}" class="btn btn-warning btn-sm">Check Now <i class="fas fa-arrow-right"></i></a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <div class="col-md-12 mb-3">
            <h4>Reports</h4>
            <hr>
            <div class="row">
                <div class="col-md-4 mt-2">
                    <a href="{{ url('report') }}" class="text-decoration-none text-dark">
                        <div class="card bg-dark text-light border-20">
                            <div class="card-body px-4 py-4">
                                <h4><i class="fas fa-chart-pie"></i> Stock Report</h4>
                                Report will be show in Pie Chart.
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mt-2">
                    <a href="{{ url('report/shirt') }}" class="text-decoration-none text-dark">
                        <div class="card bg-dark text-light border-20">
                            <div class="card-body px-4 py-4">
                                <h4><i class="fas fa-clipboard-list"></i> T-Shirt Report</h4>
                                Display T-Shirt report only with Pie Chart.
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-12 mb-3">
            <h4>Transactions</h4>
            <hr>
            <div class="row">
                <div class="col-md-4 mt-2">
                    <a href="{{ url('transaction/stockin/list') }}" class="text-decoration-none text-dark">
                        <div class="card bg-dark text-light border-20">
                            <div class="card-body px-4 py-4">
                                <h4><i class="fas fa-sign-in-alt"></i> Stock In</h4>
                                New stock come from vendor
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mt-2">
                    <a href="{{ url('transaction/stockout/create') }}" class="text-decoration-none text-dark">
                        <div class="card bg-dark text-light border-20">
                            <div class="card-body px-4 py-4">
                                <h4><i class="fas fa-sign-out-alt"></i> Stock Out</h4>
                                Stock out from inventory
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mt-2">
                    <a href="{{ url('transaction/stockreturn/list') }}" class="text-decoration-none text-dark">
                        <div class="card bg-dark text-light border-20">
                            <div class="card-body px-4 py-4">
                                <h4><i class="fas fa-exchange-alt"></i> Stock Return</h4>
                                Stock return to inventory
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <h4>Information</h4>
            <hr>
            <div class="row">
                <div class="col-md-4 mt-2">
                    <a href="{{ url('information/category/list') }}" class="text-decoration-none text-dark">
                        <div class="card bg-dark text-light border-20">
                            <div class="card-body px-4 py-4">
                                <h4><i class="fas fa-th-list"></i> Category</h4>
                                New category and list category
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mt-2">
                    <a href="{{ url('information/location/list') }}" class="text-decoration-none text-dark">
                        <div class="card bg-dark text-light border-20">
                            <div class="card-body px-4 py-4">
                                <h4><i class="fas fa-location-arrow"></i> Location</h4>
                                New location and list location
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mt-2">
                    <a href="{{ url('information/suppliers/list') }}" class="text-decoration-none text-dark">
                        <div class="card bg-dark text-light border-20">
                            <div class="card-body px-4 py-4">
                                <h4><i class="fas fa-user-tag"></i> Supplier</h4>
                                New supllier and list supplier
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mt-2">
                    <a href="{{ url('information/size/list') }}" class="text-decoration-none text-dark">
                        <div class="card bg-dark text-light border-20">
                            <div class="card-body px-4 py-4">
                                <h4><i class="fa fa-archive"></i> Size Item</h4>
                                Add size item here and list size
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    
@endsection
