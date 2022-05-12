<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class FileController extends Controller
{
    public function upload(Request $request){
        if ($request->hasFile('file')){
            if (!empty($request->file)) {
                $file = $request->file;
                $file->storeAs('public',$file->getClientOriginalName());
                return 'Upload Successful';
            }
        }else{

            return "No Files Selected";
        }
//        return $request->all();
    }
}
