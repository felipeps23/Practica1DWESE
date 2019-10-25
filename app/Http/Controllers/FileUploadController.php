<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    
    function subir(){
      return view('base.subir');  
    }
    
    function upload (Request $request){
        if($request->hasFile('file') && $request->file('file')->isValid()){
          $file = $request -> file ('file');
          $target = '../../../upload';
          $name = date('YmdHis') . $file->getClientOriginalName();
          $file->move($target, $name);
        }
        //return view('base.subir');
        return redirect('subir');
        //return response()->file($target . $name);
        

    }
    
    
    function ver ($archivo) {
      $array = [
        '1' => '1.png',
        '2' => '2.jpg'
        ];
        $mostrar = 'default.jpg';
        if(isset($array[$archivo])){
          $mostrar = $array[$archivo];
        }
        return response()->file('../../../upload/' . $mostrar);
                
    }
    
    function ver2 (Request $request, $archivo) {
                
    }
    

}
