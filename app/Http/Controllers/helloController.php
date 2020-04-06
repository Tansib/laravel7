<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class helloController extends Controller
{
    public function index(){
        //paginate is used for pagination(3 items per page)
        $post = DB::table('posts')
                ->join('categories', 'posts.category_id', '=', 'categories.id')
                ->select('posts.*', 'categories.name', 'categories.slug')
                ->paginate(3);
        return view('index')->with('post', $post);
    }

    public function About(){
        return view('about',['channel'=>'Learn Hunter']);
    }


    public function addCategory(){
        return view('add_category');
    }


    public function storeCategory(Request $request){
        // Form validation. And this must be placed before the query builder
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:25|min:5',
            'slug' => 'required',
        ]);

        //Catching data from the name field of the form of addCategoty and inserting into the database using query biuilder
        $data = array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;
        $category = DB::table('categories')->insert($data);
        
        //toastr notification
        if ($category) {
            $notification = array('message'=>'Successfully Category Inserted',
            'alert-type'=>'success');
            return redirect('/allCategory')->with($notification);
        }
        else {
            $notification = array('message'=>'Something Went Wrong !',
            'alert-type'=>'error');
            return redirect('/allCategory')->with($notification);
        }
        
    }

    public function allCategory(){
        
        //retreiving all the rows from the 'categories' table
        $category = DB::table('categories')->get();
        
        // return response()->json($category);

        return view('all_category', ['category' => $category]);
    }

    public function viewCategory($id){
        $category = DB::table('categories')->where('id',$id)->first();
        return view('category_view')->with('cat',$category);
    }

    public function deleteCategory($id){
        $delete = DB::table('categories')->where('id',$id)->delete();
        
        //toastr notification
        if ($delete) {
            $notification = array('message'=>'Item deleted Successfully',
            'alert-type'=>'success');
            return redirect()->back()->with($notification);
        }
    }

    public function editCategory($id){
        $category = DB::table('categories')->where('id',$id)->first();
        return view('edit_category')->with('cat', $category);
    }

    public function updateCategory(Request $request, $id){

        // Form validation. And this must be placed before the query builder
        $validatedData = $request->validate([
            'name' => 'required|max:25|min:5',
            'slug' => 'required',
        ]);

        //Catching data from the name field of the form of editCategoty and updating into the database using query biuilder
        $data = array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;
        $category = DB::table('categories')->where('id', $id)->update($data);
        
        //toastr notification
        if ($category) {
            $notification = array('message'=>'Successfully Category Updated',
            'alert-type'=>'success');
            return redirect('/allCategory')->with($notification);
        }
        else {
            $notification = array('message'=>'Nothing To Update !',
            'alert-type'=>'error');
            return redirect()->back()->with($notification);
        }
    }
}
