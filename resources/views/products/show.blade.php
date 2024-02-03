@extends('layouts.app')

@section('title','Show Page')

@section('content')

    <h1>Show Page</h1>

    <div class="col-md-12">
        <ul class="list-group">
            <li class="list-group-item">Country Name = {{$product->name}}</li>
            <li class="list-group-item">Capital Name = {{$product->capital}}</li>
            <li class="list-group-item">Currency Unit = {{$product->currency}}</li>
            <li class="list-group-item">Content = {{$product->content}}</li>
        </ul>

        <a href="{{route('products.index')}}" class="btn btn-secondary btn-sm rounded mt-3">Back</a>
    </div>

@endsection

