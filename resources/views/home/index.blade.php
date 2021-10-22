@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <h2>Categories</h2>
            {!! $categoryTree !!}
        </div>
        <div class="col-6">
            <h2>Products</h2>
            <div class="row">
                @foreach($products as $product)
                <div class="col-4">
                    <div class="card border-dark">
                        <div class="card-header">
                        <img src="/storage/images/{{ $product->image }}" class="card-img-top">
                        </div>
                        <div class="card-body text-dark">
                            <h4 class="card-title ">{{ $product->name }}</h4>
                            <h5 class="card-subtitle mb-2 text-muted">{{ $product->category->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $product->sku }}</h6>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection