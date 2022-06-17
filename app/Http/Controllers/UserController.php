<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Brian2694\Toastr\Toastr;
use Hash;
use Session;

use App\Http\Requests\UserAddressRequest;
use App\Http\Requests\StoreUserRequest;
use App\Services\UserService;
use App\Services\AddressService;
use App\Http\Requests\LoginUserRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $userService;
    private $addressService;


    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService ,AddressService $addressService)
    {
        $this->userService = $userService;

        $this->addressService = $addressService;

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('user.login');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show()
    {
        $users = User::latest()->get();
        return view('admin.customers', compact('users'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function singleUser()
    {
        $user = Auth::user();
        return view('user.acount', compact('user'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function userDetails()
    {
        $user = Auth::user();
        return view('user.details', compact('user'));
    }
    /**
     * @param LoginUserRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function Login(LoginUserRequest $request)
    {

        $validated = $request->validated();

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('frontend')
                ->withSuccess('Signed in');

        }

        return redirect("login")->withErrors('Login details are not valid');

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function frontend()
    {
        return view('frontend');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function registration()
    {
        return view('user.registration');
    }

    /**
     * @param StoreUserRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function userCreate(StoreUserRequest $request)
    {
        $file = $request->file('image');

        $validated = $request->validated();

        $data = $request->all();

        $data['image'] = $file;

        $newUser = $this->userService->create($data);

        return redirect("/login");
    }

    /**
     * @return void
     */
    public function userAddress(){
        $user = Auth::user();


        return view('user.address', compact('user'));
    }

    /**
     * @param UserAddressRequest $request
     * @return void
     */
    public function addressCreate(UserAddressRequest $request ,$id)
    {
        $validated = $request->validated();

        $data = $request->all();

        $newAddress = $this->addressService->create($data,$id);

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
