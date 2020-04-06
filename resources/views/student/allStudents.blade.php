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
        <div class="col-lg-12 col-md-10 mx-auto">

            <a href="{{url('/student')}}" class="btn btn-danger">Add Student</a>


            <div class="my-2">
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($student as $row)
                    <tr>
                        <th scope="row">{{$row->id}}</th>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->phone}}</td>
                        <td>
                            <a href="{{url('edit/student/'.$row->id)}}" class="btn btn-sm btn-success">Edit</a>
                            <a href="{{url('delete/student/'.$row->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                            <a href="{{url('view/student/'.$row->id)}}" class="btn btn-sm btn-info">View</a>
                    </tr>
                @endforeach    
                </tbody>
            </table>
            </div>



        </div>
    </div>
</div>
@endsection
