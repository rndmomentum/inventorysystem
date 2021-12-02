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
                    <li class="breadcrumb-item" aria-current="page">Information</li>
                    <li class="breadcrumb-item" aria-current="page">Suppliers</li>
                    <li class="breadcrumb-item"><a class="text-decoration-none text-danger" href="{{ url('information/suppliers/create') }}">...</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 mt-3">
            <h4>List Suppliers</h4>
            <hr>
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('danger'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ url('information/location/search') }}" method="GET">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" placeholder="exp. rumah bujang" required>
                        <button class="btn btn-outline-danger" type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Information Type</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($information as $value)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->location_details }}</td>
                                <td>{{ $value->information_type }}</td> 
                                <td>            
                                    <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#remove{{ $value->information_id }}"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="remove{{ $value->information_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Remove Item</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure to remove from suppliers?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                        <form action="{{ url('information/destroy') }}/{{ $value->information_id }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Yes</button>
                                        </form>
                                    </div>
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