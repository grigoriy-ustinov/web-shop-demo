@extends('layouts.main')

@section('content')
<div class="row">
    @foreach($items as $key => $value)
        <div class="col-md-4">
            <div class="well well-sm">
                <h5>{{$value->name}}</h5>
                <p>{{$value->description}}</p>
                <p>{{$value->price}}</p>
                <a href="{{ url('/addToCart/'.$value->id) }}" class="btn btn-default">Add to bucket</a>
            </div>
        </div>
    @endforeach
</div>
@endsection()