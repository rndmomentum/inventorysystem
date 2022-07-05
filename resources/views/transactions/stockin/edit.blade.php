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
                    <li class="breadcrumb-item"><a class="text-decoration-none text-danger" href="{{ url('transaction/stockin/list') }}">...</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
        @if($errors->has('image'))
            <div class="col-md-12 mt-3">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Sorry!</strong> Invalid image upload
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <div class="col-md-12 mt-3">
            <h4>Edit Stock In</h4>
            <hr>
            <form action="{{ url('transaction/stockin/update-info') }}/{{ $transaction->tracking_id }}" enctype="multipart/form-data" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" value="{{ $transaction->name }}" placeholder="Enter Name" required>
                            <small class="text-muted">Example : Baju Momentum Edisi Ejen</small>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <select class="form-select" name="category" required>
                            <option value="{{ $category->information_id }}">{{ $category->name }}</option>
                            @foreach ($get_category as $value)
                                <option value="{{ $value->information_id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <select class="form-select" name="location" required>
                            <option value="{{ $location->information_id }}">{{ $location->name }}</option>
                            @foreach ($get_location as $value)
                                <option value="{{ $value->information_id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <select class="form-select" name="suppliers" required>
                            <option value="{{ $suppliers->information_id }}">{{ $suppliers->name }}</option>
                            @foreach ($get_suppliers as $value)
                                <option value="{{ $value->information_id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" name="size" required>
                            <option value="{{ $size->information_id }}">{{ $size->name }}</option>
                            <option value="0">No Size</option>
                            @foreach ($get_size as $value)
                                <option value="{{ $value->information_id }}">{{ $value->name }} - {{ $value->size }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="total_stock" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" value="{{ $transaction->total_stock }}" placeholder="Enter Total Stock" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="minimum_stock" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" value="{{ $transaction->minimum_stock }}" placeholder="Enter Minimum Stock" required>
                        </div>
                    </div>
                    {{-- <div class="col-md-6">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="invoice_id" placeholder="Enter Invoice ID" required>
                        </div>
                    </div> --}}
                    <div class="col-md-6">
                        <label>Upload Invoice (Optional)</label>
                        <div class="mb-3">
                            <input class="form-control" type="file" name="invoice">
                            <small class="text-danger">*Please note, only pdf!</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Upload Stock Image (Optional)</label>
                        <div class="mb-3">
                            <input class="form-control" type="file" name="image">
                            <small class="text-danger">*Please note, only image!</small>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-danger float-end">Add <i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            Preview Image : 
        </div>
        <div class="col-md-4 mt-2">
            @if ($transaction->image == 0)
                <p class="text-danger"><b>No Image</b></p>
            @else
                <img src="{{ asset('images/stockin') }}/{{ $transaction->image }}" class="img-fluid" alt="{{ $transaction->name }}">
            @endif
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
            })
        })()
    </script>
@endsection