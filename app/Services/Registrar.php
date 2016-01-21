<?php
namespace App\Services;

use App\User;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar
{

    public function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}