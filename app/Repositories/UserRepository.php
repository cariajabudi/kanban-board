<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
            "gender" => "required",
            "nik" => "required|unique:users",
            "password" => "required",
            "job_title_id" => "required",
            "is_admin" => "required",
            "born_place" => "required",
            "born_date" => "required",
            "image" => "image"
        ]);

        if ($request->file("image")) {
            $validated_user["image"] = $request->file("image")->store("user-images");
        }

        $validated_user["password"] = Hash::make($request->password);

        User::create($validated_user);
    }

    public function update($request, $id)
    {

        $rules = [
            "name" => "required",
            "nik" => "required|unique:users,nik,$id",
            "gender" => "required",
            "is_admin" => "required",
            "job_title_id" => "required",
            "born_place" => "required",
            "born_date" => "required",
            "image" => "nullable|image"
        ];

        $validated_user = $request->validate($rules);

        if ($request->password) {
            $validated_user["password"] = Hash::make($request->password);
        }

        if ($request->file("image")) {

            if ($request->old_image) {
                Storage::delete($request->old_image);
            }
            $validated_user["image"] = $request->file("image")->store("user-images");
        }

        $user = User::find($id);
        $user->fill($validated_user);
        $user->save();
        $user->touch();
    }
}
