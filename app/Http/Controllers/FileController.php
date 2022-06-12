<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;

class FileController extends Controller
{
    public function upload(Request $request, FileReceiver $receiver)
    {
        // if ($request->hasFile('file')) {
        //     if (!empty($request->file)) {
        if ($receiver->isUploaded() === false) {
            throw new UploadMissingFileException();
        }

        // receive the file
        $save = $receiver->receive();

        // check if the upload has finished (in chunk mode it will send smaller files)
        if ($save->isFinished()) {
            // save the file and return any response you need
            $file = $save->getFile();

            // store file 
            $fid = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ"), 0, 20);
            $tempName = $fid . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public', $tempName);

            $sendMail = $request->sendMail;
            // return $sendMail;
            // $file = $request->file;


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
            $dlink =  storage_path() . '/' . 'app' . '/public/' . $tempName;;



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
                'body' => "Hello This Email is share to inform you that a file has been shared to you viad odt by {{$smail}} note the transfer is only valid till 24 hrs. Here is the download link for the transfer. {{$slink}}",
            ];



            if ($sendMail == 'true') {

                Mail::to($rmail)->send(new \App\Mail\MailService($details));
            }

            return response()->json([
                'type' => $type,
                'link' => $slink,
            ]);
        }

        $handler = $save->handler();

        return response()->json([
            "done" => $handler->getPercentageDone(),
            "status" => true
        ]);
        // get file from request 

        // }
        // } else {

        //     return "No Files Selected";
        // }
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
