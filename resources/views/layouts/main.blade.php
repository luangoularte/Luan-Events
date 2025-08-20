    
    
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <link rel="stylesheet" href="/css/styles.css">

        <link rel="icon" type="image/png" href="/img/favicon.ico">

        <script src="../../../public/js/script.js"></script>
        <title>@yield('title')</title>
    </head>
    <body>
        <header>
            <nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-white">
                <div class="container">
                    <a href="/" class="navbar-brand">
                        <img src="/img/logo-event-sem-fundo.png" alt="Luan Events">
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                </div>
                <div class="collapse navbar-collapse pr-3" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="/" class="nav-link">Eventos</a></li>
                        <li class="nav-item"><a href="/events/create" class="nav-link">Criar Eventos</a></li>

                        @auth
                            <li class="nav-item"><a href="/dashboard" class="nav-link">Meus eventos</a></li>
                            <li class="nav-item">
                                <form action="/logout" method="post" class="form-inline m-0 p-0">
                                    @csrf
                                    <a href="/logout" class="nav-link"
                                    onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>
                                </form>
                            </li>
                        @endauth

                        @guest
                            <li class="nav-item"><a href="/login" class="nav-link">Entrar</a></li>
                            <li class="nav-item"><a href="/register" class="nav-link">Cadastrar</a></li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>
        <main>
            <div class="container-fluid">
                <div class="row">
                    @if(session('msg'))
                        <p class="msg">{{ session('msg') }}</p>
                    @elseif(session('alert'))
                        <p class="msg-alert">{{ session('alert') }}</p>
                    @endif
                    @yield('content')
                </div>
            </div>
        </main>
        <footer>
            <p>Luan Events &copy; 2024</p>
        </footer>
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    </body>
</html>
    
    
    
   