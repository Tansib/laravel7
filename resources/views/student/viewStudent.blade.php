@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

            
            <a href="{{url('/allStudents')}}" class="btn btn-info">All Students</a>

            <div class="my-3">
                
                <h3>Student's Name: {{$student->name}}</h3>
                <p>Email: {{$student->email}}</p>
                <p>Phone: {{$student->phone}}</p>
            </div>
        </div>
    </div>
</div>
@endsection
