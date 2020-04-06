@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

            
            <a href="{{url('/allPost')}}" class="btn btn-info">All Posts</a>

            <div class="my-3">
                
                <h3>Title: {{$post->title}}</h3>
                <p>Category: {{$post->name}}</p>
                <img src="{{URL::to($post->image)}}" style="height:260px;">
                <p>Details: <i>{{$post->details}}</i></p>
                <p>Created At: {{$post->created_at}}</p>
                
            </div>

        </div>
    </div>
</div>
@endsection
