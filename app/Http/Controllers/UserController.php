<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\redirect;
use Hash;
class UserController extends Controller
{
  //
  public function login(){
    return view('admin.login');
  }

  public function post_login(Request $request){
    $email=$request->email;
    $password=$request->password;
    if(empty($email)){
      return redirect()->back()->withErrors(['msg' => 'Can not empty email..']);  
    }

    if(empty($password)){
      return redirect()->back()->withErrors(['msg' => 'Please password..']);
    }
    
    $users= User::where('email',$request->email)->first();
    
    if(empty($users)){
      return redirect()->back()->withErrors(['msg' => 'user is not exist..']);
    }
    
    if($users->status != 'Active'){
      return redirect()->back()->withErrors(['msg' => 'User Banned Please Contact Admin..']);
    }

    if(!Hash::check($request->password, $users->password)){
      return redirect()->back()->withErrors(['msg' => 'The provided password does not match our records']);
    }

    $credentials = $request->only('email', 'password');
    if(Auth::attempt($credentials)){
    $role= Auth()->User()->role;
    //echo json_encode($role);die;
    // Authentication passed...
    $users=User::where('role',$role)->first();
    //echo json_encode($users);die;
    $request->session()->put('type',$users->role);
    //echo json_encode($users->role);die;
      return redirect()->intended('/admin');
    }
      return redirect()->back()->withErrors(['msg' => 'login failed..']);
  }

  public function logout(Request $request){
    Auth::logout();
      return redirect('admin/login');
  }
}