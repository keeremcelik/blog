<?php

namespace App\Http\Controllers\Panel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use Auth;

class LoginController extends Controller
{
	function login(){
		

		return view('/panel/login');
		
	}

	function checklogin(Request $request){
		if ($request->method() == 'POST') {
			$this->validate($request, [
				'email'   =>  'required|email',
				'password'  =>  'required|alphaNum|min:3'
			]);

			$user_data =array(
				'email'   =>$request->get('email'),
				'password'  =>$request->get('password')

			);

			if(Auth::attempt($user_data)){
				return redirect('/panel/index');
			}
			else{
				return back()->with('error','Yanlış bilgiler');
				return redirect('/panel');
			}
		}
		else{
				return redirect('/panel');
		}
	}

	function successlogin(){

		return view('/panel/index');
	}

	function logout(){
		Auth::logout();
		return Redirect::to('/panel');
	}
}
