<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class CustomAuthController extends Controller
{
    public function registerView(){
        return view('auth.registration');
    }
    public function register(Request $request){
        $request->validate([
            'name'=> 'required|alpha',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|max:15|confirmed',
            'password_confirmation'=>'required|min:8|max:15',
        ]);

        $users=new User;
        $users->name=$request->name;
        $users->email=$request->email;
        $users->password=Hash::make($request->password) ;
        $users->save();

        $url=route('LoginView');
        return redirect($url);

    }

    public function LoginView(){
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        $user=User::where('email','=',$request->email)->first();

        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('loginid',$user->id);
                $credentials = $request->only('email', 'password');
                Auth::attempt($credentials);
                return redirect(route('dashboard'));

            }else{
                return back()->with('fail','Password not matches.');
            }

        }else{
            return back()->with('fail','This email not register.');
        }
    }
    public function logout(){
        if(session()->has('loginid')){
            session()->pull('loginid');
            Auth::logout();


        }
        return redirect(route('login'));

    }
    // ----------Start-----Admin panel--------------------------------------
    public function adminloginView(){
        return view('admin.auth.login');
    }
    public function adminlogin(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        $user=User::where('email','=',$request->email)->where('role','=','admin')->first();

        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('adminloginid',$user->id);
                return redirect(route('adminDashboard'));

            }else{
                return back()->with('fail','Password not matches.');
            }

        }else{
            return back()->with('fail','This email is not a admin member.');
        }
    }
    public function adminlogout(){
        if(session()->has('adminloginid')){
            session()->pull('adminloginid');


        }
        return redirect(route('adminloginView'));

    }
    // ----------End-----Admin panel--------------------------------------



}

