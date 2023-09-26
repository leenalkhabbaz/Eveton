<?php

namespace App\Http\Controllers;

use App\Models\Day_of_book;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Vendor;



class VendorController extends Controller
{
    public function showProfile(){
        $vendor=auth()->guard('vendor-api')->user();
        if($vendor){
        $name=$vendor->name;
        $type=$vendor->type;
        $gendre=$vendor->gendre;
        $profile_thumbnail= $vendor->profile_thumbnail;
        $about= $vendor->about;
        $city= $vendor->city;
        $since= $vendor->since;
        $to= $vendor->to;
         /********************************************* */
     $offer=$vendor->posts()->where('accepted', true)->where('type','offer')->get();
     $collection = collect($offer);
     $multiplied = $collection->map(function ($posts, $key) {
         $rate=$posts->rating;
        return [$rate];
     });
     $multiplied->all();
     /********************************************************** */
/********************************************* */
$normal=$vendor->posts()->where('accepted', true)->where('type','normal')->get();
$collection = collect($normal);
$multiplied = $collection->map(function ($posts, $key) {
    $rate=$posts->rating;
   return [$rate];
});
$multiplied->all();
/********************************************************** */
        $images=$vendor->images;
        $reviews=$vendor->reviews;
        $rating=$vendor->rating;
        $day_of_book=$vendor->day_of_book;
    return response()->json(['name ' => $name, 'type' => $type,
     'gendre' => $gendre,
     'profile_thumbnail' =>$profile_thumbnail,
     'about' => $about,
      'city' => $city ,
     'since' => $since,
     'to' => $to,
     'normal' => $normal,

     'offer' => $offer,
     'images' => $images,
     'reviews' => $reviews,
     'rating' => $rating,
 'day_of_book' => $day_of_book,

                ]);
            }

}

public function showProfileVendor($id){
   /// $vendor=auth()->guard('vendor-api')->user();
   $vendor = Vendor::find($id);
    $name=$vendor->name;
    $type=$vendor->type;
    $gendre=$vendor->gendre;
    $profile_thumbnail= $vendor->profile_thumbnail;
    $about= $vendor->about;
    $city= $vendor->city;
    $since= $vendor->since;
    $to= $vendor->to;
      /********************************************* */
      $offer=$vendor->posts()->where('accepted', true)->where('type','offer')->get();
      $collection = collect($offer);
      $multiplied = $collection->map(function ($posts, $key) {
          $rate=$posts->rating;
         return [$rate];
      });
      $multiplied->all();
      /********************************************************** */
 /********************************************* */
 $normal=$vendor->posts()->where('accepted', true)->where('type','normal')->get();
 $collection = collect($normal);
 $multiplied = $collection->map(function ($posts, $key) {
     $rate=$posts->rating;
    return [$rate];
 });
 $multiplied->all();
 /********************************************************** */
    $images=$vendor->images;
    $reviews=$vendor->reviews;
   // $rating=$vendor->rating;
    $day_of_book=$vendor->day_of_book;
    // $user=User::find($iduser);
    // $beneficiary=$user->beneficiary;
return response()->json(['name ' => $name, 'type' => $type,/////////////name not space
 'gendre' => $gendre,
 'profile_thumbnail' =>$profile_thumbnail,
 'about' => $about,
  'city' => $city ,
 'since' => $since,
 'to' => $to,
 'normal' => $normal,

     'offer' => $offer,
 'images' => $images,
 'reviews' => $reviews,
 //'rating' => $rating,
 'day_of_book' => $day_of_book,
//  'beneficiary' => $beneficiary,
            ]);
}

public function AddToCalander(Request $request)
{
    $request->validate([
        'day_of_book' => 'required|date',

    ]);
    $vendor= auth()->guard('vendor-api')->user();

        $day= new Day_of_book();
        $day->vendor_id=$vendor->id;

    $day->day_of_book=$request->input('day_of_book');
    $day->save();
    return response()->json([
        'message' => 'done'
    ], 200);
}

public function showCalander(Request $request,$id)
{
    $vendor = Vendor::find($id);
        if($vendor){
        $day =$vendor->day_of_book;
            //return $posts;
        }
    return response()->json([
        'day' => $day
    ]);
}

}
