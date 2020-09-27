<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Model\User;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function list()
    {
        $users = User::all();
        return view('admin.users.list',compact('users'),[
            'panel_title' => 'Users List',
            'panel_icon' => 'fad fa-users'
        ]);
    }

    public function create()
    {
        return view('admin.users.create', [
            'panel_title' => 'User Create',
            'panel_icon' => "fad fa-user-plus"
        ]);
    }

    public function store(UserRequest $userRequest)
    {
        $data = [
            'name' => request()->input('name'),
            'email' => request()->input('email'),
            'password' => request()->input('password'),
            'wallet' => request()->input('wallet'),
            'role' => request()->input('role')
        ];
        $user = User::create($data);
        if ($user instanceof User){
            return redirect()->route('admin.users.list')->with([
                'success' => true,
                'message' => 'User (' . $data['name'] . ') Created Successfully.',
            ]);
        }

        return redirect()->route('admin.users.list')->with([
            'error' => true,
            'message' => 'Error while creating user (' . $data['name'] . ').',
        ]);
    }

    public function delete($user_id)
    {
        if ($user_id && ctype_digit($user_id)){
            $user = User::find($user_id);
            if ($user && $user instanceof User) {
                $user->delete();
                return redirect()->route('admin.users.list')->with([
                    'success' => true,
                    'message' => 'User (' . $user->name . ') with ID (' . $user_id . ') Successfully Deleted.'
                ]);
            }
        }
        return redirect()->route('admin.users.list')->with([
            'error' => true,
            'message' => 'Invalid ID (' . $user_id . ')'
        ]);
    }

    public function edit($user_id)
    {
        if ($user_id && ctype_digit($user_id)){
            $user = User::find($user_id);
            if ($user && $user instanceof User) {
                return view('admin.users.edit', compact('user'), [
                    'panel_title' => 'Edit User',
                    'panel_icon' => "fad fa-user-edit"
                ]);
            }
        }
        return redirect()->route('admin.users.list')->with([
            'error' => true,
            'message' => 'Invalid ID (' . $user_id . ')'
        ]);
    }

    public function update(UserRequest $userRequest,$user_id)
    {
        if ($user_id && ctype_digit($user_id)){
            $user = User::find($user_id);
            if ($user && $user instanceof User) {
                $data = [
                    'name' => request()->input('name'),
                    'email' => request()->input('email'),
                    'wallet' => request()->input('wallet'),
                    'role' => request()->input('role')
                ];
                if (request()->has('password')) {
                    $data['password'] = request()->input('password');
                }
                $user->update($data);

                return redirect()->route('admin.users.list')->with([
                    'success' => true,
                    'message' => 'User (' . $user->name . ') with ID (' . $user_id . ') Successfully Updated.'
                ]);
            }
        }
        return redirect()->route('admin.users.list')->with([
            'error' => true,
            'message' => 'Invalid ID (' . $user_id . ')'
        ]);
    }

    public function packages($user_id)
    {
        $user = User::find($user_id);
        if (!$user || !($user instanceof User)) {
            return redirect()->back();
        }

        $packages = $user->packages;
        return view('admin.users.packages',compact('packages'),[
            'panel_title' => 'Packages of ' . $user->name,
            'panel_icon' => 'fad fa-archive'
        ]);
    }
}
