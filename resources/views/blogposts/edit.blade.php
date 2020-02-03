@extends('layouts.master')
@section('title','Edit')
@section('content')

<br><br>
<div class="container">

  <h2 calss="mt-5"> <span class="text-info">Edit</span>  </h2>

  @if($errors->any())
      @foreach ($errors->all() as $error)
      <p class="text-danger">{{$error}}</p>
      @endforeach
  @endif

 <br>
 <br>
  <form action="{{route('blog-posts.update',['blog_post'=>$post->id])}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm text-info">Title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control form-control-sm" id="colFormLabelSm" name="title" placeholder="Title" value="{{$post->title}}" >
    </div>
  </div>
  <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label text-info">Author</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="colFormLabel" name="author" placeholder="Author" value="{{$post->author}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg text-info">Content</label>
    <div class="col-sm-10">
      <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3" >{{$post->content}}</textarea>
    </div>
  </div>
  
    
      <a href="{{route('blog-posts.show',['blog_post'=>$post->id])}}" class="btn btn-info float-left"> Cancel</a>
      <input type="submit" class="btn btn-primary float-right" value="Save">

    



  
</form>

</div>

@endsection
