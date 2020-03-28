<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PersonalSetting;
use App\SiteSetting;
use App\Social;
use App\Post;
use App\Project;
use App\Category;
use App\Ability;
use App\Contact;
use Redirect;

class PersonalController extends Controller
{
    function index2(){	
    	$personal 		= PersonalSetting::where('id','=','1')->get();	
    	$social 		= Social::where('id','=','1')->get();
    	$ss 			= SiteSetting::where('id','=','1')->get();
    	$category 		= Category::where('status','=','1')->get();
    	$abilities 		= Ability::where('status','=','1')->get();
    	$projects 		= Project::where('status','=','1')->get();
    	$posts 			= Post::where('status','=','1')->orderBy('id','desc')->limit(4)->get();

		foreach ($projects as $project){ 
			$img = json_decode($project->img,true);	
		}
		return view('/personal/index',[
			'socials'		=> $social,
			'categories' 	=> $category,
			'personal' 		=> $personal,
			'ss'			=> $ss,
			'abilities'		=> $abilities,
			'projects'		=> $projects,
			'posts'			=> $posts
			
		]);
	}

	 function index(){
		$personal            =  PersonalSetting::orderBy('id','desc')->first();		
		return view('/panel/settings/personal',[        
			'personal'       => $personal
		]);
	}
	function update(Request $request){
		$personal = PersonalSetting::find(1);
		
		$personal->name = $request->input('name');
		$personal->degree = $request->input('degree');	
		$personal->email = $request->input('email');	
		$personal->phone = $request->input('phone');	
		$personal->address = $request->input('address');	
		$personal->save();

		return redirect('/panel/settings/personal');
	}
	
}
