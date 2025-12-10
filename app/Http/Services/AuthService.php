<?php

namespace App\Http\Services;

use App\Http\Repositories\UserRepository;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService{

    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }

    public function register(Array $data){
            $user = $this->userRepository->create($data);

            return [
                "msg" => "Usuário criado com sucesso",
                "token" => $user->createToken("token")->plainTextToken
            ];
        
    }

    public function login(Array $data){
        if(!Auth::attempt($data)){
            throw ValidationException::withMessages([
                'email' => ['Credenciais inválidas.']
            ]);
        }

        $user = Auth::user();

        return[
            "msg" => "Logado com sucesso",
            "token" => $user->createToken("token")->plainTextToken
        ];
    }

}