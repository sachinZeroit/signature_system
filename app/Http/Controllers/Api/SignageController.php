<?php 

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Edit_schedule;
use Illuminate\Support\Facades\Response;
use App\Models\Users;
use App\Models\Signage;
use App\Models\Playlist;
use App\Models\Mwdia_file;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\redirect;
use Hash;

class SignageController extends Controller{

    public function get_signage(){

        $setdat['status']='error';
        $setdat['msg']='no data found...';

        $signages = Signage::orderBy('id','asc')->get();
        if($signages->isEmpty()){
            $setdat['msg']='Signage is no record...';
            return Response::json($setdat);
        }

        $setdat['status']='success';
        $setdat['msg']='fetch data successfully...';
        $setdat['data']= $signages;
        return Response::json($setdat);
    }

        // public function store(Request $request){
        //     $setdat['status']='error';
        //     $setdat['msg']='no data found...';
        //     $user_id=Auth::user()->id;
        //     $user = new Signage;
        //     $user->name = $request->post('name');
        //     $user->pin = $request->post('pin');
        //     $user->user_id = $user_id;
        //     $user->area_installed	= $request->post('area_installed');
        //     $user->save();
        //     $setdat['status']='success';
        //     $setdat['msg']='fetch data successfully...';
        //     $setdat['data']= $user;
        //     return Response::json($setdat);
        // }
            
    public function get_schedule(){
        $setdat['status']='error';
        $setdat['msg']='no data found...';
        $schedule=Edit_schedule::where('start_schedule','days')->orderBy('id','asc')->get();
        if($schedule->isEmpty()){
            $setdat['msg']='Schedule is no record...';
            return Response::json($setdat);
        }    
        
        $setdat['status']='success';
        $setdat['msg']='fetch data successfully...';
        $setdat['data']= $schedule;
        return Response::json($setdat);
    }
 
}