<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
class UserController extends Controller
{
    public function index(){
        $users = User::paginate(15);
        return view('dashboard.users.user' , ['users' => $users]);
    }

    public function edit(User $users , $id){
        $users = User::find($id);
        return view('dashboard.users.edit' , ['users' => $users]);
    }

    public function update(Request $request , $id){
        $users = User::find($id);
        if($users){
            $users->type = $request->type;
            $users->name = $request->name;
            $users->email = $request->email;
            $users->update();
            return redirect()->route('dashboard.user.index')->with('success' , 'تم التعديل بنجاح');
        }
        return redirect()->route('dashboard.user.edit')->with('success' , 'لم يتم العثور علي مستخدم');
    }

    public function delete($id){
        User::find($id)->delete();
        return redirect()->route('dashboard.user.index');
    }
}
