<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Redirect;

class CategoryController extends Controller
{
	public function pull($id){
		$categories   =  Category::where('id',$id)->first();
		return response()->json($categories);


	}

	public function new(Request $request){

		$category = new Category;

		$category->name = $request->input('name');
		$category->sef_url = $request->input('sef_url');
		$category->keywords = $request->input('keywords');
		$category->description = $request->input('description');
		$category->date = date('Y-m-d H:i:s');
		$category->status = 1;
		$category->save();

		$categories   =  Category::orderBy('id','desc')->first();

		return response()->json($categories);

	}

	function index(){
		$categories            =  Category::orderBy('status','asc')->get();
		
		return view('/panel/category/category',[        
			'categories'       => $categories

		]);
	}    

	
		public function update(Request $request){

		$id = $request->input('id');
		$name = $request->input('name');
		$sef_url = $request->input('sef_url');
		$keywords = $request->input('keywords');
		$description = $request->input('description');
		$date = date('Y-m-d H:i:s');			
		
		$category = Category::find($id);
		$category->name=$name;
		$category->sef_url=$sef_url;		
		$category->keywords=$keywords;		
		$category->description=$description;		
		$category->date=$date;		
		$category->save();
		return redirect('/panel/categories/list');
	}
	
	
	function delete(Request $request){
		$id = $request->input('id');

		$category = Category::find($id);

	  	$status =$category->status;
	  	if($status==1){
			$category->status = 2;
	  	}
	  	else if($status==2){
			$category->status = 1;
	  	} 
		$category->save();

		return redirect('/panel/categories/list');
	}
}
