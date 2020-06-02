<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Image;

class FileUpload extends Controller {
  // Image upload form
  public function createForm(){
    return view('image-upload');
  }

  // Handle image uploading
  public function fileUpload(Request $req){
      
      // Image validation
      $this->validate($req, [
        'imageFile' => 'required|max:2048',
        'imageFile.*' => 'mimes:jpg,jpeg,png,gif'
      ]);      
      
      if($imageFiles = $req->file('imageFile')){
          foreach($imageFiles as $file) {
            $name = $file->getClientOriginalName();
            $path = $file->storeAs('photos', $name);
              if($file->move($path, $name)) {
                $save   =   Image::create([
                  'name' => $name,
                  'image_path' => $path
                ]);
              }
          }
          return back()->with("success", "File has been uploaded.");
      }
   }
}