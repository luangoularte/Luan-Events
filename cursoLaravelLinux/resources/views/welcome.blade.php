@extends('layouts.main')

@section('title', 'Luan Events')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Pesquisar evento</h1>
    <form action="/" method="GET" class="form-welcome">
        <input type="text" id="search" name="search" class="form-control" style="border-radius: 10px;" placeholder="Procurar...">
        <input type="submit" class="btn btn-primary" style="padding: 1px 24px;" value="Pesquisar">
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if ($search)
        <h2>Buscando por {{ $search }}</h2>
    @else
        <h2>PRÓXIMOS EVENTOS</h2>
    @endif
    @if(count($events) != 0)
        <p class="subtitle">Veja os eventos dos próximos dias</p>
    @endif
    <div id="cards-container" class="row">
        @foreach($events as $event)
            <div class="col-md-3 mb-4">
                <div class="event-card-modern">
                    <div class="event-image-modern">
                        <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}">
                    </div>
                    <div class="event-info-modern">
                        <p class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</p>
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-city">{{ $event->city }}</p>
                        <p class="card-participants">
                            {{ count($event->users) }} 
                            {{ count($event->users) == 1 ? 'Participante' : 'Participantes' }}
                        </p>
                        <a href="/events/{{ $event->id }}" class="btn btn-primary mt-3" style="margin: 0px; width: 100%;">Saber mais</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @if(count($events) == 0 && $search)
        <p>Não foi possível encontar nenhum evento com "{{ $search }}". <a href="/">Ver todos</a></p>
    @elseif (count($events) == 0)
        <div style="justify-content: center; text-align: center;">
            <img src="/img/no-events.png" alt="Sem Eventos" style="color: black;">
            <p>NÃO HÁ EVENTOS DISPONÍVEIS</p>
        </div>
    @endif
</div>

@endsection