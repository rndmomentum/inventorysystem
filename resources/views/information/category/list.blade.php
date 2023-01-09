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
                    <li class="breadcrumb-item" aria-current="page" style="color:green;">List Category</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 mt-3">
            <h4>List Category</h4>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="float-end mb-3">
                        <a href="{{ url('information/category/create') }}" class="btn btn-outline-success"><i class="fas fa-plus"></i> Create Category</a>
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
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ url('information/category/search') }}" method="GET">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" placeholder="exp. buku" required>
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Short Code</th>
                        <th>Information Type</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($information as $value)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->short_code }}</td>
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
                                        Are you sure to remove from category?
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