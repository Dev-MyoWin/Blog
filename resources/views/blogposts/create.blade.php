@extends('layouts.master')
@section('title','Blog Posts')
@section('content')

<br><br>
<div class="container">

  <h2 calss="mt-5"> <span class="text-primary">Create New Post</span>  </h2>

  @if($errors->any())
      @foreach ($errors->all() as $error)
      <p class="text-danger">{{$error}}</p>
      @endforeach
  @endif

 <br>
 <br>
  <form action="{{url('blog-posts')}}" method="POST">
    @csrf
    <input type="hidden" name="id" value="id">
  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm text-primary">Title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control form-control-sm" id="colFormLabelSm" name="title" placeholder="Title" value="{{old('title')}}" >
    </div>
  </div>
  <div class="form-group row">
    <label for="colFormLabel" class="col-sm-2 col-form-label text-primary">Author</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="colFormLabel" name="author" placeholder="Author" value="{{old('author')}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg text-primary">Content</label>
    <div class="col-sm-10">
      <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3" >{{old('content')}}</textarea>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-12">

      <input type="submit" class="btn btn-primary float-right" vlaue="submit">
    </div>

  </div>
</form>

</div>

@endsection
