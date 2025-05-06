@extends('layouts.main')

@section('title', 'Produto ' . $id)

@section('content')

    @php $valido = false; @endphp

    @if ($id != null)

        @foreach ($produtos as $produto)
            @if($produto->id == $id)
                @php
                    $dataC = $produto->created_at;
                    $dataU = $produto->updated_at;
                @endphp
                <p>O id do produto é {{ $id }}</p>
                <p>O codigo do produto é {{ $produto->codigo }}</p>
                @if ($produto->descricao != null)
                    <p>Descrição do produto : {{ $produto->descricao }}</p>
                @endif
                <p>Criado dia {{$dataC->format('d') . ' de ' . $dataC->format('M') . ' às ' . $dataC->format('H:i')}}</p>
                <p>Ultima atualização foi dia {{$dataU->format('d') . ' de ' . $dataU->format('M') . ' às ' . $dataU->format('H:i')}}
                </p>
                @php $valido = true; @endphp
            @endif
        @endforeach
        @if ($valido == false)
            <p>Não foi encontrado produto com este id</p>
        @endif

    @endif
@endsection