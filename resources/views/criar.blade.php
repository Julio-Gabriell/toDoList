@extends('layouts.app')

@section('content')

    <h1 class="text-center">
        Nova tarefa
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

    <form action="{{ route('tarefas.cadastro') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="tituloTarefa" class="form-label">Titulo da Tarefa:</label>
            <input type="text" id="tituloTarefa" name="titulo" class="form-control"
            placeholder="Ex: Entregar atividade da Faculdade">
        </div>
        
        <div class="mb-3">
            <label for="descricaoTarefa" class="form-label">Descrição da Tarefa:</label>
            <input type="text" id="descricaoTarefa" name="descricao" class="form-control"
            placeholder="Ex: Atvidade dos 5 cenarios para caso de uso">
        </div>

        <div class="mb-3">
            <label for="prioriadadeTarefa" class="form-label">Prioridade da Tarefa:</label>
            <select class="form-select" aria-label="Escolha uma prioridade" id="prioridade" name="prioridade">
                <option selected value="Baixa">Baixa</option>
                <option value="Media">Média</option>
                <option value="Alta">Alta</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="dataTarefa" class="form-label">Data da Tarefa:</label>
            <input type="datetime-local" id="dataTarefa" name="data_entrega" class="form-control">
        </div>

        <div class="justify-content-center d-flex gap-2">
            <button type="submit" class="btn btn-success">Cadastrar <i class="fa-solid fa-check"></i></button>
            <a href="{{ route('tarefas.home') }}" class="btn btn-danger">Cancelar Alterações <i class="fa-solid fa-ban"></i></a>
        </div>
    </form>

    

@endsection