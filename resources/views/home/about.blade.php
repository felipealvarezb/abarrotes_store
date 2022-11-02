@extends('layouts.app') 
@section('title', $viewData["title"]) 
@section('subtitle', __('About us')) 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4 ms-auto">
            <p class="lead">{{ __('This is an about page ...') }}</p>
        </div>
        <div class="col-lg-4 me-auto">
            <p class="lead">{{ __('Developed by: Team 3') }}</p>
        </div>
    </div>
</div> 
@endsection