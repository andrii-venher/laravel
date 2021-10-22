@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <h3 class="text-center mt-4">Create new product</h3>
    </div>
    <div class="row col-4 mx-auto">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="mt-4 d-grid gap-2">
            @csrf
            <div class="row ">
                <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
            <div class="row">
                <input type="text" name="sku" class="form-control" placeholder="SKU" required>
            </div>
            <div class="row">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="row">
                <label for="category_id">Category</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row mt-2">
                <button class="btn btn-success">Create</button>
            </div>
        </form>
    </div>
    <div class="row col-4 mx-auto mt-3">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
@endsection