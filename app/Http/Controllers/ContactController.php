<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send_mail()
    {
        $msg = Contact::find(1);
        Mail::to('admin@gmail.com')->send(new ContactMail($msg));
        return "Email has been sent";
    }
}
