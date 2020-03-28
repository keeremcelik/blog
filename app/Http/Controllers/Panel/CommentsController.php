<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Redirect;

class CommentsController extends Controller
{
    function commentlist(){
		$comments         =  Comment::limit(12)->orderBy('id','desc')->get();
		$posts            =  Post::where('status','=','1')->get();
		return view('/panel/comment/comment',[        
			'comments'    => $comments,
			'posts'       => $posts

		]);
	}
	function delete(Request $request){

		$id = $request->input('id');
		$comment = Comment::find($id);
		$status =$comment->status;
		if($status==1){
			$comment->status = 2;
		}
		else if($status==2){
			$comment->status = 1;
		} 
		$comment->save();

		return redirect('/panel/comments/list');

	}
}
