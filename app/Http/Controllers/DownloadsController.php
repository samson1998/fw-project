<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curriculum;
use App\Assignment;

class DownloadsController extends Controller
{


//     public function submission($id){
//       $file = 

//   }
    //Download Data Science Curriculum
    public function download($id) {
      $file = Curriculum::find($id);
      $file_name = $file->file;
      $pathToFile = public_path('storage/files/'.$file_name);
      return response()->download($pathToFile);
  }

//   public function websyllabus() {
//       $file = Curriculum::find(2);
//       $file_name = $file->file;
//       $pathToFile = public_path('storage/files/'.$file_name);
//       return response()->download($pathToFile);
//   }

//   public function productsyllabus() {
//       $file = Curriculum::find(3);
//       $file_name = $file->file;
//       $pathToFile = public_path('storage/files/'.$file_name);
//       return response()->download($pathToFile);
//   }

//   public function mobilesyllabus() {
//       $file = Curriculum::find(4);
//       $file_name = $file->file;
//       $pathToFile = public_path('storage/files/'.$file_name);
//       return response()->download($pathToFile);
//   }

  

 
}
