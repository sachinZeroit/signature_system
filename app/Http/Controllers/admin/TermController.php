<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\redirect;

class TermController extends Controller
{
    //

public function index(){
    $term = Term::orderBy('id','asc')->get();
       return view('admin.term.list',compact('term'));
    }

    public function add(){
        return view('admin.term.add');
    }

    public function store(Request $request){
        $this->validate(request(), [
        'name' => 'required',
        'content' => 'required',
        ]);
    
        $data_add=['name'=>$request->name,
        'content'=>$request->content,
        ];
        //echo json_encode($user_id);die;
    
        if(Term::insert($data_add)){
          return redirect()->to('admin/term')->with('success', 'add user success..');
        }
          return redirect::back()->withErrors(['msg' => 'add user failed..']);
      }  

      
  public function edit($id){
    $term=Term::where('id',$id)->first();
      return view('admin.term.edit',['term'=>$term]);
  }

  public function delete($id){
    $term = Term::where('id', $id)->firstorfail()->delete();
      return redirect()->to('admin/term/');
  }

  public function update(Request $request,$id){
    //$name=$request->post('name');
    $name=$request->name;
    $content=$request->content;


    $data_add['name']=$name;
    $data_add['content']=$content; 
 //echo json_encode($name);die;
    Term::where('id', $id)->update($data_add);
      return redirect()->to('admin/term')->with('success', 'Update success!!!');
  }

 

}
