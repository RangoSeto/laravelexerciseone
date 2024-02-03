@extends('layouts.app')

@section('title','Show Page')

@section('content')

    <h1>Show Page</h1>

    <div class="col-md-12">
        <ul class="list-group">
            <li class="list-group-item">Country Name = {{$country->name}}</li>
            <li class="list-group-item">Capital Name = {{$country->capital}}</li>
            <li class="list-group-item">Currency Unit = {{$country->currency}}</li>
            <li class="list-group-item">Content = {{$country->content}}</li>
        </ul>

        <a href="{{route('countries.index')}}" class="btn btn-secondary btn-sm rounded mt-3">Back</a>
    </div>

@endsection

