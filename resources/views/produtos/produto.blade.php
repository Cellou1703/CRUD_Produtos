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

                <h3>Informações do produto com ID = {{ $id }}:</h3>
                <fieldset>
                    <h4>O codigo do produto é {{ $produto->codigo }}</h4>
                    @if ($produto->descricao != null)
                        <h4>Descrição do produto : {{ $produto->descricao }}</h4>
                    @endif
                    <h4>Criado dia {{$dataC->format('d') . ' de ' . $dataC->format('M') . ' às ' . $dataC->format('H:i')}}</h4>
                    <h4>Ultima atualização foi dia
                        {{$dataU->format('d') . ' de ' . $dataU->format('M') . ' às ' . $dataU->format('H:i')}}
                    </h4>
                    @php $valido = true; @endphp
                </fieldset>
            @endif
        @endforeach
        @if ($valido == false)
            <h5>Não foi encontrado produto com este id</h5>
        @endif

    @endif
@endsection