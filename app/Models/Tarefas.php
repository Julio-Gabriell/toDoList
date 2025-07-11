<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefas extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descricao', 'prioridade', 'data_entrega', 'user_id', 'path'];

    public function user()
{
    return $this->belongsTo(User::class);
}

}


