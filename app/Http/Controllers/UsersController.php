<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
 
    public function create(){
        return view('register');
    }
    public function store(Request $request){
        $data = $this->validate($request, [
            'name' => 'required|min:8',
            "email"    => "required|email",
            "password" => "required|min:6|max:10"
        ]);
        $data['password'] = bcrypt($data['password']);
        $op = User::create($data);
        if($op){
            $message = "User Register Done";
        }else{
            $message = "Error In Register";
        }
        session()->flash('Message',$message);
        return redirect('login');
    }
    public function login(){
        return view("login");
    }

    public function doLogin(Request $request){
        $data = $this->validate($request, [
            'email' => "required|email",
            "password" => "required|min:6|max:10"
        ]);

        $status = false;

        if($request->R_me){
            $status = true;
        }
       $op =  Auth::attempt($data, $status);
        if($op){
            return redirect('/todo');
        } else{
            session()->flash('Message','Error In Your Credintials');
            return redirect("login");
        }
    }

    function logout(){
        Auth::logout();
        return redirect("login");
    }
}
