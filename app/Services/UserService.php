<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class UserService.
 */
class UserService
{

    public function getAllUsers(){
        return User::paginate(15);
    }

    public function editUser($id){
        return User::find($id);
    }

    public function updateUser(Request $request , $id){
        $users = User::find($id);
        if($users){
            $users->type = $request->type;
            $users->name = $request->name;
            $users->email = $request->email;
            $users->update();
            return redirect()->route('dashboard.user.index')->with('success' , 'تم التعديل بنجاح');
        }
    }

    public function deleteUser($id)  {
        return User::find($id)->delete();
    }

}
