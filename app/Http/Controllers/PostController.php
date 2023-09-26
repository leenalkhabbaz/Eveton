<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hall;
use App\Models\Vendor;
use App\Models\Post;
use App\Models\Image;
use App\Models\Rating;
use App\Models\ReportVendor;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
    $temp = $request->all();
    $request->validate([
        'type' =>'required',
        'price' => 'required',
        'description' => 'required',
        'title' => 'required',
        'imagepost' => 'required|image',
    ]);

     if(auth()->guard('vendor-api')->user())
    {
        $vendor= auth()->guard('vendor-api')->user();
    //dd($user);
    $temp = $request->all();
     $post= new Post();
     $post->vendor_id=  $vendor->id;
     $post->type=$request->input('type');
    $post->price=$request->input('price');
    $post->description=$request->input('description');
    $post->title=$request->input('title');
    $post->imagepost=$request->imagepost;

    if($request->hasFile('imagepost')){
        // Get filename with the extension
        $filenameWithExt = $request->file('imagepost')->getClientOriginalName();
        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $request->file('imagepost')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore= $filename.'_'.time().'.'.$extension;
        // Upload Image
        $path = $request->file('imagepost')->storeAs('public/profiles', $fileNameToStore);
        $post->imagepost=$fileNameToStore;
    }
    else {
            $fileNameToStore = 'companydefault.png';
            $post->imagepost=$fileNameToStore;
    }
}
   $post->save();
   return response()->json('done');
    }


    public function createPostHall(Request $request)
    {
    $temp = $request->all();
    $request->validate([
        'type' => 'required',
        'price' => 'required',
        'description' => 'required',
        'title' => 'required',
        'imagepost' => 'required|image',
    ]);

    if(auth()->guard('hall-api')->user())
    {
    $hall= auth()->guard('hall-api')->user();
    $temp = $request->all();
    $post= new Post();
    $post->hall_id=  $hall->id;
    $post->type=$request->input('type');
   $post->price=$request->input('price');
   $post->description=$request->input('description');
   $post->title=$request->input('title');
   $post->imagepost=$request->imagepost;
//    if ($request->has('imagepost')) {
//        $imageName = $temp['price'].time().'.'.$request->file('imagepost')->extension();
//        $request->file('imagepost')->move(public_path('images/profile'), $imageName);
//        $temp['imagepost'] = $imageName;
//    }
if($request->hasFile('imagepost')){
    // Get filename with the extension
    $filenameWithExt = $request->file('imagepost')->getClientOriginalName();
    // Get just filename
    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    // Get just ext
    $extension = $request->file('imagepost')->getClientOriginalExtension();
    // Filename to store
    $fileNameToStore= $filename.'_'.time().'.'.$extension;
    // Upload Image
    $path = $request->file('imagepost')->storeAs('public/profiles', $fileNameToStore);
    $post->imagepost=$fileNameToStore;
}
else {
        $fileNameToStore = 'companydefault.png';
        $post->imagepost=$fileNameToStore;
}

   $post->save();
   return response()->json('done');
    }
    }


    public function showVendorPosts()
    {
        $vendor=auth()->guard('vendor-api')->user();
        if($vendor){
            $posts=Post::where('accepted', true)->where('type', 'normal')->where('vendor_id',$vendor->id)->get();
            return $posts;
        }
    }

    public function showOfferPosts()
    {

        $posts=Post::where('type', 'offer')->where('accepted', true)->get();

        $collection = collect($posts);
        $multiplied = $collection->map(function ($posts, $key) {
            $vendor=$posts->vendor;
            $hall=$posts->hall;
            $rate=$posts->rating;

           return [$vendor,$hall,$rate];
        });

        $multiplied->all();

        return response()->json(['posts ' => $posts
                   ]);

    }

    public function showHallPosts()
    {
        $hall=auth()->guard('hall-api')->user();
        return $hall->posts;
    }
    public function showdetailsPosts($id)
    {

        $post = Post::find($id);
            $price=$post->price;
            $description=$post->description;
            $title=$post->title;
            $image= $post->image;

        return response()->json(['price ' => $price, 'description' => $description, 'title' => $title,  'image' => $image ]);

    }

    public function updatePostById(Request $request,$id)
    {
        $request->validate([
            'type' =>'nullable',
            'price' => 'numeric|nullable',
            'description' => 'nullable',
            'title' => 'nullable',
            'imagepost' => 'nullable|image',
        ]);
        $post=Post::find($request->id);
        if($post){
        $post->price=$request->input('price');
        $post->description=$request->input('description');
        $post->title=$request->input('title');
        $post->imagepost=$request->imagepost;
        if($request->hasFile('imagepost')){
            if($post->imagepost != 'userdefault.png')
                 unlink(storage_path('app/public/profiles/'.$post->imagepost));
            // Get filename with the extension
            $filenameWithExt = $request->file('imagepost')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('imagepost')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('imagepost')->storeAs('public/profiles', $fileNameToStore);
        } else {
            if($post->imagepost == 'userdefault.png')
                $fileNameToStore = 'userdefault.png';
            else
                $fileNameToStore=$post->imagepost;
        }
        $post->update();

        return response()->json('update done');
        }
        else{
            return response()->json(' no update ');
        }


    }



    public function deletePostById($id)
    {
        $post = Post::find($id);
       $result= $post->delete();
if($result){
        return["result"=>"post delete"];
}

else{
    return["result"=>"post not delete"];
}
    }



}
