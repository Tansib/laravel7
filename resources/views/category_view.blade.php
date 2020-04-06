@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

            <a href="{{url('/addCategory')}}" class="btn btn-danger">Add Category</a>
            <a href="{{url('/allCategory')}}" class="btn btn-info">All Category</a>

            <div class="my-3">
                <ol>
                    <li>Category Name: {{$cat->name}}</li>
                    <li>Category Slug: {{$cat->slug}}</li>
                    <li>Created At: {{$cat->created_at}}</li>
                </ol>
            </div>

        </div>
    </div>
</div>
@endsection
