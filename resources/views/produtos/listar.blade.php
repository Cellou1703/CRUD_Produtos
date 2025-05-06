@extends('layouts.main')

@section('title', 'Listar')

@section('content')
    <fieldset>
        <legend>Lista</legend>
        <h4>Listar produtos existente</h4>
        @if(count($produtos) > 0)

            <h3>Existem {{ count($produtos) }} produtos cadastrados</h3>

            <table border="2">
                <tr>
                    <th>ID</th>
                    <th>Codigo</th>
                    <th>Descrição</th>
                    <th>Data de criação</th>
                    <th>Data de atualização</th>
                    <th colspan="3">Ação</th>
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
    </fieldset>

@endsection