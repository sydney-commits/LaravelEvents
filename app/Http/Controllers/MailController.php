<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    


    public function basic_email() {
        $data = array('name'=>"Virat Gandhi");
     
        Mail::send(['text'=>'mail'], $data, function($message) {
           $message->to('sydneysunya@gmail.com', 'Tutorials Point')->subject
              ('Laravel Basic Testing Mail');
           $message->from('theblockbusters9@gmail.com','Virat Gandhi');
        });
        echo "Basic Email Sent. Check your inbox.";
     }
}
