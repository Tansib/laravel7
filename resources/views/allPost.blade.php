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
        <div class="col-lg-12">

            <a href="{{url('/writePost')}}" class="btn btn-danger">Write Post</a>
            

            <div class="my-2">
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Post Title</th>
                        <th scope="col">Post Category</th>
                        <th scope="col">Post Image</th>
                        <th scope="col">Post Details</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($posts as $row)
                    <tr>
                        <th scope="row">{{$row->id}}</th>
                        <td>{{$row->title}}</td>
                        <td>{{$row->name}}</td>

                        <!-- 'URL::to()' is needed to retrieve image -->

                        <td><img src="{{URL::to($row->image)}}" style="height:60px; width:80px;"></td>
                        <td>{{$row->details}}</td>
                        <td>{{$row->created_at}}</td>
                        <td>
                            <a href="{{url('edit/post/'.$row->id)}}" class="btn btn-sm btn-success">Edit</a>
                            <a href="{{url('delete/post/'.$row->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                            <a href="{{url('view/post/'.$row->id)}}" class="btn btn-sm btn-info">View</a>
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
