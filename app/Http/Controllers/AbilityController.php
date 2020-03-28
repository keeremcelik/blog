<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ability;
use Redirect;

class AbilityController extends Controller
{
	public function pull($id){
	

		$abilities   =  Ability::where('id',$id)->first();

		return response()->json($abilities);


	}
	public function new(Request $request){

		$ability = new Ability;

		$ability->name = $request->input('name');
		$ability->rate = $request->input('rate');
		$ability->status = 1;
		$ability->save();

		$abilities   =  Ability::orderBy('id','desc')->first();

		return response()->json($abilities);

	}

     function index(){
		$abilities            =  Ability::orderBy('status','asc')->orderBy('id','desc')->get();
		
		return view('/panel/ability/ability',[        
			'abilities'       => $abilities

		]);
	}

	
	public function update(Request $request){
		$id = $request->input('id');
		$name = $request->input('name');
		$rate = $request->input('rate');	
		
		$ability = Ability::find($id);
		$ability->name=$name;
		$ability->rate=$rate;		
		$ability->save();
		return redirect('/panel/abilities/list');
	}
	
	
	function delete(Request $request){
		$id = $request->input('id');

		$ability = Ability::find($id);

	  	$status =$ability->status;
	  	if($status==1){
			$ability->status = 2;
	  	}
	  	else if($status==2){
			$ability->status = 1;
	  	} 
		$ability->save();

		return redirect('/panel/abilities/list');
	}
}
