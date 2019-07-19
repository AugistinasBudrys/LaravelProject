<?php

namespace App\Http\Controllers;

use App\Contract\RoleRepositoryInterface;
use Illuminate\Http\Request;
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
     * Display user list
     * View: users/index.blade
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('users.index')->with('users', $this->user->paginate(10));
    }

    /**
     * Display edit list
     * View: users/edit.blade
     *
     * @param int $id
     * @return Renderable
     */
    public function edit(int $id): Renderable
    {
        return view('users.edit')->with([
            'user' => $this->user->find($id),
            'roles' => $this->role->all()
        ]);
    }

    /**
     * Updates the edited information in the database
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $user = $this->user->find($id);
        $user->roles()->sync($request->roles);

        return redirect()->route('users.index');
    }

    /**
     * Destroy function used to remove entries from users and role_user tables
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        if ($this->user->remove($id) === true)
            return redirect()
                ->route('users.index')
                ->with('success', 'User has been deleted');
        return redirect()
            ->route('users.index')
            ->with('warning', 'This User cannot be deleted');
    }

}
