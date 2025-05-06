@extends('layouts.main')

@section('title', 'Menu')

@section('content')

    <h1>Desafio Hotsales</h1>
    <h3>Projeto CRUD Lavaravel</h3>
    <div>
        <a href="/produtos/cadastrar">
            <button>Cadastrar</button>
        </a>
        <a href="/produtos/listar">
            <button>Listar</button>
        </a>
        <a href="/produtos/editar">
            <button>Editar</button>
        </a>
        <a href="/produtos/excluir">
            <button>Excluir</button>
        </a>
        <a href="/produtos/restaurar">
            <button>Restaurar</button>
        </a>
    </div>
    <hr>
    <h3>Existem {{ count($produtos) }} produtos cadastrados</h3>


    @if(count($produtos) > 0)
        <table border="2">
            <tr>
                <th>ID</th>
                <th>Codigo</th>
                <th>Descrição</th>
                <th>Data de criação</th>
                <th>Data de atualização</th>
                <th>Ação</th>
            </tr>

            @foreach($produtos as $produto)
                <tr>
                    <td>
                        <p>{{ $produto->id }}</p>
                    </td>
                    <td>
                        <p>{{ $produto->codigo}}</p>
                    </td>
                    <td>
                        <p>{{ $produto->descricao }}</p>
                    </td>
                    <td>
                        <p>{{ $produto->created_at }}</p>
                    </td>
                    <td>
                        <p>{{ $produto->updated_at }}</p>
                    </td>
                    <td>
                        <button><a href="/produtos/produto/{{ $produto->id }}">Ver produto</a></button>
                        <form action="/produtos" method="post">
                            @csrf
                            @method('DELETE')
                            <button name="id" value="{{ $produto->id }}">Excluir produto</button>
                        </form>
                        <button><a href="/produtos/editar?id={{ $produto->id }}">Editar produto</a></button>
                    </td>
                </tr>
            @endforeach

        </table>
    @else
        <h2>Ainda não existem produtos cadastrados</h2>
    @endif

@endsection