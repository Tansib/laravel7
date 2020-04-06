@extends('welcome')
@section('content')
<style>
    a.btn.btn-sm {
        padding: 5px 14px;
        font-size: 11px;
    }

</style>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

            <a href="{{url('/addCategory')}}" class="btn btn-danger">Add Category</a>
            <a href="{{url('/allCategory')}}" class="btn btn-info">All Category</a>

            <div class="my-2">
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Category Slug</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($category as $row)
                    <tr>
                        <th scope="row">{{$row->id}}</th>
                        <td>{{$row->name}}</td>
                        <td>{{$row->slug}}</td>
                        <td>{{$row->created_at}}</td>
                        <td>
                            <a href="{{url('edit/category/'.$row->id)}}" class="btn btn-sm btn-success">Edit</a>
                            <a href="{{url('delete/category/'.$row->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                            <a href="{{url('view/category/'.$row->id)}}" class="btn btn-sm btn-info">View</a>
                        </td>
                    </tr>
                @endforeach    
                </tbody>
            </table>
            </div>



        </div>
    </div>
</div>
@endsection
