<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Auth, DB;
use TCG\Voyager\Models\User;

class DashController extends Controller
{
   
    function login()
    {
        return view("pages/Login");
    }
    function register()
    {
        return view("pages/register");
    }
    function createAccount()
    {
        $user=new User();
        $user->name=request()->name;
        $user->email=request()->email;
        $user->password=request()->bcrypt('password');
        $user->role_id=2;
        $user->save();
      return "Ok";
       /* $account = new User();
        $account -> name  = $req->input('name');
        $account -> email = $req->input('email');
        $account -> password  = $req->input('password');
        $account -> role_id = 2;

        $account->save();

        return Redirect("http://localhost:8000/login");*/
    }
    function Checklogin(Request $request)
    {
        $checked=DB::table('users')->where(['email'=>$request->input('email'),'password'=>$request->input('password')])->get();
        $user_id=DB::table('users')->where(['email'=>$request->input('email'),'password'=>$request->input('password')])->first();
       
       if(count($checked)>0)
        {
            $request->session()->put('user_id', $user_id->id);
            return redirect()->route('index');
        }
        else
        {
            echo 'echec';
        }
    }
}
