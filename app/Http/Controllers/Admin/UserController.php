<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'asc')->paginate(5);
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
        'role'       => ['required', 'in:user,admin'],
        'reputation' => ['required','integer','min:0','max:1000'],
        'name'       => ['required','string','max:255'],
        'email'      => [
            'required','email','max:255',
            Rule::unique('users','email')->ignore($user->id),
        ],
        'surname'    => ['required','string','max:255'],
        'nick'       => [
            'required','string','max:255',
            Rule::unique('users','nick')->ignore($user->id),
        ],
    ]);

        $user->update($request->only('role', 'reputation', 'name', 'email', 'surname', 'nick'));
        $user->assignRole($user->role);

        return redirect()->route('admin.users.index')
            ->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'Usuario eliminado.');
    }
}
