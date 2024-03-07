@extends('layouts.app')
@section('title','post')
@section('content')
<div class="container">
 <div class="row">
  <div class="col-md-10">
      
<!-- --------- PostBody ---------------------- -->
@foreach ($user_posts as $post) 
    
    <div class="card mb-4"style="font-style: oblique;">
         {{-- <img class="card-img-top" src="images/{{$post->image}}" alt="Card image cap"> --}}
        <div class="card-body">
          <h2 class="card-title ">{{$post->post_title}}</h2>
          <p class="card-text text-muted">{{$post->content}}</p>
        </div>
	</div>
   	<hr/>
    @endforeach
  </div>
 </div>
</div>
</div>
@endsection