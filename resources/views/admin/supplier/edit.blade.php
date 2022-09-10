@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
    <div class="card-header"> 
        Edit supplier
    </div>
    <div class="card-body">
        @if($errors->any())
            <ul class="alert alert-danger list-unstyled">
                @foreach($errors->all() as $error) 
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form method="POST" action="{{ route('admin.supplier.update', ['id'=> $viewData['supplier']->getId()]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-3 col-md-6 col-sm-12 col-form-label">Name:</label>
                        <div class="col-lg-8 col-md-6 col-sm-12">
                            <input name="name" value="{{ $viewData['supplier']->getName() }}" type="text"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-3 col-md-6 col-sm-12 col-form-label">NIT:</label>
                        <div class="col-lg-8 col-md-6 col-sm-12">
                            <input name="nit" value="{{ $viewData['supplier']->getNit() }}" type="text"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-3 col-md-6 col-sm-12 col-form-label">Phone:</label>
                        <div class="col-lg-8 col-md-6 col-sm-12">
                            <input name="phone" value="{{ $viewData['supplier']->getPhone() }}" type="text"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-3 col-md-6 col-sm-12 col-form-label">Email:</label>
                        <div class="col-lg-8 col-md-6 col-sm-12">
                            <input name="email" value="{{ $viewData['supplier']->getEmail() }}" type="email"
                                class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Observations</label> 
                <textarea class="form-control" name="observation" 
                    rows="3">{{ $viewData['supplier']->getObservation() }}</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
</div> @endsection