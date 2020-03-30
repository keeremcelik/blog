<?php

namespace App\Http\Controllers\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Social;
use App\Category;
use App\PersonalSetting;
use App\SiteSetting;

class IndexController extends Controller
{
 function index(){
 		$posts 		= Post::with('category','user')->where('status','=','1')->orderBy('id','desc')->limit(12)->get();
 		$other 		= Post::with('category','user')->where('status','=','1')->orderBy('id','desc')->limit(4)->get();
 		$random		= Post::with('category','user')->where('status','=','1')->inRandomOrder()->limit(3)->get();
 		$last		= Post::with('category','user')->where('status',1)->orderBy('id','desc')->limit(1)->get();
 		$social 	= Social::where('status','=','1')->get();
		$category 	= Category::where('status','=','1')->get();
		$personal 	= PersonalSetting::where('id','=','1')->first(); 		
		$ss 		= SiteSetting::where('id','=','1')->get();	
	

		return view('/blog/index',[
			'socials' 		=> $social,
			'personal' 		=> $personal,
			'random' 		=> $random,
			'ss'			=> $ss,
			'posts'			=> $posts,
			'others'		=> $other,
			'last'			=> $last,
			'categories'	=> $category
		]);
	}
}
