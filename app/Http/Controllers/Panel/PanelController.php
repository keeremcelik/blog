<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Redirect;
use App\Comment;
use File;
use App\Post;
use App\Project;
use App\Category;
use App\Contact;


class PanelController extends Controller
{
	function index(){
		$countcomment     = Comment::where('status','=','1')->count();
		$countpost        = Post::where('status','=','1')->count();
		$countproject     = Project::where('status','=','1')->count();
		$countmails       = Contact::where('status','=','1')->count();

		$comments         =  Comment::where('status','=','1')->limit(5)->orderBy('id','desc')->get();
		$mails            =  Contact::where('status','=','1')->limit(5)->orderBy('id','desc')->get();
		$posts            =  Post::where('status','=','1')->limit(5)->orderBy('id','desc')->get();

		return view('/panel/index',[
			'countcomment'       => $countcomment,
			'countpost'          => $countpost,
			'countproject'       => $countproject,
			'countmails'       => $countmails,
			'comments'       => $comments,
			'mails'       => $mails,
			'posts'       => $posts,

		]);
	}

	
}
