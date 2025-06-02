@extends('layouts.app')

@section('content')

    <h1 class="text-center">
        Tarefas concluidas
    </h1>

    @foreach ($tarefasConcluidas as $tarefa)
        <div class="card text-body bg-body shadow-sm mb-3 d-flex">
            <div class="card-body">
                <h4 class="card-title">{{ $tarefa->titulo }}</h4>
                <p class="card-text text-wrap" style="width: 28rem;">{{ $tarefa->descricao }}</p>
            </div>
        </div>
    @endforeach

    <div class="d-flex justify-content-center">
        <a href="{{ route('tarefas.home') }}" class="btn btn-success">Voltar</a>
    </div>

@endsection