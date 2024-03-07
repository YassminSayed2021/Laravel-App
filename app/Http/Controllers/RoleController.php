<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function user_roles()
    {
        $roles = User::find(1)->roles;          //array of roles objects
        foreach ($roles as $role) {
            echo $role->role_name . " =>";
            echo $role->pivot->test . "<br>";
        }
    }

    public function role_users()
    {
        $users = Role::find(2)->users;
        foreach ($users as $user) {
            echo $user->name . "<br>";
        }
    }
}
