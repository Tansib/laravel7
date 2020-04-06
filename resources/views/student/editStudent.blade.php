@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

            <a href="{{'/allStudents'}}" class="btn btn-info">All Students</a>

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


            <form action="{{url('/update/student/'.$student->id)}}" method="post">
                @csrf
                <hr>
                <h3>Update students</h3>
                <hr>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>StudentName</label>
                        <input type="text" class="form-control" value="{{$student->name}}" name="name"
                            id="studentName">

                    </div>
                </div>

                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Email</label>
                        <input type="email" class="form-control" value="{{$student->email}}" name="email" id="email">
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Phone Number</label>
                        <input type="phone" class="form-control" value="{{$student->phone}}" name="phone" id="phone">
                    </div>
                </div>

                <br>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
