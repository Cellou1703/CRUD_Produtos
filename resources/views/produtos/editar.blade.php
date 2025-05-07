@extends('layouts.main')

@section('title', 'Editar')

@section('content')

    @if (session('mensagem1'))
        <script>alert('{{ session('mensagem1') }}')</script>
    @elseif (session('mensagem2'))
        <script>alert('{{ session('mensagem2') }}')</script>
    @elseif (session('mensagem3'))
        <script>alert('{{ session('mensagem3') }}')</script>
    @elseif (session('mensagem4'))
        <script>alert('{{ session('mensagem4') }}')</script>
    @endif

    <fieldset>
        <legend>Edição</legend>
        <h4>Editar produtos existentes</h4>
        <form id="form" action="/produtos" method="POST">
            @csrf
            @method('PUT')
            <label for="id">ID</label>
            <input name="id" value="{{ request('id') }}" type="text" placeholder="ID do produto">
            <label for="codigo">Codigo</label>
            <input name="codigo" type="text" placeholder="Codigo do produto" maxlength="30">
            <label for="descricao">Descricao</label>
            <input name="descricao" type="text" placeholder="Descrição do produto" maxlength="60">
            <input id="enviar" type="submit" value="Enviar">
        </form>
    </fieldset>

@endsection