<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Users;
use App\Models\User;
use App\Models\Playlist;
use App\Models\Signage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\redirect;
use Hash;
class AdminController extends Controller
{
  //
  public function index(){
    if(!Auth::User()) {
      return redirect('/'); 
    }
    //$user_id=Auth::user()->id; //current id get
    //echo json_encode($user_id);die;
    $signages = Signage::get();
    $playlists = Playlist::get();
    $status = User::where('status','Active')->count();
    $playlist = Playlist::where('status','Active')->count();
    $signage = Signage::where('live_status','live')->count();
    //var_dump($count);die;
      return view('admin.home', compact('status','signage','signages','playlist'));
  }

  public function add(){
    return view('admin.user.add');
  }

  public function store(Request $request){
    $user_id=Auth::user()->id;
    //var_dump($user_id);die;
    $this->validate(request(), [
    'name' => 'required',
    'email' => 'required|email',
    'password' => 'required',
    'role' => 'required',
    ]);

    
    if($request->password != $request->confir_password){
      return redirect::back()->withErrors(['msg' => 'password not match..']);
    }
    $email=$request->email;
    $user=Users::where('email',$email)->first();
    $full_name=$request->full_name;
    
    if(!empty($user)){
      return redirect::back()->withErrors(['msg' => 'email already exist..']);
    }
    
    $image=array();
    if($files=$request->file('image')){
      foreach($files as $file){
        $name=$file->getClientOriginalName();
        $destinationPath = public_path('asset/img/user/');
        $file->move($destinationPath,$name);
        $uploadpath='asset/img/user/'.$name;

     }
    }

    $password=bcrypt($request->password);
    $data_add=['name'=>$request->name,
    'email'=>$request->email,
    'password'=>$password,
    'role' =>$request->role,
    'parent_id' => $user_id,
    'image' => $uploadpath,
    'full_name' => $full_name,
    ];
    //echo json_encode($user_id);die;

    if(Users::insert($data_add)){
      return redirect()->route('admin.user.list')->with('success', 'add user success..');
    }
      return redirect::back()->withErrors(['msg' => 'add user failed..']);
  }  

  public function profile(){
    $user= Auth::User();
    //echo json_encode($user);die;
    if(empty($user)){
      return redirect('/');
    }
    $users=Users::where('id',$user->id)->first();
    //echo json_encode($users);die;
    $user->role=(!empty($users))?$user->role:'';
    //echo json_encode($user);die;
      return view('admin.profile',['user'=>$user]);
  }

  public function update_profile(Request $request,$id){
    $uploadpath='';
    $name=$request->name;
    $full_name=$request->full_name;
    
    if(empty($name)){
      return redirect()->back()->withErrors(['msg' => 'Can not empty name..']);
    }
    /*
    if(empty($user_role)){
    return redirect()->back()->withErrors(['msg' => 'Please select user role..']);
    }*/

    $user=Users::where('id',$id)->first();
    if(empty($user)){
      return redirect()->back()->withErrors(['msg' => 'Can not empty user..']);
    }

    if(!empty($request->new_password)){
    $data_add['password']=bcrypt($request->new_password);
    }

    $image=array();
    if($files=$request->file('image')){
      foreach($files as $file){
        $files=$file->getClientOriginalName();
        $destinationPath = public_path('asset/img/user/');
        $file->move($destinationPath,$files);
        $uploadpath='asset/img/user/'.$files;

     }
    }

    $data_add['name']=$name;
    $data_add['full_name']=$full_name;
    $data_add['image']=$uploadpath;
    Users::where('id', $id)->update($data_add);
      return redirect()->route('admin.profile')->with('success', 'Update success!!!');
    }

  public function active($id){
    if(Users::where('id',$id)->update(['status'=>'Active'])){
      return redirect()->route('admin.user.list')->with('success', 'Update success..');
    }else{
      return redirect()->back()->withErrors(['msg' => 'Can not empty name..']);
    }
  }

  public function deactive($id){
    if(Users::where('id',$id)->update(['status'=>'Deactive'])){
      return redirect()->route('admin.user.list')->with('success', 'Update success..');
    }else{
      return redirect()->back()->withErrors(['msg' => 'Can not empty name..']);
    }
  }

}