<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;


class MultipleUploadController extends Controller
{
    public function upload(Request $request)
{
    if(!$request->hasFile('fileName')) {
        return response()->json(['upload_file_not_found'], 400);
    }

    $allowedfileExtension=['pdf','jpg','png','PNG','JPG','mp4','MP4'];
    $files = $request->file('fileName');
   // dd($request->fileName);
    $errors = [];
     // dd($request->fileName);

       foreach ($files as $file) {
        //dd($request->fileName);

        $extension = $file->getClientOriginalExtension();

        $check = in_array($extension,$allowedfileExtension);

        if($check) {
            foreach($request->fileName as $mediaFiles) {
             //   dd($request->fileName);


                $name = $mediaFiles->getClientOriginalName();
                $vendor= auth()->guard('vendor-api')->user();
                //store image file into directory and db
                $save = new Image();
                $save->vendor_id=  $vendor->id;
              //  $save->vendor_id=$id;
                $save->title = $name;
                $path = $mediaFiles->storeAs('public/profiles',$name);
                $save->path = $path;

                $save->save();

            }
        } else {
            return response()->json(['invalid_file_format'], 422);
        }

        return response()->json(['file_uploaded'], 200);

    }


}


public function uploadHall(Request $request)
{
    if(!$request->hasFile('fileName')) {
        return response()->json(['upload_file_not_found'], 400);
    }

    $allowedfileExtension=['pdf','jpg','png','PNG','JPG','mp4','MP4'];
    $files = $request->file('fileName');
   // dd($request->fileName);
    $errors = [];
     // dd($request->fileName);
       foreach ($files as $file) {
        //dd($request->fileName);

        $extension = $file->getClientOriginalExtension();

        $check = in_array($extension,$allowedfileExtension);

        if($check) {
            foreach($request->fileName as $mediaFiles) {
             //   dd($request->fileName);

              //  $path = $mediaFiles->store('public/images');
                $name = $mediaFiles->getClientOriginalName();
                $hall= auth()->guard('hall-api')->user();
                //store image file into directory and db
                $save = new Image();
                $save->hall_id=  $hall->id;
               // $save->vendor_id=  $vendor->id;
              //  $save->vendor_id=$id;
                $save->title = $name;
                $path = $mediaFiles->storeAs('public/profiles',$name);
                $save->path = $path;

                $save->save();

            }
        } else {
            return response()->json(['invalid_file_format'], 422);
        }

        return response()->json(['file_uploaded'], 200);

    }


}
}
