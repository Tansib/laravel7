@extends('welcome')

@section('content')

<!-- Main Content -->

  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        @foreach($post as $row)
          <div class="post-preview">
            <img src="{{URL::to($row->image)}}" style="height:200px; width:300px">
            <a href="post.html">
              <h2 class="post-title">
                {{$row->title}}
              </h2>
              <h3 class="post-subtitle">
              {{$row->slug}}
              </h3>
            </a>
            <p class="post-meta">Posted by
              <a href="#">Tansib</a>
              on {{$row->created_at}}</p>
          </div>
          <hr>
        @endforeach
        <!-- pagination results -->
        {{ $post->links() }}

        
        <!-- Pager -->
        <!-- <div class="clearfix">
          <a class="btn btn-primary float-left" href="#"> &larr; Older Posts</a>
          <a class="btn btn-primary float-right" href="#">New Posts &rarr;</a>
        </div> -->
      </div>
    </div>
  </div>
@endsection