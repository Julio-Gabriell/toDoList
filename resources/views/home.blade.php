@extends('layouts.app')

@section('content')

    <h1 class="text-center">
        Lista de tarefas
    </h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif




    @foreach ($tarefas as $tarefa)
        <div class="card text-tertiary bg-white shadow-sm mb-3 d-flex">
            <div class="card-body">
                <h4 class="card-title">{{ $tarefa->titulo }}</h4>
                <p class="card-text text-wrap" style="width: 28rem;">{{ $tarefa->descricao }}</p>
                <div class="d-flex align-items-center justify-content-center gap-2">
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
                <div class="card-footer bg-white">
                    <small class="text-secondary">Criada em {{ $tarefa->created_at->format('d/m/y') }}</small>
                    <span class="badge {{ $tarefa->statusTempo['classe'] }} ">
                        {{ $tarefa->statusTempo['text'] }}
                    </span>
                </div>
            </div>
        </div>
    @endforeach


    <div class="justify-content-center d-flex gap-2">
        <a href=" {{ route('tarefas.create') }} " class="btn btn-success">Nova tarefa</a>

        <a href=" {{ route('tarefas.historico') }} " class="btn btn-primary">Histórico de tarefas</a>
    </div>

@endsection