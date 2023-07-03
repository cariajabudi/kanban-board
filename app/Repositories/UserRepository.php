<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function index()
    {
        $user = new User();
        return $user;
    }

    public function store($request)
    {
        $validated_user = $request->validate([
            "name" => "required",
            "nik" => "required|unique:users",
            "password" => Hash::make("password"),
            "is_admin" => "required"
        ]);
    }
}
