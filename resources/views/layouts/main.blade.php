<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>@yield('title')</title>
</head>

<body>
    <nav>
        <a href="/">Menu</a>
        <a href="/produtos/cadastrar">Cadastrar</a>
        <a href="/produtos/listar">Listar</a>
        <a href="/produtos/excluir">Excluir</a>
        <a href="/produtos/editar">Editar</a>
        <a href="/produtos/restaurar">Restaurar</a>
    </nav>
    @yield('content')
</body>

</html>