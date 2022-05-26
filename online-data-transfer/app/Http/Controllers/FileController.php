<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            if (!empty($request->file)) {
                $file = $request->file;
                $file->store('public');
                $title = $request->title;
                $filename = $file->getClientOriginalName();
                $rmail = $request->rmail;
                $smail = $request->smail;
                $msg = $request->rmail;
                $code = mt_rand(111111, 999999);
                $savename = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 20) . $file->getClientOriginalExtension();
                $link = $savename;
                DB::insert('insert into share_files 
                (name,recipient_email,path,sender_name,subject,message,sharable_link,created_at,updated_at) 
                values (?, ?,?,?,?,?,?,?,?)', [$filename, $rmail, "",]);
                return 'Upload Successful.';
            }
        } else {

            return "No Files Selected";
        }
    }
    // public function download($path){
    //     // DB::select('select * from share_files where')

    // }
}
