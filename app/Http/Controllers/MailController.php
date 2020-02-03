<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function basic_email() {
        $data = array('name'=>"Blog Application");
        
        Mail::send(['text'=>'mail'], $data, function($message) {
        $message->to('laravel.myowin@gmail.com', 'Myo Win')->subject
        ('Basic Testing Mail');
        $message->from('laravel.myowin.mm@gmail.com','Blog Application');
        });
        echo "Basic Email Sent. Check your inbox.";
        }

        public function html_email() {
            $data = array('name'=>"Blog Application");
            Mail::send('mail', $data, function($message) {
            $message->to('laravel.myowin@gmail.com', 'Myo Win')->subject
            ('HTML Testing Mail');
            $message->from('laravel.myowin.mm@gmail.com','Blog Application');
            });
            echo "HTML Email Sent. Check your inbox.";
            }
        
}
