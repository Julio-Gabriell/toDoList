<?php

namespace App\Http\Controllers;

use App\Http\Requests\TarefasRequest;
use App\Models\Tarefas;
use Illuminate\Http\Request;
use Carbon\Carbon;

Carbon::setLocale('pt_BR');
date_default_timezone_set('America/Sao_Paulo');

class TarefasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tarefas = Tarefas::where('user_id', auth()->id())
            ->where('concluida', 0)
            ->get();


        foreach ($tarefas as $tarefa) {

            $prioridade = $tarefa->prioridade;

            $tarefa->classe_prioridade = match ($prioridade) {
                'Alta' => 'bg-danger',
                'Media' => 'bg-warning',
                'Baixa' => 'bg-success',
                default => 'bg-secondary'
            };

            $data_entrega = Carbon::parse($tarefa->data_entrega);
            $agora = Carbon::now();

            if ($agora->gt($data_entrega)) {
                $tarefa->statusTempo = [
                    'text' => 'Prazo encerrado',
                    'classe' => 'bg-danger'
                ];
            } else {
                $diferencaMin = $agora->diffInMinutes($data_entrega);
                $diferencaHoras = floor($diferencaMin / 60);
                $restoMin = $diferencaMin % 60;

                if ($diferencaMin < 60) {
                    $tarefa->statusTempo = [
                        'text' => "Faltam {$diferencaMin} minuto(s)",
                        'classe' => 'bg-warning'
                    ];
                } elseif ($diferencaMin < 1440) {
                    $tarefa->statusTempo = [
                        'text' => "Faltam {$diferencaHoras}h {$restoMin}min",
                        'classe' => 'bg-warning'
                    ];
                } else {
                    $dias = $agora->diffInDays($data_entrega);
                    $tarefa->statusTempo = [
                        'text' => "Ainda faltam {$dias} dia(s)",
                        'classe' => 'bg-success'
                    ];
                }
            }
        }

        return view('home', compact('tarefas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('criar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TarefasRequest $request)
    {


    if ($request->file('img')) {
        $path = $request->file('img')->store('uploads', 'public');

        
        Tarefas::create([
            ...$request->validated(),
            'user_id' => auth()->id(), 
            'img' => $path 
        ]);
    }
        $titulo = $request->titulo;

        return redirect('/')->with('success', ' A Tarefa ' . $titulo . ' foi cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function concluirTarefa(string $id)
    {
        $tarefa = Tarefas::findOrFail($id);

        $tarefa->concluida = !$tarefa->status;

        $tarefa->save();

        return redirect('/')->with('success', 'Parabéns por terminar essa tarefa');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tarefa = Tarefas::findOrFail($id);

        return view('editar', compact('tarefa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TarefasRequest $request, string $id)
    {
        $tarefa = Tarefas::findOrFail($id);

        $tarefa->update([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'prioridade' => $request->prioridade,
            'data_entrega' => $request->data_entrega
        ]);

        return redirect()->route('tarefas.home')->with('success', 'Tarefa atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tarefas::destroy($id);

        return redirect()->route('tarefas.home')->with('success', 'Produto deletado com sucesso!');
    }

    public function historico()
    {
        $tarefasConcluidas = Tarefas::where('concluida', 1)->get();

        return view('historico', compact('tarefasConcluidas'));

    }
}