@extends('layouts.main')

@section('title', 'Cadastrar')

@section('content')

    <fieldset>
        @if (session('mensagem1'))
            <script>alert('{{ session('mensagem1') }}')</script>
        @endif

        <legend>Cadastro</legend>
        <h4>Cadastrar novo produto</h4>
        <form id="form" action="/produtos" method="POST">
            @csrf
            <label for="codigo">Codigo</label>
            <input name="codigo" type="text" placeholder="Codigo do produto" maxlength="30">
            <label for="descricao">Descricao</label>
            <input name="descricao" placeholder="Descrição do produto" maxlength="60">
            <input id="enviar" type="submit" value="Enviar">
        </form>
    </fieldset>

@endsection