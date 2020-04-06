<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class studentController extends Controller
{
    public function student(){
        return view('student.create');
    }

    public function storeStudent(Request $request){
         // Form validation. And this must be placed before the Eloquent orm
        $validatedData = $request->validate([
            'name' => 'required|max:125',
            'email' => 'required|unique:students',
            'phone' => 'required|unique:students',
        ]);

        $student = new Student;

        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;

        $student->save();
        //toastr notification
        $notification = array('message'=>'Successfully Student Inserted','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    public function allStudents(){
        $student = Student::get();
        return view('student.allStudents')->with('student', $student);
    }

    public function viewStudent($id){
        $student = Student::find($id);
        return view('student.viewStudent')->with('student', $student);
    }

    public function deleteStudent($id){
        $student = Student::find($id)->delete();
        //toastr notification
        $notification = array('message'=>'Successfully Student deleted','alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function editStudent($id){
        $student= Student::find($id);
        return view('student.editStudent')->with('student', $student);
    }

    public function updateStudent(Request $request, $id){
        $student= Student::find($id);

        $student->name= $request->name;
        $student->email= $request->email;
        $student->phone= $request->phone;
        $student->save();
        //toastr notification
        $notification = array('message'=>'Successfully Updated','alert-type'=>'success');
        return redirect('/allStudents')->with($notification);
    


    }
}
