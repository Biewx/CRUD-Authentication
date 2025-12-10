<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarefas extends Model
{

    public function user(){
    return $this->belongsTo(User::class);
    }
    
    protected $fillable = [
        'titulo',
        'descricao',
        'concluida',
        'prazo',
        'user_id',
    ];
}