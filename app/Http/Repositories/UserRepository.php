<?php

namespace App\Http\Repositories;

use App\Models\User;

class UserRepository
{
    public function __construct()
    {
        //
    }

    public function create(Array $data){
        return User::create($data);
    }
}