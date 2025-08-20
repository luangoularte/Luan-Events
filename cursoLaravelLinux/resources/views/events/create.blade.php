@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Criar Evento</h1>
  @include('events.form')
</div>

@endsection

