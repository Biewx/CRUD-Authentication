<?php

namespace App\Http\Services;

use App\Models\Tarefas;

class TarefaService
{

    public function index($user)
    {
        $total = $user->tarefas()->count();
        $tarefas = $user->tarefas()->get();

        return [
            "total" => $total,
            "tarefas" => $tarefas
        ];
    }

    public function create($user, Array $data)
    {
        return $user->tarefas()->create($data);
    }

    public function show($user, int $id)
    {
        return $user->tarefas()->findOrFail($id);
    }

    public function edit($user, int $id, array $data){
        $user->tarefas()->findOrFail($id)->update($data);

        return $user->tarefas()->findOrFail($id);

    }

    public function delete($user, int $id){
        return $user->tarefas()->findOrFail($id)->delete();
    }
}