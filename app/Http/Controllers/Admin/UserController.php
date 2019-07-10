<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Class UserController
 * @package App\Http\Controllers\Admin
 */
class UserController extends Controller
{
    /**
     * @return View
     */
    public function index(): view
    {
        return view('admin.users.index')->with('users', User::paginate(10));
    }

    /**
     * @param int $id
     * @return View
     */
    public function edit(int $id): view
    {
        return view('admin.users.edit')->with(['user' => User::find($id), 'roles' => Role::all()]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,int $id)
    {
        $user = User::find($id);
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.index')->with('success', 'User has been updated');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        $remov = new User();
          if($remov->remove($id)===true) {return redirect()
        ->route('admin.users.index')
        ->with('success', 'User has been deleted');}
        else
        {return redirect()
            ->route('admin.users.index')
            ->with('warning', 'this User cannot be deleted');}
    }
}
