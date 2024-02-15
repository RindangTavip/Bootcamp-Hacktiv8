<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

class AuthController extends Controller
{
    //
    public function index(){
        return view('auth.login');
    }

    public function register(){ 
        return view('auth.register'); 
    }

    public function proses_login(Request $request){
        set_time_limit(300);
        $credentials =  $request->only('email','password');
        $validate = Validator::make($credentials,[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if($validate->fails()){
            return back()->withErrors($validate)->withInput();
        }

        if(Auth::attempt($credentials)){
            return redirect()->intended('admin/dashboard')->with('success','Successfully Login');
        }
        return redirect('login')->withInput()->withErrors(['login_error'=>'Username or password are wrong!']);
    }

    public function dashboard(){
        if(Auth::check()){
            $totalCustomer = Customer::all()->count();
            $totalCategory = Category::all()->count();
            $totalProduct = Product::all()->count();
            $totalOrder = Order::all()->count();

            return view('home',compact('totalCustomer','totalCategory','totalProduct','totalOrder'));
        }
        return redirect('login')->with('You dont have access');
    }

    public function proses_register(Request $request){
        $validate = Validator::make($request->all(),[
            'fullname'=>'required',
            'email'=>'required|email',
            'password'=>'required',
        ]);
            if($validate->fails()){
            return back()->withErrors($validate)->withInput();
        }

        $request['level'] = 'admin';
        User::create($request->all());

        return redirect('admin/dashboard')->with('success','You have successfully register');
    }

    public function logout(){
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}