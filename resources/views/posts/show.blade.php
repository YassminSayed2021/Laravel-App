@extends('layouts.app')
@section('title','post')
@section('content')
<div class="container">
 <div class="row">
  <div class="col-md-10">
      
<!-- --------- PostBody ---------------------- -->
    <h1 class="my-4">{{$post->post_title}}</h1><hr/>
    <div class="card mb-4"style="font-style: oblique;">
         {{-- <img class="card-img-top" src="images/{{$post->image}}" alt="Card image cap"> --}}
        <div class="card-body">
          <h2 class="card-title ">{{$post->post_title}}</h2>
          <p class="card-text text-muted">{{$post->content}}</p>
        </div>
        <div class="card-footer text-muted">
        	<b>Posted on </b>{{$post->created_at}} by
          <a href="/user/posts/{{$post->user->id}}">{{$post->user->name}}</a>
        </div>
        @auth
           @if (Auth::user()->id == $post->user_id)
              <div class="btn-group">
              	<a type="button" class="btn btn-info" href="/edit/{{$post->id}}">Update</a>
              	<a type="button" class="btn btn-danger" href="/delete/{{$post->id}}">Delete</a>
              </div>
            @endif
        @endauth
	</div>
   	<hr/>
  </div>
 </div>
</div>
</div>
@endsection