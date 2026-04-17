@extends('layouts.app')

@section('title','Contact')

@section('content')

<h1>Contactez-nous</h1>

<p>Email : {{ $contacts['email'] }}</p>

<p>Téléphone : {{ $contacts['telephone'] }}</p>

<p>Adresse : {{ $contacts['adresse'] }}</p>

@endsection
