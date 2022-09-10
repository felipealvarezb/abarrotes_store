@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')

<div class="card mb-4">
    <div class="card-header">
        Create Suppliers
    </div>
    <div class="card-body">
        @if($errors->any())
        <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
            <li>- {{ $error }}</li>
            @endforeach
        </ul>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('admin.supplier.create') }}">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Name:</label>
                        <div class="col-lg-8 col-md-6 col-sm-12">
                            <input name="name" value="{{ old('name') }}" type="text" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">NIT:</label>
                        <div class="col-lg-8 col-md-6 col-sm-12">
                            <input name="nit" value="{{ old('nit') }}" type="text" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Phone:</label>
                        <div class="col-lg-8 col-md-6 col-sm-12">
                            <input name="phone" value="{{ old('phone') }}" type="text" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-4 col-md-6 col-sm-12 col-form-label">Email:</label>
                        <div class="col-lg-8 col-md-6 col-sm-12">
                            <input name="email" value="{{ old('email') }}" type="email" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Observations</label>
                <textarea class="form-control" name="observation" rows="3">{{ old('observation') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header"> Manage Suppliers
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData["suppliers"] as $supplier)
                <tr>
                    <td>{{ $supplier->getId() }}</td>
                    <td>
                        <a href="{{ route('admin.supplier.show', ['id'=> $supplier->getId()]) }}"
                            class="btn btn-link">{{ $supplier->getName() }}</a>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{route('admin.supplier.edit', ['id'=> $supplier->getId()])}}">
                            <i class="bi-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('admin.supplier.delete', $supplier->getId())}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">
                                <i class="bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection