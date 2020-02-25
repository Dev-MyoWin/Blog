@extends('layouts.master')
@section('title','View Post')
@section('content')
<br>

@if(session()->has('status'))
<div class="col-md-12">
<div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong>Congratulations ..! </strong> {{session()->get('status')}}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
</div>
@endif

<h4 class="display-4 my-3">{{$post->title}}</h4>
<p class="text-danger mb-4">(author-{{$post->user->name}}) (view-{{$post->view-1}})</p>

<p>{{$post->content}}</p>

@foreach($post->comments as $comment)

<span class="float-left text-primary mt-4">{{$comment->user->name}}</span>

<span class="float-right text-primary mt-4">{{$comment->created_at->diffForHumans()}}</span>
<input type="text" id="country" name="country" class="form-control"value="{{$comment->description}}" readonly>
@endforeach



@if(Auth::user())
<form action="{{url('comment')}}" method="POST">
           @csrf
           <div class="form-group row mt-5">
              <div class="col-sm-11">
                <input type="hidden" name="id" value="{{$post->id}}">
                <input type="text" class="form-control form-control-md" id="description" name="description" placeholder="comment here" autofocus>
              </div>
              <input type="submit" class="btn btn-primary ml-3 float-right" value="send">
            </div>
</form>
@endif
<a href="{{url('blog-posts')}}" class="btn btn-success float-left   mt-4">Back</a>

@if(Auth::user())
@if(Auth::user()->role->name == 'admin')
<div class="mt-5">
<form action="{{url('blog-posts/'.$post->id)}}" method="post">
@csrf
<input name="_method" type="hidden" value="DELETE">
<button type="submit" class="float-right btn btn-danger mt-4" name="button">Delete</button>
</form>

<a href="{{route('blog-posts.edit',['blog_post'=>$post->id])}}" class="btn btn-info float-right  mt-4 mr-5">Edit</a>
</div>
@endif
@endif
@endsection
