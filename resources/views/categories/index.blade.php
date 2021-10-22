@extends('layouts.layout')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">ParentId</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id ?? 'null' }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->parent_id }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection