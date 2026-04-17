@extends('layouts.app')

@section('title','Services')

@section('content')

<h1>Nos services</h1>

@foreach($services as $service)

<div style="background:#f5f5f5;padding:20px;margin-bottom:10px">

<h3>{{ $service['nom'] }}</h3>

<p>Prix : {{ $service['prix'] }}</p>

</div>


@endforeach

@endsection
