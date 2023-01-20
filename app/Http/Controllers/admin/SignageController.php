<?php 

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Edit_schedule;
use App\Models\Users;
use App\Models\Signage;
use App\Models\Media_file;
use App\Models\Playlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\redirect;
use Hash;

class SignageController extends Controller{
//
public function index(){
    $signages = Signage::orderBy('id','asc')->get();
       return view('admin.signage.list',compact('signages'));
    }
    public function store(Request $request){
      $user_id=Auth::user()->id;
        $user = new Signage;
        $user->name = $request->input('name');
        $user->pin = $request->input('pin');
        $user->user_id = $user_id;
        $user->area_installed	= $request->input('area_installed');
        $user->save();
        return redirect()->back()->with('success', 'add successful!!!');
        }

        public function active($id){
            if(Signage::where('id',$id)->update(['status'=>'Active'])){
              return redirect()->to('/admin/signage')->with('success', 'Signage Active...');
            }else{
              return redirect()->back()->withErrors(['msg' => 'Can not empty name..']);
            }
          }
        
          public function deactive($id){
            if(Signage::where('id',$id)->update(['status'=>'Deactive'])){
              return redirect()->to('/admin/signage')->with('success', 'Signage Deactive...');
            }else{
              return redirect()->back()->withErrors(['msg' => 'Can not empty name..']);
            }
          }
          
          public function live($id){
            if(Signage::where('id',$id)->update(['live_status'=>'live'])){
              return redirect()->to('/admin/signage')->with('success', 'Signage Live done...');
            }else{
              return redirect()->back()->withErrors(['msg' => 'Can not empty name..']);
            }
          }
        
          public function offline($id){
            if(Signage::where('id',$id)->update(['live_status'=>'offline'])){
              return redirect()->to('/admin/signage')->with('success', 'Signage Off line done...');
            }else{
              return redirect()->back()->withErrors(['msg' => 'Can not empty name..']);
            }
          }
          

          public function edit($id){
          
          $signage = Signage::find($id);
          return response()->json([
            'status' =>200,
            'signage' =>$signage,
          ]);
          }
          public function update(Request $request){
            $user_id=Auth::user()->id;
            $id = $request->input('id');
            $signage = Signage::find($id);
            $signage->name = $request->input('name');
            $signage->pin = $request->input('pin');
            $signage->user_id = $user_id;
            $signage->area_installed = $request->input('area_installed');
            $signage->update();
            return redirect()->back()->with('success', 'Update successful!!!');
              } 
              public function delete($id){
                $signage = Signage::where('id', $id)->firstorfail()->delete();
                return redirect()->to('admin/signage')->with('success', 'delete success..');
              }

              public function edit_schedule($id){
                $playlists=Playlist::get();   
                $users=Users::get();   
                
                $signages=Signage::where('id',$id)->first();    
                $schedule=Edit_schedule::get();    
                //echo json_encode($schedule);die;
               return view('admin.signage.edit_schedule',compact('schedule','signages','playlists','users'));
            }
        
            public function edit_update(Request $request,$id){
              $user_id=Auth::user()->id;
              //var_dump($user_id);die;
                $playlist_id=$request->playlist_id;
                $start_schedule=$request->start_schedule;
                $days=$request->days;
                $daterange=$request->daterange;
                $schedule_id=$request->schedule_id;
                $signages=Signage::where('id',$id)->first();
//var_dump(123);die;
                

                  foreach($playlist_id as $ky => $vl){
                         
                $data_add=['playlist_id'=>$vl,
                'signage_id'=>$id,
                'start_schedule'=>$start_schedule,
                'days'=>$days,
                'daterange'=>$daterange,
                'user_id' =>$user_id,
                ];
                //echo json_encode($data_add);die;
                $schedule=Edit_schedule::where('id', $schedule_id[$ky] )->first();
                if(!empty($schedule)){
                  Edit_schedule::where('id', $schedule->id)->update($data_add);
                }else{
                  Edit_schedule::insert($data_add);
                }
             }
             //echo json_encode($data_add);die;
               return redirect()->to('admin/signage')->with('success', 'Update success!!!');
            
            }

            public function signage_media($id){
              $edit_schedule= Edit_schedule::with('playlist')->where('signage_id',$id)->get();
              //echo json_encode($edit_schedule);die;
              
    $playlist=[];
   
    if(!$edit_schedule->isEmpty()){
      foreach($edit_schedule as $vl){
            if(!empty($vl->playlist)):
            $playlist_list[]=$vl->playlist->id;
            endif;
        }
    }
   
   if(!empty($playlist_list)){
     $media_data=Media_file::whereIn('playlist_id',$playlist_list)->where('playlist_type','playlist')->get();
     
     if(!$media_data->isEmpty()){
      foreach($media_data as $vl){
        $pls=Playlist::where('id',$vl->playlist_id)->first();
        
        $playlist[]=[
          'id'=>$vl->id,
        'playlist_id'=>$vl->playlist_id,
        'name'=>$pls->name,
        'slidechangetime'=>$pls->slidechangetime,
        'media_id'=>$vl->id,
        'url'=>$vl->url,
        'type'=>$vl->type,
        ];
        
        }
    }
   }
   return view('admin.signage.signage_preview',compact('playlist'));    
            }

            public function media_delete($id){
              $playlist = Media_file::where('id', $id)->firstorfail()->delete();
              return redirect()->to('admin/signage/id/preview')->with('success', 'delete success..');
            }
            }
