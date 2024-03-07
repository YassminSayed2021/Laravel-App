<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Mail;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
use App\Models\ShippedMsg;

class ShippedController extends Controller
{
    public function send_mail()
    {
        $msg = ShippedMsg::find(1);
        // $content = [
        //     'subject' => 'This is the Shipped Order Mail',
        //     'body' => 'This is the email body of how to send email from laravel 10 with mailtrap.'
        // ];
        Mail::to('your_email@gmail.com')->send(new OrderShipped($msg));
        return "Email has been sent.";
    }
}
