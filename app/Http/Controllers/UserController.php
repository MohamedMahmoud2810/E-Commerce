<?php

namespace App\Http\Controllers;
use App\Services\UserService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    private $userService;
    //create constructor

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    public function index(){
        $users = $this->userService->getAllUsers();
        return view('dashboard.users.user' , compact('users'));
    }

    public function edit(User $users , $id){
        $users = $this->userService->editUser($id);
        return view('dashboard.users.edit' , ['users' => $users]);
    }

    public function update(Request $request , $id){
        $userService = new UserService();
        return $userService->updateUser($request, $id);    }

    public function delete($id){
        $this->userService->deleteUser($id);
        return redirect()->route('dashboard.user.index');
    }
}
