<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view("dashboard.user.index", [
            "title" => "Users",
            "users" => $this->userRepository->index()->all(),
        ]);
    }

    public function create()
    {
        return view("dashboard.user.create", [
            "title" => "Register User"
        ]);
    }

    public function store(Request $request)
    {
        $this->userRepository->store($request);

        return redirect('dashboard/user')->with("register_success", "$request->name has been created");
    }

    public function show(string $id)
    {
        return view("dashboard.user.show", [
            "title" => "Detail User",
            "user" => $this->userRepository->index()->find($id)
        ]);
    }

    public function edit(String $id)
    {
        return view("dashboard.user.edit", [
            "title" => "Edit User",
            "user" => $this->userRepository->index()->find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->userRepository->update($request, $id);
        return redirect("dashboard/user/$id")->with("update_success", "$request->name has been updated");
    }

    public function destroy(String $id)
    {
        $this->userRepository->index()->find($id)->delete();
        return redirect("dashboard/user")->with("delelte_success", "User has been deleted");
    }
}
