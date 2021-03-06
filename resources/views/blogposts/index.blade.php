@extends('layouts.master')
@section('title','Blog Posts')
@section('content')
<br>
<!-- Button trigger modal -->
@if(!Auth::user())
<button type="button" class="btn btn-warning  float-right " data-toggle="modal" data-target="#exampleModalCenter">
  Subscribe Now
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Welcome To Our Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      @if($errors->any())
      @foreach ($errors->all() as $error)
      <p class="text-danger">{{$error}}</p>
      @endforeach
      @endif

      <form action="{{url('subscribers')}}" method="POST">
      @csrf

      <div class="form-group row">
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm text-primary">Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-sm" id="name" name="name" placeholder="Enter Your Name">
        </div>
      </div>

      <div class="form-group row">
        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm text-primary">Email</label>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-sm" id="email" name="email" placeholder="Enter Your Email">
        </div>
      </div>

      
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Confirm</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endif
<br>
<br>
<br>

@if(session()->has('status'))
<div class="col-md-12">
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>{{session()->get('status')}}</strong> 
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
</div>
@endif

@if(session()->has('status1'))
<div class="col-md-12">
<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Congratulations ..! </strong> {{session()->get('status1')}}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
</div>
@endif

   <div class="container">
     <div class="row">

       @forelse ($blogposts as $blogpost)
       <div class="card col-md-3 my-3 mx-4 shadow" >
         <div class="card-body" style="width: 17rem;">
         <h6 class="card-subtitle  text-primary float-right ">
         <i class="fa fa-clock-o" style="font-size:20px"></i> &nbsp;{{\Carbon\Carbon::parse($blogpost->created_at)->diffForHumans()}}
           </h6>
           <h5 class="card-title mt-4">
           {{$blogpost->title}}
           </h5>
           <img src="{{$blogpost->imageUrl}}" alt="Image" style="width:200px;height:150px;">
           
           <h6 class="card-subtitle mt-4 text-primary">
           author-({{$blogpost->user->name}})
           </h6>
           
           <p class="card-text">
             {{implode(' ',array_slice(explode(' ',$blogpost->content),0,15))}}...
           </p>
           <a href="#" class="card-link btn btn-warning">View -({{$blogpost->view}})</a>
           <a href="{{route('blog-posts.show',['blog_post'=>$blogpost->id])}}" class="card-link btn  btn-primary float-right">Read More..</a>
           

         </div>
       </div>
       <br> <br>
       @empty

       <div class="jumbotron col-md-12">
         <h1 class="display-4">No Data Avaiable Now..!</h1>
         <p class="lead text-info mt-5">You can be star author</p>
         <hr class="my-4">
         <a class="btn btn-success btn-lg float-right mt-5" href="{{route('blog-posts.create')}}" role="button">Learn more</a>
       </div>

       @endforelse
     </div>
     <div class="row mt-3">
  <div class="col-md-2"></div>
  <div class="col-md-8" >{{ $blogposts->links() }}</div>
  
</div>
     
   </div>


@endsection
