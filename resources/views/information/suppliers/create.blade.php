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
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
        </div>
        @if(session('success'))
            <div class="col-md-12 mt-3">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Successful!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <div class="col-md-12 mt-3">
            <h4>Create Suppliers</h4>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="float-end mb-3">
                        <a href="{{ url('information/suppliers/list') }}" class="btn btn-outline-danger"><i class="fas fa-list-alt"></i> See List</a>
                    </div>
                </div>
            </div>
            <form action="{{ url('information/suppliers/store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
                            <small class="text-muted">Example : Momentum Internet Sdb Bhd</small>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <textarea class="form-control" name="location_details" placeholder="Location Details" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <button class="btn btn-danger float-end">Add <i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
    
@endsection