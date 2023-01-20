<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Media_file;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\redirect;
use Hash;
class PlaylistController extends Controller
{
  public function index(){
    $users=Auth::user();
    if($users->role == 'admin'){
      $playlists = Playlist::orderBy('id','asc')->get();
    }else{
      $playlists=Playlist::with('user')->where('user_id',$users->id)->orderBy('id','desc')->get();
    }
    return view('admin.playlist.list',compact('playlists'));
  }
 
  public function add(){
    return view('admin.playlist.add');
  }

  public function store(Request $request){
    $user_id=Auth::user()->id;
    $name=$request->input('name');
    $slidechangetime=(!empty($request->input('slidechangetime')))?$request->input('slidechangetime'):'0';

    $playlist=Playlist::where('name',$name)->first();
    // if(!empty($playlist)){
    //   return redirect::back()->withErrors(['msg' => 'Playlist name  is already exists, please add different name..']);
    // }

    $request->validate([
      'image' => 'required|max:1000000'
    ]);
  
    // Check file size349641
    // $path=public_path().'/asset/uploads/media/';
    // $allowedfileExtension=['mp4','ogv','webm','jpg','jpeg','gif','png','svg'];
    // if($request->hasFile('image')):
    //   $files=$request->file('image');
    //   foreach($files as $file):
    //     $getSize=$file->getSize();
    //     if(empty($getSize >= 349641)){
    //       return redirect()->back()->withErrors(['msg' => 'please upload large file size ...']);
    //     }
    //   endforeach;
    // endif;

    //var_dump($getSize);die;
    // if($_FILES["image"]["size"] <= 1000000){
    //     echo "Sorry, your file is too Short.";
    //     $uploadOk = 0;
    // }

    //  var_dump($_FILES);die;
    $playlist = new Playlist;
    $playlist->user_id=$user_id;
    $playlist->name=$name;
    $playlist->slidechangetime=$slidechangetime;
    $playlist->save();

    $path=public_path().'/asset/uploads/media/';
    $allowedfileExtension=['mp4','ogv','webm','jpg','jpeg','gif','png','svg'];

    if($request->hasFile('image')):
      $files=$request->file('image');
      foreach($files as $file):
            //$OriginalName=$file->getClientOriginalName();
            $extension =strtolower($file->getClientOriginalExtension());
            $filename=time().rand(1111,9999).'.'.$extension;

            $upload_filename='asset/uploads/media/'.$filename;
            $check=in_array($extension,$allowedfileExtension);
            if($check){

                $file->move($path, $filename);
                $media = new Media_file;
                $media->user_id=$user_id;
                $media->playlist_id=$playlist->id;
                $media->name=$filename;
                $media->type=$extension;
                $media->url=$upload_filename;
                $media->playlist_type='playlist';
                $media->save();
            }
        endforeach;
      endif;
      return redirect()->to('admin/playlist')->with('success','Data Added done...');
  }

  public function active($id){
    if(Playlist::where('id',$id)->update(['status'=>'Active'])){
      return redirect()->to('admin/playlist')->with('success', 'update successful..');
    }else{
      return redirect()->back()->withErrors(['msg' => 'Can not empty name..']);
    }
  }

  public function deactive($id){
    if(Playlist::where('id',$id)->update(['status'=>'Deactive'])){
      return redirect()->to('/admin/playlist')->with('success', 'update successful..');
    }else{
      return redirect()->back()->withErrors(['msg' => 'Can not empty name..']);
    }
  }
  
  public function edit($id){
    $media = Media_file::where('playlist_id',$id)->get();
    $playlist=Playlist::where('id',$id)->first();
      return view('admin.playlist.edit',compact('playlist','media'));
  }

  public function update(Request $request,$id){
    $user_id=Auth::user()->id;
    $playlist = Playlist::find($id);
    if(!empty($playlist)){
      return redirect::back()->withErrors(['msg' => 'Playlist name  is already exists, please add different name..']);
    }
    $playlist->user_id=$user_id;
    $playlist->name = $request->input('name');
    $playlist->slidechangetime = $request->input('slidechangetime');
    $playlist->update();

    $media = Media_file::where('playlist_id',$id)->first();
  
    if(empty($request->file('image')) && empty($media)){
      return back()->with('error', 'Please Upload Media File..'); 
    }

    $path=public_path().'/asset/uploads/media/';
    $allowedfileExtension=['mp4','ogv','webm','jpg','jpeg','gif','png','svg'];

    if($request->hasFile('image')):
      $files=$request->file('image');
      foreach($files as $file):
        //$OriginalName=$file->getClientOriginalName();
        $extension =strtolower($file->getClientOriginalExtension());
        $filename=time().rand(1111,9999).'.'.$extension;
        
        //var_dump($media->user_id=$id);die;
        $upload_filename='asset/uploads/media/'.$filename;
        $check=in_array($extension,$allowedfileExtension);
        if($check){
          $file->move($path, $filename);
          $media = new Media_file;
          $media->user_id=$user_id;
          $media->playlist_id=$id;
          $media->name=$filename;
          $media->type=$extension;
          $media->url=$upload_filename;
          $media->playlist_type='playlist';
          $media->save();
        } 
      endforeach;
    endif;
    return redirect()->to('admin/playlist')->with('success', 'Update success..');   
  }
  
  public function delete($id){
    $playlist = Playlist::where('id', $id)->firstorfail()->delete();
    return redirect()->to('admin/playlist')->with('success', 'delete success..');
  }
  
  public function media_delete($id){
    $playlist = Media_file::where('id', $id)->firstorfail()->delete();
    return redirect()->to('admin/media/id/preview')->with('success', 'delete success..');
  }

  public function media($id){
    $playlists = Playlist::where('id',$id)->get();
    $media = Media_file::where('playlist_id', $id)->get();
    return view('admin.media.preview',compact('playlists','media'));
  }
}

