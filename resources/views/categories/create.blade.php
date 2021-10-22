@extends('layouts.layout')

@section('content')
<div class="container">
    <form action="/categories" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name">
        <select name="parent_id">
            <option value=""></option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <button>Create</button>
    </form>
</div>
@endsection