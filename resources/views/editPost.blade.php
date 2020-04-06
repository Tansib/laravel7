@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

            <a href="{{url('/addCategory')}}" class="btn btn-danger">Add Category</a>
            <a href="{{url('/allCategory')}}" class="btn btn-info">All Category</a>
            <a href="{{url('/allPost')}}" class="btn btn-success">All Post</a>

            <!-- Shows form validation errors  -->
            @if ($errors->any())
            <div class="alert alert-danger my-2">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- use 'encrypt="multipart/form-data"' in case of handling image in the form -->
            <form action="{{url('update/post/'.$post->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="control-group my-2">
                    <div class="form-group">
                        <label>Post Title</label>
                        <input type="text" class="form-control" value="{{$post->title}}" id="postTitle" name="title"
                            required>

                    </div>
                </div>

                <div class="control-group">
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category_id" id="">
                            @foreach($cat as $row)
                            <option value="{{$row->id}}" <?php if ($row->id == $post->category_id) {
                                echo"selected";
                            }?>>{{$row->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>New Image</label>
                        <input type="file" class="form-control" placeholder="Image" id="postImage" name="image">
                        Old Image: <img src="{{URL::to($post->image)}}" style="height:80px; width:100px;">
                        <input type="hidden" name="old_photo" value="{{$post->image}}">
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>postDetails</label>
                        <textarea rows="5" class="form-control" name="details">{{$post->details}}</textarea>
                    </div>
                </div>
                <br>
                <div id="success"></div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
