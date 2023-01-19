@extends('layouts.main')

@section('page-content')
<div class="container">
    <a href="{{ route('pastas.index') }}">Torna alla lista</a>
    <h1>{{$pasta->title}}</h1>
    <p>{!! $pasta->description !!}</p>
</div>
@endsection