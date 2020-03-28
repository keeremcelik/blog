<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Social;
use Redirect;

class SocialController extends Controller
{
     function index(){
		$social            =  Social::orderBy('id','desc')->first();		
		return view('/panel/settings/social',[        
			'social'       => $social
		]);
	}
	function update(Request $request){
		$social = Social::find(1);
		
		$social->facebook = $request->input('facebook');
		$social->twitter = $request->input('twitter');	
		$social->instagram = $request->input('instagram');	
		$social->github = $request->input('github');	
		$social->linkedin = $request->input('linkedin');	
		$social->youtube = $request->input('youtube');	
		$social->google = $request->input('google');	
		$social->save();

		return redirect('/panel/settings/social');
	}
	
}
