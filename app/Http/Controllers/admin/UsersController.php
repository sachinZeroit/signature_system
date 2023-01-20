<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\redirect;
use Hash;
class UsersController extends Controller
{
  //
  public function user_list(){
    $admin = Users::with('user')->where('role','admin')->orderBy('id','asc')->get();
    $users = Users::with('user')->where('role','users')->orderBy('id','asc')->get();
      return view('admin.user.list', ['users' => $users,'admin' => $admin]);
      //var_dump('fsfsf');die;
  }
  public function user_edit($id){
    $user=Users::where('id',$id)->first();
      return view('admin.user.edit',['user'=>$user]);
  }

  public function user_delete($id){
    $user = Users::where('id', $id)->firstorfail()->delete();
      return redirect()->to('admin/user/list');
  }

  public function user_update(Request $request,$id){
    //$name=$request->post('name');
    $uploadpath='';
    $name=$request->name;
    $role=$request->role;
    $full_name=$request->full_name;
    if(empty($name)){
      return redirect()->back()->withErrors(['msg' => 'Can not empty name..']);
    }  
    $user=Users::where('id',$id)->first();
    if(empty($user)){
      return redirect()->back()->withErrors(['msg' => 'Can not empty name..']);
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
    $data_add['role']=$role;
    $data_add['full_name']=$full_name;
    $data_add['image']=$uploadpath;
 
 //echo json_encode($name);die;
    Users::where('id', $id)->update($data_add);
      return redirect()->route('admin.user.list')->with('success', 'Update success!!!');
  }

     
}