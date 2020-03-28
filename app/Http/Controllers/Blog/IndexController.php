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
 		$manset		= Post::with('category','user')->where('status',1)->orderBy('id','desc')->limit(5)->get();
 		$social 	= Social::where('status','=','1')->get();
		$category 	= Category::where('status','=','1')->get();
		$personal 	= PersonalSetting::where('id','=','1')->get(); 		
		$ss 		= SiteSetting::where('id','=','1')->get();	
	

		return view('/blog/index',[
			'socials' 		=> $social,
			'personal' 		=> $personal,
			'ss'			=> $ss,
			'posts'			=> $posts,
			'manset'		=> $manset,
			'categories'	=> $category
		]);
	}
}
