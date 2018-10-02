<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//use Session;

class ImageController extends Controller
{
    public function store(Request $req){
    	if($req->hasFile('upload_file')){
    		//dd($req->file('upload_file'));
    		foreach ($req->file('upload_file') as $key => $image) {
    			$type = $image->getClientOriginalExtension();
    			$name = str_random(40).'.'.$type;
    			$image->move(public_path().'/images/', $name);

    		}
    		session(['success' => 'Upload Success']);
    		return back();
    	}
    }
}
