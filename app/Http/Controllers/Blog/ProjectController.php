<?php

namespace App\Http\Controllers\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
   		$otherproject	= 	Project::where('id','!=',$id)->where('status','=','1')->orderBy('id','desc')->limit(3)->get();
		$social 		= 	Social::where('status','=','1')->get();
		$personal 		= 	PersonalSetting::where('id','=','1')->get(); 		
		$ss 			= 	SiteSetting::where('id','=','1')->get();	

		return view('/blog/projects',[
			'socials' 		=> $social,
			'personal' 		=> $personal,
			'ss'			=> $ss,
			'projects'		=> $projects,
			'otherprojects'	=> $otherproject,
			'categories'	=> $categories,
			'images'		=> $img
		]);
	}

	
	function pull(){  
		$categories = Category::where('status','=','1')->get();
  		$projects	= Project::where('status','=','1')->orderBy('id','desc')->limit(5)->get();
  		$social 	= Social::where('status','=','1')->get();
		$personal 	= PersonalSetting::where('id','=','1')->get(); 		
		$ss 		= SiteSetting::where('id','=','1')->get();	

		return view('/blog/project',[
			'socials' 		=> $social,
			'personal' 		=> $personal,
			'ss'			=> $ss,
			'projects'		=> $projects,
			'categories'	=> $categories
		]);
	}
}
