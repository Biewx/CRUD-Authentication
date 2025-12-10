<?php

namespace App\Http\Controllers;

use App\Http\Requests\TarefasRequest;
use App\Http\Services\TarefaService;
use App\Models\Tarefas;
use Illuminate\Http\Request;

class TarefasController extends Controller
{
    public function __construct(private TarefaService $tarefaService) {
        $this->tarefaService = $tarefaService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $result = $this->tarefaService->index($request->user());

        if(empty($result)){
             return response()->json(["msg" => "Nenhuma tarefa encontrada"], 200);
        }else{
            return response()->json($result, 200);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TarefasRequest $request)
    {
        $user = $request->user();

        $result = $this->tarefaService->create($user,$request->validated());

        return response()->json($result, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, int $id)
    {
        $result = $this->tarefaService->show($request->user(), $id);
        return response()->json($result, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TarefasRequest $request, int $id )
    {
        $result = $this->tarefaService->edit($request->user(), $id, $request->validated());

        return response()->json([
            "msg" => "Tarefa atualizada com sucesso",
            "tarefa" => $result
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, int $id)
    {
        $this->tarefaService->delete($request->user(), $id);

        return response()->json(["msg" => "Tarefa deletada com sucesso"], 200);
    }
}