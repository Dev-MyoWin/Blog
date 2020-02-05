<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSubscriberPost;
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
    public function store(StoreSubscriberPost $request)
    {
      SubscriberPost::create(['name'=>$request->name,'email'=>$request->email]);
      session()->flash('status3', 'Your subscribe have succefful');

      $data = array('name'=>"Blog Application",'username'=>$request->name,'email'=>$request->email);
      Mail::send('subscriber', $data, function($message) use($request) {
      $message->to($request->email,$request->name)->subject
      ('HTML Testing Mail');
      $message->from('laravel.myowin.mm@gmail.com','Blog Application');
      });
      echo "HTML Email Sent. Check your inbox.";
      
      return redirect()->route('blog-posts.index');
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
        //
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
