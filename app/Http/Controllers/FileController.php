<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            if (!empty($request->file)) {

                // get file from request 
                $sendMail = $request->sendMail;
                // return $sendMail;
                $file = $request->file;

                // store file 
                $fid = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ"), 0, 20);
                $tempName = $fid . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public', $tempName);

                if ($sendMail == 'true') {

                    $subject = $request->subject;
                    $filename = $file->getClientOriginalName();
                    $rmail = $request->rmail;
                    $smail = $request->smail;
                    $msg = $request->rmail;
                    $name = $request->name;
                    $type = 'share';
                } else {

                    $subject = $request->subject;
                    $filename = $file->getClientOriginalName();
                    $rmail = "NULL";
                    $smail = $request->smail;
                    $msg = "NULL";
                    $name = $request->name;
                    $type = 'link';
                }

                $code = mt_rand(111111, 999999);
                $slink = 'https://onlinedatatransfer.com/files/' . $fid;
                $dlink =  storage_path() . '/' . 'app' . '/public/' . $tempName; ;

                // insert query

                $result = DB::table('share_files')->insert([
                    'subject' =>  $subject,
                    'fid' =>  $fid,
                    'name' =>  $name,
                    'filename' =>  $filename,
                    'recipient_email' =>  $rmail,
                    'sender_email' =>  $smail,
                    'message' =>  $msg,
                    'code' =>  $code,
                    'sharable_link' =>  $slink,
                    'download_link' =>  $dlink,
                    'created_at' =>  now(),
                    'updated_at' =>  now(),
                ]);

                // $content = "File link: " . $link;
                $details = [
                    'title' => 'Mail from ODT',
                    'body' => `File Link {{$slink}}`
                ];


                if ($sendMail == 'true') {

                    Mail::to($rmail)->send(new \App\Mail\MailService($details));
                }

                return response()->json([
                    'type' => $type,
                    'link' => $slink,
                ]);
            }
        } else {

            return "No Files Selected";
        }
    }
    public function files(Request $request)
    {
        $fid = $request->fid;
        $data = DB::table('share_files')->where('fid', $fid)->get();

        return response()->json($data);
    }
    public function download(Request $request)
    {
        $headers = array(
            'Content-Type: image/jpg',
        );
        $url = $request->url;
        $filename = $request->filename;
        if (file_exists($url)) {
            return response()->download($url);
        }
        return response()->download($url, $filename, $headers);
    }
}
