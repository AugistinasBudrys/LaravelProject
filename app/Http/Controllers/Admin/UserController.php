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

//use App\Repositories\RoleRepositoryInterface;

/**
 * Class UserController
 * @package App\Http\Controllers\Admin
 */
class UserController extends Controller
{
    /**
     * @return View
     */
    public $user;
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
    
    
    public function index(): view
    {
        return view('admin.users.index')->with('users', $this->user->paginate(10));
    }
    
    /**
     * @param int $id
     * @return View
     */
    public function edit(int $id): view
    {
        return view('admin.users.edit')->with(['user' => find($id), 'roles' => $this->role->all()]);
    }
    
    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $user = $this->user->get($id);
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
        if ($remov->remove($id) === true) {
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
