@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

            <a href="{{url('/addCategory')}}" class="btn btn-danger">Add Category</a>
            <a href="{{url('/allCategory')}}" class="btn btn-info">All Category</a>

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


            <form action="{{url('/storeCategory')}}" method="post">
                @csrf
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>categoryName</label>
                        <input type="text" class="form-control" placeholder="Category Name" name="name"
                            id="categoryName">

                    </div>
                </div>

                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>slugName</label>
                        <input type="text" class="form-control" placeholder="Slug Name" name="slug" id="slugName">
                    </div>
                </div>

                <br>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
