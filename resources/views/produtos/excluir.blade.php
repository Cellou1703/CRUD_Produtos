@extends('layouts.main')

@section('title', 'Excluir')

@section('content')

    @if (session('mensagem1'))
        <script>alert('{{ session('mensagem1') }}')</script>
    @elseif(session('mensagem2'))
        <script>alert('{{ session('mensagem2') }}')</script>
    @endif

    <fieldset>
        <legend>Exclusão</legend>
        <h4>Excluir produto existente</h4>
        <form id="form" action="/produtos" method="POST">
            @csrf
            @method('DELETE')
            <label for="id">ID</label>
            <input name="id" type="text" placeholder="ID do produto">
            <input id="enviar" type="submit" value="Enviar">
        </form>

    </fieldset>

@endsection