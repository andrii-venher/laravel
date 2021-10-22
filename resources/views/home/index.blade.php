@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            {!! $categoryTree !!}
        </div>
        <div class="col">
            <h2>Products</h2>
        </div>
    </div>
</div>
@endsection