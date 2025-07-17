@extends('layouts.main')

@section('title', 'Editando: '. $event->title)

@section('content')

<link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css" rel="stylesheet">

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>{{ $event->title }}</h1>
  <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class="image-wrapper">
                <img
                    src="{{ asset('img/events/' . $event->image) }}"
                    alt="{{ $event->title }}"
                    class="event-image"
                    id="imagemProduto"
                >

                <input
                    type="file"
                    name="image"
                    id="image"
                    accept="image/*"
                    style="display: none"
                    onchange="handleImageChange(event)"
                >

                <div class="image-overlay" onclick="document.getElementById('image').click()">
                    <span class="mdi mdi-tools" style="font-size: 30px;"></span>
                    <span class="overlay-text">Alterar imagem</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento" value="{{ $event->title }}" required>
        </div>
        <div class="form-group">
            <label for="date">Data do evento:</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ date('Y-m-d', strtotime($event->date)) }}" required>
        </div>
        <div class="form-group">
            <label for="title">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento" value="{{ $event->city }}" required>
        </div>
        <div class="form-group">
            <label for="title">O evento é privado?</label>
            <select name="private" id="private" class="form-control" required>
                <option value="0">Não</option>
                <option value="1" {{ $event->private == 1 ? "selected='selected'" : "" }}>Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Descrição:</label>
            <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?" required>{{ $event->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="title">Adicione itens de infraestrutura:</label>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Palco"> Palco
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Open drink"> Open drink
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Open food"> Open food
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Brindes"> Brindes
            </div>
        </div>
        <div class="d-flex mt-3">
            <input type="submit" class="btn btn-primary ms-auto" value="Salvar">
        </div>
    </form>
</div>


@endsection

<script>

function handleImageChange(event) {
    const input = event.target;
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('imagemProduto').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

<style>

.image-wrapper {
    position: relative;
    width: fit-content;
    display: inline-block;
}

.event-image {
    display: block;
    width: 300px; 
    transition: filter 0.5s ease;
    border-radius: 15px;
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(216, 216, 216, 0.48);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    color: white;
    opacity: 0;
    transition: opacity 0.5s ease;
    cursor: pointer;
    border-radius: 15px;
}

.image-wrapper:hover .event-image {
    filter: blur(2px);
}

.image-wrapper:hover .image-overlay {
    opacity: 1;
}

.overlay-icon {
    font-size: 2rem;
    margin-bottom: 10px;
}

.overlay-text {
    font-weight: bold;
}

.btn-primary {
    margin: 0px !important;
}

.d-flex {
    justify-content: end;
}
</style>