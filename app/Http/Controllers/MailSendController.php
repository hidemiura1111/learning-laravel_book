<?php

namespace App\Http\Controllers;

use App\Services\SendTestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailSendController extends Controller
{
    public function send(){
        Mail::send(new SendTestMail());
    }

    public function send_queue(){
        Mail::queue(new SendTestMail());
    }
}
