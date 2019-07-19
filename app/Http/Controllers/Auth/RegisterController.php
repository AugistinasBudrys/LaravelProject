<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Contract\RoleRepositoryInterface;
use App\Contract\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\User;
use Illuminate\Support\Facades\Validator as Validation;
use Illuminate\Validation\Validator;


/**
 * Class RegisterController
 * @package App\Http\Controllers\Auth
 */
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * @var
     */
    public $user;

    /**
     * @var
     */
    public $role;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * RegisterController constructor.
     * @param UserRepositoryInterface $user
     * @param RoleRepositoryInterface $role
     */
    public function __construct(UserRepositoryInterface $user, RoleRepositoryInterface $role)
    {
        $this->user = $user;
        $this->role = $role;
        $this->middleware('guest');
    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validation::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * used to register users and attach the user role to them
     *
     * @param array $data
     * @return User
     */
    public function create(array $data): User
    {
        $user = $this->user->create($data);
        $user->roles()->attach(2);

        return $user;
    }
}
