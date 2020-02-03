@extends('layouts.master')
@section('title','View Post')
@section('content')
<br>
@if(session()->has('status1'))
<div class="col-md-12">
<div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong>Congratulations ..! </strong> {{session()->get('status1')}}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
</div>
@endif
<h4 class="display-4 my-3">{{$post->title}}</h4>
<p class="text-danger mb-4">(author-{{$post->author}}) (view-{{$post->view-1}})</p>

<p>{{$post->content}}</p>

<form action="{{url('blog-posts/'.$post->id)}}" method="post">
@csrf
<input name="_method" type="hidden" value="DELETE">
<button type="submit" class="float-left btn btn-danger mt-4" name="button">Delete</button>
</form>

<a href="{{url('blog-posts')}}" class="btn btn-success float-right  mt-4">Back</a>
<a href="{{route('blog-posts.edit',['blog_post'=>$post->id])}}" class="btn btn-info float-right  mt-4 mr-5">Edit</a>

@endsection
