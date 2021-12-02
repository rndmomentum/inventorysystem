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
                    <li class="breadcrumb-item" aria-current="page">Stock Return</li>
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
        @if($errors->has('image'))
            <div class="col-md-12 mt-3">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Sorry!</strong> Invalid image upload
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <div class="col-md-12 mt-3">
            <h4>Stock Return</h4>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="float-end mb-3">
                        <a href="{{ url('transaction/stockreturn/list') }}" class="btn btn-outline-danger"><i class="fas fa-list-alt"></i> See List</a>
                    </div>
                </div>
            </div>
            <form action="{{ url('transaction/stockreturn/store') }}" enctype="multipart/form-data" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
                            <small class="text-muted">Example : Baju Momentum Edisi Ejen</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <textarea class="form-control" name="purpose" placeholder="Add purpose return here (optional)" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <select class="form-select" name="category" required>
                            <option value="">-- Choose Category --</option>
                            @foreach ($category as $value)
                                <option value="{{ $value->information_id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <select class="form-select" name="size" required>
                            <option value="">-- Choose Size --</option>
                            <option value="0">No Size</option>
                            @foreach ($size as $value)
                                <option value="{{ $value->information_id }}">{{ $value->name }} - {{ $value->size }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="col-md-4">
                        <select class="form-select" name="location" required>
                            <option value="">-- Choose Location --</option>
                            @foreach ($location as $value)
                                <option value="{{ $value->information_id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select" name="suppliers" required>
                            <option value="">-- Choose Suppliers --</option>
                            @foreach ($suppliers as $value)
                                <option value="{{ $value->information_id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="col-md-6">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="total_stock" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" placeholder="Enter Total Stock" required>
                        </div>
                    </div>
                    {{-- <div class="col-md-6">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="minimum_stock" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" placeholder="Enter Minimum Stock" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="invoice_id" placeholder="Enter Invoice ID" required>
                        </div>
                    </div> --}}
                    <div class="col-md-6">
                        <div class="mb-3">
                            <input class="form-control" type="file" name="image" required>
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