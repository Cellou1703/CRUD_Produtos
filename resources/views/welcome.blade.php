@extends('layouts.main')

@section('title', 'Menu')

@section('content')
    <div style="text-align: center">
        <h1>Desafio Hotsales</h1>
        <h3>Projeto CRUD Laravel</h3>
        <div>
            <a href="/produtos/cadastrar">
                <button id="bt_ir">Cadastrar</button>
            </a>
            <a href="/produtos/listar">
                <button id="bt_ir">Listar</button>
            </a>
            <a href="/produtos/editar">
                <button id="bt_ir">Editar</button>
            </a>
            <a href="/produtos/excluir">
                <button id="bt_ir">Excluir</button>
            </a>
            <a href="/produtos/restaurar">
                <button id="bt_ir">Restaurar</button>
            </a>
        </div>
        <hr>

    </div>

@endsection