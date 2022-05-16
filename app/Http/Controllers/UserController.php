<?php

namespace App\Http\Controllers;

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

    public function Login(LoginUserRequest $request)
    {
        /*$request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);*/

        $validated = $request->validated();

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('frontend')
                ->withSuccess('Signed in');
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
       /* $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);*/

        $validated = $request->validated();

        $data = $request->all();
<<<<<<< HEAD
        $check = $this->userService->create($data);
        $name = $data['name'];
/*        dd($name);*/
        return redirect("/email")->with(['name'=>'$name']);
=======
        $newUser = $this->userService->create($data);

        $this->userService->sendRegistrationMail($newUser);

        return redirect("/");
>>>>>>> 6efe5a0a3d0b88c7768ed79f0f13ef3924cc3cad
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
