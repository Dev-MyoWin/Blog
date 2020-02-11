<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubscriberPost;
use App\BlogPost;
use Mail;
class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subscriber=SubscriberPost::where('email','=',$request->email)->first();
        if($subscriber === null) {
            // avaiable alpha characters
        $characters="ABCDEFGHIJKMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz";
        //generate a pin based on 2 digits + random character
           $pin =mt_rand(10,99)
           .$characters[rand(0,strlen($characters)-1)]
           .mt_rand(10,99) 
           .$characters[rand(0,strlen($characters)-1)];
           $confirmation_code=str_shuffle($pin);

      SubscriberPost::create(['name'=>$request->name,'email'=>$request->email,'confirmation_code'=>$confirmation_code]);

      $data = array('name'=>"Blog Application",'username'=>$request->name,'email'=>$request->email,'confirmation_code'=>$confirmation_code);
      Mail::send('mail.confirmation_send', $data, function($message) use($request) {
      $message->to($request->email,$request->name)->subject
      ('Subscribe Mail');
      $message->from('laravel.myowin.mm@gmail.com','Blog Application');
      });
      session()->flash('status', 'Please Check your Email to finish your Subscription !!');
      return redirect()->route('blog-posts.index');
    }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function confirmation_code()
    {
        return view('mail/confirmation_code');
    }

    public function confirmation(Request $request)
    {
        $confirmation = $request->digit1.$request->digit2.$request->digit3.$request->digit4.$request->digit5.$request->digit6;
  
        $subscriber = SubscriberPost::where('confirmation_code', '=', $confirmation)->first();
        if ($subscriber === null) {
            return view('mail/confirmation_code');
           // user doesn't exist
        }
  
        else {
        $id= $subscriber->id;
         SubscriberPost::where('id', '=', $id)->update(['status'=>true,'confirmation_code'=>"confirmed"]);
          $data = array('email'=>$subscriber->email,'name'=>$subscriber->name);
  
          Mail::send('mail.confirmation_success', $data, function($message) use ($subscriber) {
             $message->to($subscriber->email,$subscriber->name)->subject
                ('Subscription Success');
             $message->from('laravel.myowin.mm@gmail.com','Blog Application');
          });
          session()->flash('status', 'Your Subscription have been successful please checkout your email!!');
          return redirect()->route('blog-posts.index');
        }
  
    }  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        SubscriberPost::where('id',$id)->update(['status'=>true,'confimation_code'=>"confirm"]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
