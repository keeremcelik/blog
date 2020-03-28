<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Redirect;
class PostController extends Controller
{
	function postlist(){
		$posts            =  Post::orderBy('status','asc')->orderBy('id','desc')->paginate(12);
		return view('/panel/post/post',[        
			'posts'       => $posts

		]);
	}
	function newpost(){
		$categories       =  Category::where('status','=','1')->limit(5)->orderBy('name','desc')->get();
		return view('/panel/post/newpost',[  
			'categories'       => $categories

		]);
	}
	function addpost(Request $request){
		$lastpost = Post::max('id');


		$this->validate($request, [
			'customFile'		=>'required',
			'customFile.*'	=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);

		if($request->hasfile('customFile')){
			foreach ($request->file('customFile') as $image) {
				$fileName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
				$name = $fileName."-".time().".".$image->getClientOriginalExtension();
				$image->move('storage/img/posts/',$name);
				$data[]=$name;
			}
		}
		
		$post = new Post;

		$post->user_id = 1;
		$post->cat_id = $request->input('category');
		$post->title = $request->input('title');
		$post->sef_url = $request->input('title');
		$post->abstract = $request->input('abstract');
		$post->content = $request->input('content');
		$post->keywords = $request->input('keywords');
		$post->coverimg = $data[0];
		$post->img = json_encode($data);
		$post->date = date('Y-m-d H:i:s');
		$post->hit = 0;
		$post->status = 1;
		$post->save();

		$posts            =  Post::where('status','=','1')->limit(12)->orderBy('id','desc')->get();

		return redirect('/panel/posts/list');
	}
	function editlist($id){
		
		$posts            =  Post::where('id','=',$id)->first();
		$categories       =  Category::where('status','=','1')->limit(5)->orderBy('name','desc')->get();
		$images           = json_decode($posts->img,true);

		return view('/panel/post/editpost',[        
			'posts'       => $posts,
			'categories'       => $categories,
			'images'       => $images

		]);
	}
	function imgcontrol($id,$index){
		$post = Post::find($id);		
		$images = json_decode($post->img,true);

		if(isset($images[$index])){
			return true;
		}
		else{
			return false;
		}
	}

	function coverimg($id,$img){
		$post = Post::find($id);
		
		$images = json_decode($post->img,true);

		if($this->imgcontrol($id,$img)){
			$post->coverimg = $images[$img];
			$post->save();
		}

		return redirect('/panel/posts/edit/'.$id);	
	}
	function delimg($id,$img){
		$post = Post::find($id);
		
		$images = json_decode($post->img,true);


		if($this->imgcontrol($id,$img)){

			array_splice($images, $img,1);

			

			$images = json_encode($images);

			
			$post->img = $images;
			$post->save();
		}

		return redirect('/panel/posts/edit/'.$id);	
	}
	function editpost(Request $request,$id){
		$post = Post::find($id);
		

		$this->validate($request, [
			'customFile.*'	=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);



		

		$post->cat_id = $request->input('category');
		$post->title = $request->input('title');
		$post->sef_url = $request->input('title');
		$post->abstract = $request->input('abstract');
		$post->content = $request->input('content');
		$post->keywords = $request->input('keywords');

		if($request->hasfile('customFile')){

			foreach ($request->file('customFile') as $image) {
				$fileName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
				$name = $fileName."-".time().".".$image->getClientOriginalExtension();
				$image->move('storage/img/posts/',$name);
				$data[]=$name;
			}
			$oldimg = json_decode($post->img);
			
			$imgdata = array_merge($oldimg,$data);
			
			$post->img = json_encode($imgdata);
		}


		$post->date = date('Y-m-d H:i:s');	
		$post->save();

		return redirect('/panel/posts/list');
	}

	function delete(Request $request){

		$id = $request->input('id');
		$post = Post::find($id);
		$status =$post->status;
		if($status==1){
			$post->status = 2;
		}
		else if($status==2){
			$post->status = 1;
		} 
		$post->save();

		return redirect('/panel/posts/list');




		$id = $request->input('id');
		$status = $request->input('status');

		$data = array('status'=>$status);
		Post::updateData($id,$data);
		echo "başarılı";
		echo $id;
		exit();
		$post = Post::find($id);
		$post->status ='2';
		$post->save();
		
		return json_encode("update");

	}
}
