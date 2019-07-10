<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\RoleRepositoryInterface;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    public $user;
    /**
     * @var RoleRepositoryInterface
     */
    public $role;
    
    /**
     * @param UserRepositoryInterface $user
     * @param RoleRepositoryInterface $role
     */
    public function __construct(UserRepositoryInterface $user, RoleRepositoryInterface $role)
    {
        $this->user = $user;
        $this->role = $role;
        
    }

    /**
     * @return renderable
     */
    public function index(): renderable
    {
        return view('admin.users.index')->with('users', $this->user->paginate(10));
    }

    /**
     * @param int $id
     * @return Renderable
     */
    public function edit(int $id): renderable
    {
        return view('admin.users.edit')->with(['user' => find($id), 'roles' => $this->role->all()]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $user = $this->user->get($id);
        $user->roles()->sync($request->roles);
        
        return redirect()->route('admin.users.index')->with('success', 'User has been updated');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $user = new User();
        if ($user->remove($id) === true) {
            return redirect()
                ->route('admin.users.index')
                ->with('success', 'User has been deleted');
        } else {
            return redirect()
                ->route('admin.users.index')
                ->with('warning', 'this User cannot be deleted');
        }
    }
}
