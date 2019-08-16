<?php


/*namespace App\Http\Controllers;


use Illuminate\Http\Request;


class ImageUploadController extends Controller

{
    function index()
    {
        return view('create');
    }
    
    function upload(Request $request)
    {
        $this->validate($request, [
            'select_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $image = $request->file('select_file');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path("images"), $new_name);
        return back()->with('success', 'Image Uploaded Successfully')->('path', $new_name);
    }
    
}*/

namespace App\Http\Controllers;



use Illuminate\Http\Request;



class ImageUploadController extends Controller

{
    
    /**
     
     * Display a listing of the resource.
     
     *
     
     * @return \Illuminate\Http\Response
     
     */
    
    public function imageUpload()
    
    {
        
        //return view('imageUpload');
        return view('create');
    
    
    }
    
    
    
    /**
     
     * Display a listing of the resource.
     
     *
     
     * @return \Illuminate\Http\Response
     
     */
    
    public function imageUploadPost()
    
    {
        
        request()->validate([
            
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
        ]);
        
        
        
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        
        
        
        request()->image->move(public_path('images'), $imageName);
        
        
        
        return back()
            
            ->with('success','You have successfully upload image.')
            
            ->with('image',$imageName);
        
    }
    
}