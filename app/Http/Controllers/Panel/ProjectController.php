<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
use App\Category;
use Redirect;

class ProjectController extends Controller
{
	function projectlist(){
		$projects            =  Project::orderBy('status','asc')->orderBy('id','desc')->get();
		return view('/panel/project/project',[        
			'projects'       => $projects

		]);
	}
	function newproject(){
		return view('/panel/project/newproject',[  
			

		]);
	}
	function addproject(Request $request){
		$lastproject = Project::max('id');		

		$this->validate($request, [
			'customFile'		=>'required',
			'customFile.*'	=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);

		if($request->hasfile('customFile')){
			foreach ($request->file('customFile') as $image) {
				$fileName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
				$name = $fileName."-".time().".".$image->getClientOriginalExtension();
				$image->move('storage/img/projects/',$name);
				$data[]=$name;
			}
		}
		
		$project = new Project;

		$project->type = $request->input('type');
		$project->name = $request->input('name');
		$project->sef_url = $request->input('name');
		$project->content = $request->input('content');
		$project->coverimg = $data[0];
		$project->img = json_encode($data);
		$project->date = date('Y-m-d H:i:s');
		$project->infrastructure = $request->input('infrastructure');
		$project->keywords = $request->input('keywords');
		$project->hit = 0;
		$project->status = 1;
		$project->save();

		$project            =  Project::where('status','=','1')->limit(12)->orderBy('id','desc')->get();

		return redirect('/panel/projects/list');
	}

	function delete(Request $request){

		$id = $request->input('id');
		$project = Project::find($id);
		$status =$project->status;
		if($status==1){
			$project->status = 2;
		}
		else if($status==2){
			$project->status = 1;
		} 
		$project->save();

		return redirect('/panel/projects/list');

	}

	function editlist($id){
		
		$projects         =		Project::where('id','=',$id)->first();
		$categories       =		Category::where('status','=','1')->limit(5)->orderBy('name','desc')->get();
		$images           =		json_decode($projects->img,true);

		return view('/panel/project/editproject',[        
			'projects'       => $projects,
			'categories'       => $categories,
			'images'       => $images

		]);
	}
	function editproject(Request $request,$id){
		$project = Project::find($id);
		

		$this->validate($request, [
			'customFile.*'	=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);

		$project->type = $request->input('type');
		$project->name = $request->input('name');
		$project->sef_url = $request->input('name');
		$project->content = $request->input('content');
		$project->infrastructure = $request->input('infrastructure');
		$project->keywords = $request->input('keywords');


		if($request->hasfile('customFile')){

			foreach ($request->file('customFile') as $image) {
				$fileName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
				$name = $fileName."-".time().".".$image->getClientOriginalExtension();
				$image->move('storage/img/projects/',$name);
				$data[]=$name;
			}
			$oldimg = json_decode($project->img);
			
			$imgdata = array_merge($oldimg,$data);
			
			$project->img = json_encode($imgdata);
		}


		$project->date = date('Y-m-d H:i:s');	
		$project->save();

		return redirect('/panel/projects/list');
	}
	function imgcontrol($id,$index){
		$project = Project::find($id);		
		$images = json_decode($project->img,true);

		if(isset($images[$index])){
			return true;
		}
		else{
			return false;
		}
	}
	function coverimg($id,$img){
		$project = Project::find($id);
		
		$images = json_decode($project->img,true);

		if($this->imgcontrol($id,$img)){
			$project->coverimg = $images[$img];
			$project->save();
		}

		return redirect('/panel/projects/edit/'.$id);	
	}
	function delimg($id,$img){
		$project = Project::find($id);
		
		$images = json_decode($project->img,true);


		if($this->imgcontrol($id,$img)){

			array_splice($images, $img,1);

			

			$images = json_encode($images);

			
			$project->img = $images;
			$project->save();
		}

		return redirect('/panel/projects/edit/'.$id);	
	}
}
