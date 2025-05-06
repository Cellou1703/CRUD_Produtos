@extends('layouts.main')

@section('title', 'Restaurar')

@section('content')

    @if (session('mensagem1'))
        <script>alert('{{ session('mensagem1') }}')</script>
    @elseif(session('mensagem2'))
        <script>alert('{{ session('mensagem2') }}')</script>
    @endif

    <fieldset>
        <legend>Restaurar</legend>
        <h4>Restaurar produtos excluidos</h4>
        <form action="/produtos/restaurar" method="POST">
            @csrf
            <label for="id">ID</label>
            <input name="id" type="text" placeholder="ID do produto">
            <br>
            <br>
            <input type="submit" value="Enviar">
        </form>

    </fieldset>

@endsection