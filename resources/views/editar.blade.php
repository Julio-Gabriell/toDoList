@extends('layouts.app')

@section('content')

    <h1 class="text-center">
        Editar Tarefa
    </h1>

        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
    @endif

<form action="{{ route('tarefas.edit', $tarefa->id) }}" method="post">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="tituloTarefa" class="form-label">Título da Tarefa:</label>
        <input type="text" id="tituloTarefa" name="titulo" class="form-control"
               value="{{ old('titulo', $tarefa->titulo) }}"
               placeholder="Ex: Entregar atividade da Faculdade">
    </div>

    <div class="mb-3">
        <label for="descricaoTarefa" class="form-label">Descrição da Tarefa:</label>
        <input type="text" id="descricaoTarefa" name="descricao" class="form-control"
               value="{{ old('descricao', $tarefa->descricao) }}"
               placeholder="Ex: Atividade dos 5 cenários para caso de uso">
    </div>

    <div class="mb-3">
        <label for="prioridadeTarefa" class="form-label">Prioridade da Tarefa:</label>
        <select class="form-select" id="prioridade" name="prioridade">
            <option value="baixa" {{ old('prioridade', $tarefa->prioridade) == 'baixa' ? 'selected' : '' }}>Baixa</option>
            <option value="media" {{ old('prioridade', $tarefa->prioridade) == 'media' ? 'selected' : '' }}>Média</option>
            <option value="alta"  {{ old('prioridade', $tarefa->prioridade) == 'alta'  ? 'selected' : '' }}>Alta</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="dataTarefa" class="form-label">Data da Tarefa:</label>
        <input type="datetime-local" id="dataTarefa" name="data_entrega" class="form-control"
               value="{{ old('data_entrega', \Carbon\Carbon::parse($tarefa->data_entrega)->format('Y-m-d')) }}">
    </div>

        <div class="justify-content-center d-flex gap-2">
        <button type="submit" class="btn btn-success">Salvar Alterações</button>
        <a href="{{ route('tarefas.home') }}" class="btn btn-danger">Cancelar Alterações</a>
    </div>

    
</form>
@endsection
