<?php

namespace App\Events;

use App\Models\Tarefas;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TarefaCriada
{
    use Dispatchable, SerializesModels;

    public $tarefa;

    public function __construct(Tarefas $tarefa)
    {
        $this->tarefa = $tarefa;
    }
}
