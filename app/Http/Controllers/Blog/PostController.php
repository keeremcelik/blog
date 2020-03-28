<?php

namespace App\Http\Controllers\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use App\Post;
use App\Social;
use App\Category;
use App\PersonalSetting;
use App\SiteSetting;

class PostController extends Controller
{
     function index($id,$slug=''){  //id = 53 slug=gunes-sistemi
    	$categories = Category::where('status','=','1')->get();
    	

   		$posts 		= Post::with('category','user')->where('id','=',$id)->orderBy('id','desc')->limit(5)->get();
   		$img		= json_decode($posts[0]->img,true);   	
   		$comments	= Comment::where('post_id','=',$id)->where('status','=','1')->orderBy('id','desc')->get();
   		$otherpost	= Post::with('category','user')->where('cat_id','=',$posts[0]->cat_id)->where('id','!=',$id)->where('status','=','1')->orderBy('id','desc')->limit(3)->get();	
		$social 	= Social::where('status','=','1')->get();
		$personal 	= PersonalSetting::where('id','=','1')->get(); 		
		$ss 		= SiteSetting::where('id','=','1')->get();	

		return view('/blog/post',[
			'socials' 		=> $social,
			'personal' 		=> $personal,
			'ss'			=> $ss,
			'posts'			=> $posts,
			'otherposts'	=> $otherpost,
			'categories'	=> $categories,
			'comments'		=> $comments,
			'images'		=> $img

		]);
	}
	function addComment(Request $request,$id,$slug){  

		$name = $request->input('name');
		$content = $request->input('comment');

		$post = new Comment;
		$post->post_id = $id;
		$post->name = $name;
		$post->content = $content;
		$post->date = date('Y-m-d H:i:s');
		$post->status = 1;
		$post->save();
	
		return redirect('/blog/post/'.$id.'/'.$slug);

	}
}
