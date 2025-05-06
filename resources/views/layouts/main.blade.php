<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cal+Sans&display=swap" rel="stylesheet">
    <title>@yield('title')</title>
</head>

<body>
    <nav id="navbar">
        <div class="esquerda">
            <a href="/"><img src="/img/logo.png" style="width: 35px; height: 35px;"></a>
            <a id="a_navE" href="/">Menu</a>
        </div>
        <div class="direita">
            <a id="a_nav" href="/produtos/cadastrar">Cadastrar</a>
            <a id="a_nav" href="/produtos/listar">Listar</a>
            <a id="a_nav" href="/produtos/excluir">Excluir</a>
            <a id="a_nav" href="/produtos/editar">Editar</a>
            <a id="a_nav" href="/produtos/restaurar">Restaurar</a>
        </div>
    </nav>
    @yield('content')
</body>

</html>