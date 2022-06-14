<?php

namespace App\Http\Controllers;

use App\Models\User;
use Brian2694\Toastr\Toastr;
use Hash;
use Session;

use App\Http\Requests\StoreUserRequest;
use App\Services\UserService;
use App\Http\Requests\LoginUserRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }
    public function index()
    {
        return view('user.login');
    }
    public function show()
    {
        $users = User::latest()->get();
        return view('admin.customers', compact('users'));
    }
    public function Login(LoginUserRequest $request)
    {

        $validated = $request->validated();

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('frontend')
                ->withSuccess('Signed in');

            Toastr::success('Error Message');

        }

        return redirect("login")->withErrors('Login details are not valid');

    }

    public function frontend(){
        return view('frontend');
    }

    public function registration()
    {
        return view('user.registration');
    }

    public function userCreate(StoreUserRequest $request)
    {
        $file = $request->file('image');

        $validated = $request->validated();

        $data = $request->all();

        $data['image'] = $file;

        $newUser = $this->userService->create($data);

        return redirect("/login");
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
