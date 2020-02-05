<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogPost;
use App\BlogPost;
use App\SubscriberPost;
use Mail;
class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $blogposts=BlogPost::all();
        // $blogposts = DB::table('blog_posts')->paginate(9); //(remark table form)
        $blogposts = BlogPost::paginate(9);
        return view('blogposts.index',['blogposts'=>$blogposts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogposts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    {

      // $blogPost= new BlogPost;
      // $blogPost->title=$request->title;
      // $blogPost->author=$request->author;
      // $blogPost->content=$request->content;
      // $blogPost->view=0;
      // $blogPost->save();

      

      BlogPost::create(['title'=>$request->title,'author'=>$request->author,'content'=>$request->content ]);
      session()->flash('status', 'New post is announced.');
      $latestPost= DB::table('blog_posts')->orderBy('created_at', 'desc')->first();
      // dd($latestPost);
      $subscribers=SubscriberPost::all();
      
      $data = array('name'=>"Blog Application",'title'=>$request->title,'author'=>$request->author,'content'=>$request->content,'id'=>$latestPost->id);
      foreach ($subscribers as $subscriber){
      Mail::send('mail', $data, function($message) use($subscriber) {
      $message->to($subscriber->email, $subscriber->name)->subject
      ('HTML Testing Mail');
      $message->from('laravel.myowin.mm@gmail.com','Blog Application');
      });
    }
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
      $blogPost=BlogPost::find($id);
      BlogPost::where('id',$id)->update(['view'=>$blogPost->view+1]);
        return view('blogposts.show',['post'=>BlogPost::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      return view('blogposts.edit',['post'=>BlogPost::find($id)]);

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
        $editPost = BlogPost::find($id);
        BlogPost::where('id',$id)->update(['title'=>$request->title,'author'=>$request->author,'content'=>$request->content]);
        session()->flash('status1', 'the post title '.'('. $editPost->title .')'.' of the author '.'('.$editPost->author.')'.'have been edited.');
        return redirect()->route('blog-posts.show',['blog_post'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $blogPost = BlogPost::find($id);
      $blogPost->delete();
      session()->flash('status2', 'the post title '.'('. $blogPost->title .')'.' of the author '.'('.$blogPost->author.')'.'have been deleted.');
      return redirect()->route('blog-posts.index');
    }
}
