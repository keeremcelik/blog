<?php

namespace App\Http\Controllers\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Project;
use App\Social;
use App\Category;
use App\PersonalSetting;
use App\SiteSetting;

class ProjectController extends Controller
{
	function index($id,$slug=''){ 
  		$categories 	= 	Category::where('status','=','1')->get();  	

   		$projects		= 	Project::where('id','=',$id)->first();
   		$img			=	json_decode($projects->img,true); 
   		$others			= 	Project::where('status','=','1')->orderBy('id','desc')->limit(4)->get();
		$social 		= 	Social::where('status','=','1')->get();
		$personal 		= 	PersonalSetting::where('id','=','1')->get(); 		
		$ss 			= 	SiteSetting::where('id','=','1')->get();	
	$random		= Post::with('category','user')->where('status','=','1')->inRandomOrder()->limit(3)->get();
	$posts 		= Post::with('category','user')->where('status','=','1')->orderBy('id','desc')->limit(12)->get();
		return view('/blog/projects',[
			'socials' 		=> $social,
			'personal' 		=> $personal,
'random' 		=> $random,
	'posts' 		=> $posts,
			'ss'			=> $ss,
			'projects'		=> $projects,
			'others'	=> $others,
			'categories'	=> $categories,
			'images'		=> $img
		]);
	}

	
	function pull(){  
		$categories = Category::where('status','=','1')->get();
  		$projects	= Project::where('status','=','1')->orderBy('id','desc')->limit(12)->get();
  		$social 	= Social::where('status','=','1')->get();
		$personal 	= PersonalSetting::where('id','=','1')->get(); 		
		$ss 		= SiteSetting::where('id','=','1')->get();	
	$random		= Post::with('category','user')->where('status','=','1')->inRandomOrder()->limit(3)->get();
	$last		= Project::where('status',1)->orderBy('id','desc')->limit(1)->get();
	$posts 		= Post::with('category','user')->where('status','=','1')->orderBy('id','desc')->limit(12)->get();
		return view('/blog/project',[
			'socials' 		=> $social,
			'last' 		=> $last,
			'posts' 		=> $posts,
			'personal' 		=> $personal,
			'ss'			=> $ss,
			'projects'		=> $projects,
			'random' 		=> $random,
			'categories'	=> $categories
		]);
	}
}
