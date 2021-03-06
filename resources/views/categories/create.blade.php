@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <h3 class="text-center mt-4">Create new category</h3>
    </div>
    <div class="row col-4 mx-auto">
        <form action="/categories" method="POST" class="mt-4 d-grid gap-2">
            @csrf
            <div class="row">
                <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
            <div class="row">
                <label for="parent_id">Parent category</label>
                <select name="parent_id" class="form-control">
                    <option value=""></option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
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