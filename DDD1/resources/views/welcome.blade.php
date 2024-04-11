<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>
</head>
<body>
    @if($errors->any())
    <ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
    @endif
    <div>
        <form method="post" action="{{ url('/task' }}">
            <input type="text" name="task" id="task" placeholder="Nome da Tarefa">
            <input type="text" name="category" id="category" placeholder="Nome da category">
            <button type="submit">Salvar</button>
        </form>

    </div>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @foreach($tasks as $task)
        <p style= "text-decoration: {{ $task->status }}">
            {{ $task->task }}
        </p>

    @endforeach
</body>
</html>