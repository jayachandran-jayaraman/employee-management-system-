<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('_id', 'desc')->get();

        return view('user_form', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email',
            'age'   => 'required|numeric'
        ]);

        User::create([
            'name'  => $request->name,
            'email' => $request->email,
            'age'   => $request->age
        ]);

        return redirect()->back()
            ->with('success', 'User created successfully!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $users = User::orderBy('_id', 'desc')->get();

        return view('user_form', compact('user', 'users'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
            'age'   => $request->age
        ]);

        return redirect('/')
            ->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect('/')
            ->with('success', 'User deleted successfully!');
    }
}