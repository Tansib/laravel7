<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use DB, Image, Str;

class postController extends Controller
{
    public function post(){
        $category = DB::table('categories')->get();
        return view('posts')->with('cat', $category);
    }

    public function strorePost(Request $request){
        // Form validation. And this must be placed before the query builder
        $validatedData = $request->validate([
            'title' => 'required|max:125',
            'category_id' => 'required',
            'image'=> 'mimes:jpeg,jpg,png,PNG,JPEG | max:1000',
            'details' => 'required',
        ]);

        $data = array();
        $data['title']=$request->title;
        $data['category_id']=$request->category_id;
        $data['details']=$request->details;
        $image=$request->file('image');

        if ($image) {

            // setting up the image name, extension, upload path, moving the image to that folder
            
            $image_name = Str::random(4);
            $text= strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$text;
            $upload_path = 'frontend/postImage/';
            $image_url = $upload_path.$image_full_name;
            $image->move($upload_path, $image_full_name);

            // Storage::putFileAs($upload_path, new File($image), $image_full_name);

            $data['image']=$image_url;

            // upload it into the databse
            DB::table('posts')->insert($data);

            //toastr notification

            $notification = array('message'=>'Successfully Post Inserted','alert-type'=>'success');
            return redirect()->back()->with($notification); 
        }
        else{
            DB::table('posts')->insert($data);

            //toastr notification
            $notification = array('message'=>'Successfully Post Inserted','alert-type'=>'success');
            return redirect()->back()->with($notification);          
        }
    }

    public function allPost(){

        //one to one join(posts to categories where post.category_id == categories.id)
        $posts = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*','categories.name')
            ->get();
            // return response()->json($posts);
        return view('/allPost')->with('posts', $posts);
    }

    public function viewPost($id){
        $posts = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*','categories.name')
            ->where('posts.id', $id)
            ->first();
        return view('post_view')->with('post',$posts);
    }

    public function editPost($id){
        $category = DB::table('categories')->get();
        $post = DB::table('posts')->where('id', $id)->first();
        return view('editPost')->with('cat', $category)->with('post', $post);
    }

    public function updatePost(Request $request, $id){
        // Form validation. And this must be placed before the query builder
        $validatedData = $request->validate([
            'title' => 'required|max:125',
            'category_id' => 'required',
            'image'=> 'mimes:jpeg,jpg,png,PNG,JPEG | max:4000',
            'details' => 'required',
        ]);

        $data = array();
        $data['title']=$request->title;
        $data['category_id']=$request->category_id;
        $data['details']=$request->details;
        $image=$request->file('image');

        if ($image) {

            // updating the image 

            $image_name = Str::random(4);
            $text= strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$text;
            $upload_path = 'frontend/postImage/';
            $image_url = $upload_path.$image_full_name;
            $image->move($upload_path, $image_full_name);

            //deleting the old image
            unlink($request->old_photo);

            // Storage::putFileAs($upload_path, new File($image), $image_full_name);

            //storing the new image
            $data['image']=$image_url;

            // update it into the database
            DB::table('posts')->where('id', $id)->update($data);

            //toastr notification

            $notification = array('message'=>'Successfully Post updated','alert-type'=>'success');
            return redirect('/allPost')->with($notification); 
        }
        else{
            //setting the previous image url and updating into the database
            $data['image']=$request->old_photo;
             DB::table('posts')->where('id', $id)->update($data);

            //toastr notification
            $notification = array('message'=>'Successfully Post updated','alert-type'=>'success');
            return redirect('/allPost')->with($notification);          
        }
    }

    public function deletePost($id){

        $post = DB::table('posts')->where('id',$id)->first();
        $delete = DB::table('posts')->where('id',$id)->delete();

        if ($delete) {
            //deleting image from the upload folder also
            unlink($post->image);

            //toastr notification
            $notification = array('message'=>'Successfully Post deleted','alert-type'=>'success');
            return redirect()->back()->with($notification);
        } else {
            $notification = array('message'=>'Something went wrong !','alert-type'=>'error');
            return redirect()->back()->with($notification);
        }
        
        
    }
}
