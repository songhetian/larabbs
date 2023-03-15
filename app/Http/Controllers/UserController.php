<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'only' => ['edit', 'show']
        ]);
    }

    //
    public function show(User $user)
    {

        return view('users.show', compact('user'));
    }


    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());
        //session()->flash('success', '个人资料更新成功！');
        // return redirect()->route('users.show', $user->id);
        return  redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功！');
    }
}
