@extends('layouts.main')

@section('title', 'Cadastrar')

@section('content')

    <fieldset>
        @if (session('mensagem1'))
            <script>alert('{{ session('mensagem1') }}')</script>
        @endif

        <legend>Cadastro</legend>
        <h4>Cadastrar novo produto</h4>
        <form action="/produtos" method="POST">
            @csrf
            <label for="codigo">Codigo</label>
            <input name="codigo" type="text">
            <label for="descricao">Descricao</label>
            <input name="descricao">
            <br>
            <br>
            <input type="submit" value="Enviar">
        </form>
    </fieldset>

@endsection