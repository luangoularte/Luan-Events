@extends('layouts.main')

@section('title', 'Editando: '. $event->title)

@section('content')

<link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css" rel="stylesheet">

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>{{ $event->title }}</h1>
  @include('events.form')
</div>

@endsection
