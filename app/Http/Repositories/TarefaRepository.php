<?php

namespace App\Http\Services;

use App\Models\Tarefas;

class TarefaRepository
{
    public function create(Array $data)
    {
        return Tarefas::create($data);
    }
}