<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use File;

class ImageController extends Controller
{
     public function index($id)
    {
    	$user= User::find($id);
    	return view('admin.escuelas.images.index')->with(compact('user'));
    }

     public function store(Request $request, $id)
    {

//         $this->validate($request, [
//     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=500,height=500',
// ]);
    	// guardar la img en nuestro proyecto
    	$file = $request->file('photo');
    	$path = public_path() . '/images/users';
	    $fileName = uniqid() . $file->getClientOriginalName();
    	$moved = $file->move($path, $fileName);     	
    	
    	// crear 1 registro en la tabla product_images
    	if ($moved) 
    	{
	    	$user= User::find($id); 
	    	$user->avatar= $fileName;
	    	$user->save(); 	
    	}

    	return back();
    }	

    public function destroy(Request $request, $id)
    {
    	// eliminar el archivo
    	$user= User::find($id);     	
    	$fullPath = public_path() . '/images/users/' . $user->avatar;
    	$deleted = File::delete($fullPath);
    	$user->avatar='default.jpg';
    	$user->save();
    	 	
    	return back();
    }

     public function indexD($id)
    {
        $user= User::find($id);
        return view('escuela.docentes.images.index')->with(compact('user'));
    }

     public function indexA($id)
    {
        $user= User::find($id);
        return view('escuela.alumnos.images.index')->with(compact('user'));
    }
}
