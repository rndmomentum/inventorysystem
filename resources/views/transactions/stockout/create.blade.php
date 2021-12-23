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
                    <li class="breadcrumb-item" aria-current="page">Stock Out</li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
        </div>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Successful!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sorry!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="col-md-12 mt-3">
            <h4>List Stock In</h4>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="float-end mb-3">
                        <a href="{{ url('transaction/stockout/list') }}" class="btn btn-outline-danger"><i class="fas fa-list-alt"></i> See List</a>
                    </div>
                </div>
            </div>
            <form action="{{ url('transaction/stockout/search') }}" method="GET">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" name="track" placeholder="exp. MW-2021-11-10-0" required>
                        <button class="btn btn-outline-danger" type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <th>#</th>
                        <th >Name</th>
                        <th>Total Stock</th>
                        <th>Minimum Stock</th>
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
                                <td>            
                                    <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{ $value->tracking_id }}"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="edit{{ $value->tracking_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Stock Quantity</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ url('transaction/stockout/store') }}/{{ $value->tracking_id }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" placeholder="Enter Total Stock Out" name="total_stock" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required>
                                                            <small class="text-danger">Please note, cannot be more than <b>{{ $value->total_stock }}</b></small>
                                                        </div>
                                                        <div class="mb-3">
                                                            <select class="form-select" name="status" required>
                                                                <option value="">-- Choose Status --</option>
                                                                <option value="prepare">Prepare</option>
                                                                <option value="being_used">Being Used</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Purpose (Optional)</label>
                                                            <textarea class="form-control" name="purpose" placeholder="Add your purpose here" rows="3"></textarea>
                                                        </div>
                                                    </div>
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