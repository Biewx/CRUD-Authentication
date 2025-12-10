<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private AuthService $authService;
    public function __construct(AuthService $authService) {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $request) {
        $result = $this->authService->register($request->validated());
        return response()->json($result, 201);
    }

    public function login(LoginRequest $request) {
        $result = $this->authService->login($request->validated());
        return response()->json($result, 200);
    }

    public function logout(Request $request) {
        $request->user()->tokens()->delete();
        return response()->json(["msg" => "Deslogado com sucesso"], 200);
    }
}