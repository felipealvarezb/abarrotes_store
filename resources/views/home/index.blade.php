@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="row">
    <div class="col-md-6 col-lg-4 mb-2">
        <h3>Bienvenido a nuestra tienda de abarrotes para ir la sección del admin haga click 
            <a class="btn btn-link" href="{{ route('admin.home.index') }}">aquí</a></h3>
    </div>
    
</div> 
@endsection