@extends('layouts.app')

@section('content')

    <h1 class="text-center">
        Lista de tarefas <button onclick="toggleTheme()" class="btn m-3">
            Alternar tema <i class="fa-solid fa-circle-half-stroke"></i>
        </button>
    </h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @foreach ($tarefas as $tarefa)
        <div class="card text-body bg-body shadow-sm mb-3 d-flex">
            <div class="card-body position-relative">
                <h4 class="card-title">{{ $tarefa->titulo }}</h4>
                <p class="card-text text-wrap" style="width: 28rem;">{{ $tarefa->descricao }}</p>
                <span class="badge {{ $tarefa->classe_prioridade }}">
                    {{ $tarefa->prioridade }}
                </span>
                <div class="d-flex flex-column align-items-end justify-content-start gap-1 position-absolute top-0 end-0 m-3">
                    <a href="{{ route('tarefas.editar', $tarefa->id)}}" class="btn btn-primary"><i
                            class="fa-solid fa-pen"></i></a>
                    <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST"
                        onsubmit="return confirm('Tem certeza que deseja excluir o item {{$tarefa->id}}?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                    </form>
                    <a href="{{ route('tarefas.concluir', $tarefa->id) }}" class="btn btn-success"><i
                            class="fa-solid fa-check"></i></a>
                </div>
                <div class="card-footer bg-body mt-4">
                    <small class="text-secondary">Criada em {{ $tarefa->created_at->format('d/m/y') }}</small>
                    <span class="badge {{ $tarefa->statusTempo['classe'] }} ">
                        {{ $tarefa->statusTempo['text'] }}
                    </span>
                </div>
            </div>
        </div>
    @endforeach


    <div class="justify-content-center d-flex gap-2">
        <a href=" {{ route('tarefas.create') }} " class="btn btn-success">Nova tarefa <i class="fa-solid fa-plus"></i></a>

        <a href=" {{ route('tarefas.historico') }} " class="btn btn-primary">Histórico de tarefas <i
                class="fa-solid fa-clock-rotate-left"></i></a>
    </div>

@endsection