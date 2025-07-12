<?php

namespace App\Listeners;

use App\Events\TarefaCriada;
use Illuminate\Support\Facades\Log;

class EnviarNotificacaoTarefa
{
    public function handle(TarefaCriada $event): void
    {
        Log::info('📌 Nova tarefa criada: ' . $event->tarefa->titulo);
        
        // Você pode adicionar aqui envio de e-mail, notificações, etc
    }
}