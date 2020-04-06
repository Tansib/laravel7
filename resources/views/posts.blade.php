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

            <form action="{{url('/storePost')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>postTitle</label>
                        <input type="text" class="form-control" placeholder="Title" id="postTitle" name="title"
                            required>

                    </div>
                </div>

                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>category</label>
                        <select class="form-control" name="category_id" id="">
                            @foreach($cat as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>postImage</label>
                        <input type="file" class="form-control" placeholder="Image" id="postImage" name="image">
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>postDetails</label>
                        <textarea rows="5" class="form-control" placeholder="Post Details" name="details"></textarea>
                        
                    </div>
                </div>
                <br>
                <div id="success"></div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="sendMessageButton">Post It</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
