@extends('layouts.main')

@section('content')
<table class="table table-hover">
  <thead>
    <tr>
      <th class="col-sm-1">Item name</th>
      <th class="col-sm-6">Description</th>
      <th class="col-sm-1">Price</th>
      <th class="col-sm-1">Remove</th>
    </tr>
  </thead>
  <tbody>
  @if(!empty($items))
    @foreach($items as $item)
      <tr>
        <td class="col-sm-1">{{$item['item']['name']}} <span class="badge">{{$item['qty']}}</span></td>
        <td class="col-sm-8">{{$item['item']['description']}}</td>
        <td class="col-sm-0.5">{{$item['price']}}</td>
        <td class="col-sm-0.5"><a href="{{ url('/removeFromCart/'.$item['item']['id']) }}"><span class="glyphicon glyphicon-trash"></span></a></td>
      </tr>
      @endforeach
      <tr>
      <td class="col-sm-1"></td>
        <td class="col-sm-8"></td>
        <td class="col-sm-0.5">Total price: {{$totalPrice}}</td>
        <td class="col-sm-0.5"></td>
      </tr>
    @endif
  </tbody>
</table>
@endsection()