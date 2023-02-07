<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function dd;
use function redirect;
use function session;
use function view;

class UserController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials=$request->only("email","password");
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
        $user = Auth::user();
        Auth::login($user, true); // Log the user in
        $request->session()->regenerate();
        return redirect()->intended('dashboard');
    }

    public function register(){
        return view("signup");
    }
    public function createAccount(Request $request){
        $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ]);

        $user = new User(
            [
                'name'=>$request->name,
                "email"=>$request->email,
                "password"=>bcrypt($request->password)
            ]
        );
        $user->save();
        return redirect()->route("login")->with('success',"account created successfuly !");
    }


    public function logout(){
        Auth::logout();
        return redirect("/");
    }
}
