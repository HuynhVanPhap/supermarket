<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Role;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    protected $userRepo;

    public function __construct()
    {
        $this->userRepo = app(UserRepositoryInterface::class);
    }

    public function loginPage()
    {
        return view('auth.pages.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $remember_me = $request->has('remember') ? true : false;

        if (Auth::attempt($credentials, $remember_me)) {
            $request->session()->regenerate();

            return (Auth::user()->role->value <= config('constraint.roles.admin'))
                    ? redirect()->route('admin.dashboard.page')
                    : redirect()->route('admin.users.show', Auth::user()->email);
        }

        return back()->withErrors([
            'failAuth' => __('Email or Password not valid'),
        ]);
    }

    public function logout(Request $request)
    {
        $userRole = Auth::user()->role->value;

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return ($userRole === config('constraint.roles.customer'))
            ? back()
            : redirect()->route('login');
    }

    public function signUpPage()
    {
        return view('auth.pages.register');
    }

    public function signUp(RegisterRequest $request)
    {
        $params = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'password' => Hash::make($request->input('password')),
            'role_id' => Role::whereValue(config('constraint.roles.customer'))->first()->id
        ];

        if (!blank($this->userRepo->create($params))) {
            $request->session()->flash('success', __('Register success'));

            return redirect()->route('login.page');
        }

        return back()->withErrors([
            'fail' => __('Register fail'),
        ]);
    }

    public function redirect(string $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback(string $provider)
    {
        $getInfo = Socialite::driver($provider)->stateless()->user();

        // Nếu thông tin facebook trả về không có Email thì thông báo
        if(!blank($getInfo)) {
            // Tìm User trong hệ thống thông qua Email
            $user = $this->userRepo->getByEmail($getInfo->email);
            // Nếu chưa tồn tại thì tạo mới User
            if(blank($user)) {
                $userParams = [
                    'name' => $getInfo->getName(),
                    'email' => $getInfo->getEmail(),
                    'password' => Hash::make('Ab12345!'),
                    'phone' => __('Not updated'),
                    'address' => __('Not updated'),
                    'role_id' => Role::whereValue(config('constraint.roles.customer'))->first()->id
                ];

                // Thêm người dùng và trả về id người dùng đó
                $user = $this->userRepo->create($userParams);
            }
            /**
             * @param User $user
             * @param bool $remember_me
             */
            Auth::login($user, true);

            return (Auth::user()->role->value <= config('constraint.roles.admin'))
                    ? redirect()->route('admin.dashboard.page')
                    : redirect()->route('admin.users.show', Auth::user()->email);
        }

        return back()->withErrors([
            'failAuth' => __('Login fail'),
        ]);
    }
}
