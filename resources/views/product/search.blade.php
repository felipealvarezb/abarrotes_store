@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">
    <div class="col-lg-5 mb-5">
        <form method="GET" action="{{ route('product.search') }}" enctype="multipart/form-data" class="d-flex">
            <input class="form-control me-2" name="query" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary" type="submit">{{ __('Search') }}</button>
        </form>
    </div>
</div>

<div class="row">
    @foreach ($viewData["products"] as $product)
        <div class="col-md-4 col-lg-3 mb-2">
            <div class="card">
                <img src="{{ asset('/storage/'.$product->getImage()) }}" class="card-img-top img-card">
                <div class="card-body text-center">
                    <a href="{{ route('product.show', ['id'=> $product->getId()]) }}" class="btn bg-primary text-white">
                        {{ $product->getName() }}</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection