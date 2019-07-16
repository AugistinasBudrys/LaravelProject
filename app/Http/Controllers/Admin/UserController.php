<?php

namespace App\Http\Controllers\Admin;

use App\Contract\RoleRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contract\UserRepositoryInterface;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

/**
 * Class UserController
 * @package App\Http\Controllers\Admin
 */
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
     * UserController constructor.
     * @param UserRepositoryInterface $user
     * @param RoleRepositoryInterface $role
     */
    public function __construct(UserRepositoryInterface $user, RoleRepositoryInterface $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    /**
     * display user list
     * View: admin/users/index.blade
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('admin.users.index')->with('users', $this->user->paginate(10));
    }

    /**
     * display edit list
     * View: admin/users/edit.blade
     *
     * @param int $id
     * @return Renderable
     */
    public function edit(int $id): Renderable
    {
        return view('admin.users.edit')->with([
            'user' => $this->user->find($id),
            'roles' => $this->role->all()
        ]);
    }

    /**
     * updates the edited information in the database
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $user = $this->user->find($id);
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.index')->with('success', 'User has been updated');
    }

    /**
     * destroy function used to remove entries from users and role_user tables
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        if ($this->user->remove($id) === true)
            return redirect()
                ->route('admin.users.index')
                ->with('success', 'User has been deleted');
        return redirect()
            ->route('admin.users.index')
            ->with('warning', 'this User cannot be deleted');
    }
}
