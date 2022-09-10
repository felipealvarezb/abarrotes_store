@extends('layouts.admin')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ asset('/img/undraw_profile.svg') }}" class="img-fluid rounded-start">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $viewData["supplier"]->getName() }} ({{ $viewData["supplier"]->getNit() }})
                </h5>
                <p class="card-text">Celular: {{ $viewData["supplier"]->getPhone() }}</p>
                <p class="card-text">Correo: {{ $viewData["supplier"]->getEmail() }}</p>
                <p class="card-text">Observaciones: {{ $viewData["supplier"]->getObservation() }}</p>
            </div>
        </div>
    </div>
</div> 
@endsection