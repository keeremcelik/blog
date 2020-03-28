<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteSetting;
use Redirect;

class SiteSettingController extends Controller
{
    function index(){
		$ss            =  SiteSetting::orderBy('id','desc')->first();		
		return view('/panel/settings/general',[        
			'ss'       => $ss
		]);
	}
	function update(Request $request){
		$ss = SiteSetting::find(1);
		
		$ss->site_name = $request->input('site_name');
		$ss->title = $request->input('title');	
		$ss->description = $request->input('description');	
		$ss->keywords = $request->input('keywords');	
		$ss->googleid = $request->input('googleid');	
		$ss->googlecode = $request->input('googlecode');	
		$ss->googlemap = $request->input('googlemap');	
		$ss->save();

		return redirect('/panel/settings/general');
	}
}
