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
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page" style="color:green;">List Stock In</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 mt-3">
            <h4>List Stock In</h4>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="float-end mb-3">
                        <a href="{{ url('transaction/stockin/create') }}" class="btn btn-outline-success"><i class="fas fa-plus"></i> Create Stock In</a>
                        <a href="{{ url('transaction/stockin/report') }}" class="btn btn-outline-danger"><i class="far fa-flag"></i> Report</a>
                    </div>
                </div>
            </div>
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Sorry! </strong>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ url('transaction/stockin/search') }}" method="GET">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" name="track" placeholder="Search name here" required>
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </form>

            {{-- Filter Date --}}
            <form action="{{ url('transaction/stockin/filter') }}" method="GET">
                <div class="row">
                    <div class="col-md-5">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="from" placeholder="exp. 2021-01-01" required>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="to" placeholder="exp. 2021-01-31" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary float-end"><i class="fas fa-filter"></i> Filter</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Total Stock</th>
                        <th>Minimum Stock</th>
                        <th>Last Update</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($stock_in as $value)
                            <tr>
                                <td>{{ $value->tracking_id }}</td>
                                <td>{{ $value->name }}</td>
                                <td>
                                    @if($value->total_stock <= $value->minimum_stock)
                                        <span class="text-danger fw-bold">{{ $value->total_stock }}</span>
                                    @else
                                        {{ $value->total_stock }}
                                    @endif
                                </td>
                                <td>{{ $value->minimum_stock }}</td> 
                                <td>{{ Carbon\Carbon::parse($value->updated_at)->toDateString() }}</td>
                                <td>     
                                    <a href="{{ url('transaction/stockin/edit') }}/{{ $value->tracking_id }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>       
                                    <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#update{{ $value->tracking_id }}"><i class="fas fa-plus"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#remove{{ $value->tracking_id }}"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <!-- Remove stock in -->
                            <div class="modal fade" id="remove{{ $value->tracking_id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Remove Item</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure to remove from stock in?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                        <form action="{{ url('transaction/destroy') }}/{{ $value->tracking_id }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Yes</button>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Edit stock in -->
                            <div class="modal fade" id="update{{ $value->tracking_id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Total Stock</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ url('transaction/stockin/update') }}/{{ $value->tracking_id }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <input type="text" class="form-control" name="total_stock" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" placeholder="New Total Stock" required>
                                            </div>
                                            <div class="mb-3">
                                                <textarea class="form-control" name="notes" placeholder="Notes Here" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>                          
                                            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Update</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
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