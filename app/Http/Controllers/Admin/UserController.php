<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use \Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Support\Renderable;

class UserController extends Controller
{

    /**
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('admin.users.index')->with('users', User::paginate(10));
    }

    /**
     * @param int $id
     * @return Renderable
     */
    public function edit(int $id): Renderable
    {
        return view('admin.users.edit')->with(['user' => User::find($id), 'roles' => Role::all()]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): redirectresponse
    {
        $user = User::find($id);
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.index')->with('success', 'User has been updated');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): redirectresponse
    {
        $user = new User();
        if ($user->remove($id) === true) {
            return redirect()->route('admin.users.index')->with('success', 'User has been deleted');
        } else {
            return redirect()->route('admin.users.index')->with('warning', 'this User cannot be deleted');
        }
    }
}
