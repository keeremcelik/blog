<?php

namespace App\Http\Controllers\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Post;
use App\Social;
use App\Category;
use App\PersonalSetting;
use App\SiteSetting;
class CategoryController extends Controller
{
   function index($id,$slug=''){  
    	$categories = Category::where('status','=','1')->get();
    	$category 	= Category::where('id','=',$id)->get();
   		$posts 		= Post::with('category','user')->where('cat_id','=',$id)->where('status','=','1')->orderBy('id','desc')->limit(5)->get();
		$social 	= Social::where('status','=','1')->get();
		$personal 	= PersonalSetting::where('id','=','1')->get(); 		
		$ss 		= SiteSetting::where('id','=','1')->get();	

		return view('/blog/category',[
			'socials' 		=> $social,
			'personal' 		=> $personal,
			'ss'			=> $ss,
			'posts'			=> $posts,
			'categories'	=> $categories,
			'category'	 	=> $category
		]);
	}
}
