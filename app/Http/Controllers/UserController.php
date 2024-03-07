<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Phone;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user_data = Phone::find(1)->user;
        // //$user = $phone_data->user;                    //user:dynamic property
        // echo $user_data->name;

    }

    public function user_phone()
    {
        $user_phone = User::find(1)->phone;
        echo $user_phone->phone_no;
    }

    public function user_posts(string $id)
    {
        $user_posts = User::find($id)->posts;
        return view('posts.user_posts', compact('user_posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new_user = new User();
        $new_user->name = $request->name;
        $new_user->email = $request->email;
        $new_user->password = $request->password;
        $new_user->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
