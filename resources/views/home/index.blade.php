@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')

<div class="row">
    <div class="col text-center">
        <div class="carousel slide" id="mi-carousel" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3000">
                    <div class="carousel-caption">
                        <button class="btn btn-dark">Comprar Ahora</button>
                    </div>
                    <img src="{{ asset('/img/cereales.png') }}" class="img-fluid rounded" alt="">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <div class="carousel-caption">
                        <button class="btn btn-dark">Comprar Ahora</button>
                    </div>
                    <img src="{{ asset('/img/legumbres.jpg') }}" class="img-fluid rounded" alt="">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <div class="carousel-caption">
                        <button class="btn btn-dark">Comprar Ahora</button>
                    </div>
                    <img src="{{ asset('/img/proteinas.jpg') }}" class="img-fluid rounded" alt="">
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#mi-carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#mi-carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>

                <div class="carousel-indicators">
                    <button 
                        class="active" 
                        type="button" 
                        data-bs-target="#mi-carousel" 
                        data-bs-slide-to="0"
                        aria-label="Slide 1"
                    ></button>

                    <button 
                        class="" 
                        type="button" 
                        data-bs-target="#mi-carousel" 
                        data-bs-slide-to="1"
                        aria-label="Slide 2"
                    ></button>

                    <button 
                        class="" 
                        type="button" 
                        data-bs-target="#mi-carousel" 
                        data-bs-slide-to="2"
                        aria-label="Slide 3 "
                    ></button>
                </div>

            </div>
        </div>
    </div>
</div>



<div class="row mt-5">
    <div class="mb-5">
        <h3>Los productos más vendidos</h3>
    </div>
    @foreach ($viewData["best_sellers"] as $item)
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card">
            <img src="{{ asset('/storage/'.$item->getProduct()->getImage()) }}" class="card-img-top img-card">
            <div class="card-body text-center">
                <a href="{{ route('product.show', ['id'=> $item->getProduct()->getId()]) }}"
                    class="btn bg-primary text-white">
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