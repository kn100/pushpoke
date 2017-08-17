@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h1>You</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-4 poke-monitor">
      <div class="header">
        Pokes recieved
      </div>
      <div class="display pokesRecvd">
        {{$pokesRecvd}}
      </div>
    </div>
    <div class="col-xs-4 poke-monitor">
      <div class="header">
        Pokes sent
      </div>
      <div class="display pokesGiven">
        {{$pokesGiven}}
      </div>
    </div>
    <div class="col-xs-4 poke-monitor">
      <div class="header">
        Total pokes
      </div>
      <div class="display pokeTotal">
        {{$pokesRecvd+$pokesGiven}}
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h1>Poke</h1>
    </div>
  </div>
  <div class="row pokeman">
    <div class="col-xs-12">
      <div class="poke-maker text-right">
        <form method="POST" action="/poke">
        <select class="form-control" name="pokee" id="pokee">
          @foreach ($users as $user)
          <option value="{{$user->id}}">{{$user->name}}</option>
          @endforeach
        </select>
        <br/>
        <div type="submit" id="pokebutton" class="btn btn-danger">POKE!</div>
         {{ csrf_field() }}
      </form>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h1>Poketivity</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 poketivity">
    </div>
  </div>
</div>
<input type="hidden" name="userid" id="userid" value="{{$userid}}"/>
<input type="hidden" name="username" id="username" value="{{ Auth::user()->name }}"/>
@endsection
