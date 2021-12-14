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
                                <h4><i class="fas fa-chart-pie"></i> T-Shirt Report</h4>
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
                    <a href="{{ url('transaction/stockin/create') }}" class="text-decoration-none text-dark">
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
                    <a href="{{ url('transaction/stockreturn/create') }}" class="text-decoration-none text-dark">
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
                    <a href="{{ url('information/category/create') }}" class="text-decoration-none text-dark">
                        <div class="card bg-dark text-light border-20">
                            <div class="card-body px-4 py-4">
                                <h4><i class="fas fa-th-list"></i> Category</h4>
                                New category and list category
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mt-2">
                    <a href="{{ url('information/location/create') }}" class="text-decoration-none text-dark">
                        <div class="card bg-dark text-light border-20">
                            <div class="card-body px-4 py-4">
                                <h4><i class="fas fa-location-arrow"></i> Location</h4>
                                New location and list location
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mt-2">
                    <a href="{{ url('information/suppliers/create') }}" class="text-decoration-none text-dark">
                        <div class="card bg-dark text-light border-20">
                            <div class="card-body px-4 py-4">
                                <h4><i class="fas fa-user-tag"></i> Supplier</h4>
                                New supllier and list supplier
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mt-2">
                    <a href="{{ url('information/size/create') }}" class="text-decoration-none text-dark">
                        <div class="card bg-dark text-light border-20">
                            <div class="card-body px-4 py-4">
                                <h4><i class="fas fa-tshirt"></i> Shirt Size</h4>
                                Add size shirt here and list size
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
