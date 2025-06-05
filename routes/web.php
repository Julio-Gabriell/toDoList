<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', action: function () {
    return view('welcome');
});

Route::get('/home', [TarefasController::class, 'index']) ->middleware(['auth', 'verified']) ->name('tarefas.home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');   
    Route::get('/tarefas/form', [TarefasController::class, 'create'])->name('tarefas.create');
    Route::post('/tarefas/criar', [TarefasController::class, 'store'])->name('tarefas.cadastro');
    Route::get('/tarefas/{id}/formEditar', [TarefasController::class, 'edit'])->name('tarefas.editar');
    Route::put('/tarefas/{id}/editar', [TarefasController::class, 'update'])->name('tarefas.edit');
    Route::delete('tarefas/{id}/deletar', [TarefasController::class, 'destroy'])->name('tarefas.destroy');
    Route::get('/tarefas/{id}/concluir', [TarefasController::class, 'concluirTarefa'])->name('tarefas.concluir');
    Route::get('/tarefas/historico', [TarefasController::class, 'historico'])->name('tarefas.historico');
});

require __DIR__.'/auth.php';
