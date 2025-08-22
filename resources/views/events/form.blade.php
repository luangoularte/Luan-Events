
<link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css" rel="stylesheet">

<form action="{{ isset($event) ? "/events/update/" . $event->id : '/events' }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($event))
        @method('PUT')
    @endif
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <div class="image-wrapper">
                    <img
                        src="{{ isset($event) ? asset("img/events/" . $event->image) : asset('img/logo-events.png') }}"
                        alt="{{ isset($event) ? $event->title : 'Imagem do Evento'}}"
                        class="event-image"
                        id="imagemProduto"
                        style="width: 100%; height: auto;"
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
        </div>
        <div class="col-md-7">
            <div class="form-group">
                <label for="title">Evento:</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="title" 
                    name="title" 
                    placeholder="Nome do evento" 
                    value="{{ old('title', $event->title ?? '') }}" 
                    required
                >
            </div>
            <div class="form-group pt-2">
                <label for="date">Data do evento:</label>
                <input 
                    type="date" 
                    class="form-control" 
                    id="date" name="date" 
                    value="{{ 
                        old('date', isset($event) ? 
                        date('Y-m-d', strtotime($event->date)) : '') 
                    }}" 
                    required>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="title">Cidade:</label>
        <input 
            type="text" 
            class="form-control" 
            id="city" 
            name="city" 
            placeholder="Local do evento" 
            value="{{ old('city', $event->city ?? '') }}" 
            required
        >
    </div>
    <div class="form-group">
        <label for="title">O evento é privado?</label>
        <select name="private" id="private" class="form-control">
            <option 
                value="0" 
                {{ old('private', $event->private ?? '') == '0' ? 'selected' : '' }}
            >
                Não
            </option>
            <option 
                value="1" 
                {{ old('private', $event->private ?? '') == '1' ? 'selected' : '' }}
            >
                Sim
            </option>
        </select>
    </div>
    <div class="form-group">
        <label for="title">Descrição:</label>
        <textarea 
            name="description" 
            id="description" 
            class="form-control" 
            placeholder="O que vai acontecer no evento?" 
            required
            style="height: 10vh;"
        >
            {{ old('description', $event->description ?? '') }}
        </textarea>
    </div>
    <div class="form-group">
        <label for="title">Adicione itens de infraestrutura:</label>
        @php
            $infraestruturas = ['Cadeiras', 'Palco', 'Open drink', 'Open food', 'Brindes'];
            $selecionados = old('items', $event->items ?? []);
        @endphp

        @foreach ($infraestruturas as $item)
            <div class="form-group">
                <input type="checkbox" name="items[]" value="{{ $item }}"
                {{ in_array($item, $selecionados) ? 'checked' : '' }}>
                {{ $item }}
            </div>
        @endforeach
    </div>
    <div class="d-flex">
        <input type="submit" class="btn btn-primary" value="{{ isset($event) ? 'Salvar' : 'Criar Evento' }}">
    </div>
</form>

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