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

                // store file 
                $file = $request->file;
                
                // get params from request
                $fid = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ"), 0, 20);
                $tempName = $fid.'.'. $file->getClientOriginalExtension();
                $file->storeAs('public',$tempName);

                $title = $request->title;
                $filename = $file->getClientOriginalName();
                $rmail = $request->rmail;
                $smail = $request->smail;
                $msg = $request->rmail;
                $code = mt_rand(111111, 999999);
                $link = 'https://onlinedatatransfer.com/download/'.$tempName;

                // insert query

                // DB::insert('insert into share_files 
                // (title,fid,recipient_email,sender_email,message,code,sharable_link,created_at,updated_at) 
                // values (?, ?,?,?,?,?,?,?,?)', [$title,$fid, $rmail, $smail,$msg,$code,$link,now(),now()]);
                
                DB::table('share_files')->insert([
                    'title' =>  $title,
                    'fid' =>  $fid,
                    'filename' =>  $filename,
                    'recipient_email' =>  $rmail,
                    'sender_email' =>  $smail,
                    'message' =>  $msg,
                    'code' =>  $code,
                    'sharable_link' =>  $link,
                    'created_at' =>  now(),
                    'updated_at' =>  now(),
                ]);
                return 'Upload Successful.';
            }
        } else {

            return "No Files Selected";
        }
    }
    public function download($path)
{
    // DB::select('select * from share_files where')
        return response()->download($path);
    }
}
