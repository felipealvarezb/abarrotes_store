@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')

<div class="row mt-5">
    <div class="mb-5">
        <h3>Los productos más vendidos</h3>
    </div>
    @foreach ($viewData["best_sellers"] as $item)
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card">
            <img src="{{ asset('/storage/'.$item->getProduct()->getImage()) }}" class="card-img-top img-card">
            <div class="card-body text-center">
                <a href="{{ route('product.show', ['id'=> $item->getProduct()->getId()]) }}" class="btn bg-primary text-white">
                    {{ $item->getProduct()->getName() }}</a>
            </div>
            <div class="card-text text-center mb-3">
                <h5>${{ $item->getPrice() }}</h5>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection