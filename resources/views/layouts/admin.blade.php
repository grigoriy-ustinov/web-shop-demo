@extends('layouts.main')

@section('content')
@guest
    <li><a href="{{ route('login') }}">Login</a></li>
    <li><a href="{{ route('register') }}">Register</a></li>
@else
    <div class="panel panel-default">
        <div class="panel-heading">Dashboard
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">Logout</a> 
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ url('/items') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="form-group">
                    <label for="itemName" class="col-md-4 control-label">Item name</label>
                    <div class="col-md-6">
                        <input id="itemName" type="text" class="form-control" name="name" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="col-md-4 control-label">Description</label>
                    <div class="col-md-6">
                        <textarea class="form-control" rows="5" id="description" name="description" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="price" class="col-md-4 control-label">Price</label>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input id="price" type="number" class="form-control" name="price" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Add
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
    @foreach($items as $key => $value)
      <tr>
        <td class="col-sm-1">{{$value->name}}</td>
        <td class="col-sm-8">{{$value->description}}</td>
        <td class="col-sm-0.5">{{$value->price}}</td>
        <th class="col-sm-0.5"><a href="{{ url('/delete/'.$value->id) }}"><span class="glyphicon glyphicon-trash"></span></a></th>
      </tr>
      @endforeach
    </tbody>
  </table>   
  <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
@endguest
@endsection()