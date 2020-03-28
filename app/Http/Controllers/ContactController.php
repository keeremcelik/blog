<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Contact;
use App\Social;
use App\Category;
use App\PersonalSetting;
use App\SiteSetting;

class ContactController extends Controller
{
     function index(){	

    	$social 		= 	Social::where('status','=','1')->get();
		$personal 		= 	PersonalSetting::where('id','=','1')->get(); 		
		$ss 			= 	SiteSetting::where('id','=','1')->get();	    	
    	$category 		= 	Category::where('status','=','1')->get();  	


		return view('/blog/contact',[
			'socials'		=> $social,
			'categories' 	=> $category,
			'personal' 		=> $personal,
			'ss'			=> $ss
			
		]);
	}
	function list(){
		$mails 		= 	Contact::orderBy('status','asc')->orderBy('id','desc')->get();
		return view('/panel/message/message',[
			'mails'		=> $mails
			
		]);
	}
		function sendMail(Request $request){  

		$name 		= $request->input('name');
		$subject 	= $request->input('subject');
		$content 	= $request->input('content');

		$mail = new Contact;
		$mail->name = $name;
		$mail->subject = $subject;
		$mail->content = $content;
		$mail->date = date('Y-m-d H:i:s');
		$mail->status = 1;
		$mail->save();
	
		return redirect('/blog/contact');

	}

	public function delete(Request $request){

		$id = $request->input('id');

		$message = Contact::find($id);

	  	$status =$message->status;
	  	if($status==1){
			$message->status = 2;
	  	}
	  	else if($status==2){
			$message->status = 1;
	  	} 
		$message->save();

		return redirect('/panel/messages/list');
	}

	public function pull($id){
	

		$message   =  Contact::where('id',$id)->first();

		return response()->json($message);


	}

}
