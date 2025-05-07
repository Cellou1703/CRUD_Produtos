@extends('layouts.main')

@section('title', 'Listar')

@section('content')

    <h1>Lista</h1>
    <h3>Listar produtos existente</h3>
    <hr>
    @if(count($produtos) > 0)

        <h3>Existem {{ count($produtos) }} produtos cadastrados</h3>

        <table border="2" style="margin: 0 auto; text-align: center;">
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
                        <p>Data: {{ $produto->created_at->format('d/m/Y')}}<br>Hora:{{ $produto->created_at->format('H:i') }}</p>
                    </td>
                    <td>
                        <p>Data: {{ $produto->updated_at->format('d/m/Y')}}<br>Hora:{{ $produto->updated_at->format('H:i') }}</p>
                    </td>
                    <td>
                        <button id="bt_table">
                            <a style="color: white;" href="/produtos/produto/{{ $produto->id }}">Ver produto</a>
                        </button>
                        <form action="/produtos/listar" method="post">
                            @csrf
                            @method('DELETE')
                            <button style="color: white;" id="bt_table" name="id" value="{{ $produto->id }}">
                                Excluir produto
                            </button>
                        </form>
                        <button id="bt_table">
                            <a style="color: white;" href="/produtos/editar?id={{ $produto->id }}">Editar produto</a>
                        </button>
                    </td>
                </tr>
            @endforeach

        </table>
    @else
        <h1>Ainda não existem produtos cadastrados</h1>
    @endif


@endsection