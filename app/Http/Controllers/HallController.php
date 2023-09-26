<?php

namespace App\Http\Controllers;

use App\Models\Day_of_book;

use App\Models\Hall;
use Illuminate\Http\Request;

class HallController extends Controller
{
    public function showHall(){
        $hall=auth()->guard('hall-api')->user();
        if($hall){
        $name=$hall->name;
        $type=$hall->type;
        $profile_thumbnail= $hall->profile_thumbnail;
        $about= $hall->about;
        $city= $hall->city;
        $since= $hall->since;
        $to= $hall->to;
        $max_number_of_person= $hall->max_number_of_person;
        $min_number_of_person= $hall->min_number_of_person;
        $number_of_client= $hall->number_of_client;

        /********************************************* */
    $hospitality=$hall->posts()->where('accepted', true)->where('type','hospitality')->get();
    $collection = collect($hospitality);
    $multiplied = $collection->map(function ($posts, $key) {
        $rate=$posts->rating;
       return [$rate];
    });
    $multiplied->all();
    /********************************************************** */
     /********************************************* */
     $offer=$hall->posts()->where('accepted', true)->where('type','offer')->get();
     $collection = collect($offer);
     $multiplied = $collection->map(function ($posts, $key) {
         $rate=$posts->rating;
        return [$rate];
     });
     $multiplied->all();
     /********************************************************** */
/********************************************* */
$normal=$hall->posts()->where('accepted', true)->where('type','normal')->get();
$collection = collect($normal);
$multiplied = $collection->map(function ($posts, $key) {
    $rate=$posts->rating;
   return [$rate];
});
$multiplied->all();
/********************************************************** */
        $images=$hall->images;
        $reviews=$hall->reviews;
        $rating=$hall->rating;
        $day_of_book=$hall->day_of_book;
    return response()->json(['name ' => $name, 'type' => $type,
     'profile_thumbnail' =>$profile_thumbnail,
     'about' => $about,
      'city' => $city ,
     'since' => $since,
     'to' => $to,
     'max_number_of_person' =>$max_number_of_person,
     'min_number_of_person' =>$min_number_of_person,
     'number_of_client' => $number_of_client,
     'hospitality' => $hospitality,
     'normal' => $normal,

     'offer' => $offer,

     'images' => $images,
     'reviews' => $reviews,
     'rating' => $rating,
     'day_of_book' => $day_of_book,
                ]);
            }

}

public function showProfileHall($id){
   /// $vendor=auth()->guard('vendor-api')->user();
   $hall = Hall::find($id);
    $name=$hall->name;
    $type=$hall->type;
    $gendre=$hall->gendre;
    $profile_thumbnail= $hall->profile_thumbnail;
    $about= $hall->about;
    $city= $hall->city;
    $since= $hall->since;
    $to= $hall->to;
    $max_number_of_person= $hall->max_number_of_person;
    $min_number_of_person= $hall->min_number_of_person;

    $number_of_client= $hall->number_of_client;
    /********************************************* */
    $hospitality=$hall->posts()->where('accepted', true)->where('type','hospitality')->get();
    $collection = collect($hospitality);
    $multiplied = $collection->map(function ($posts, $key) {
        $rate=$posts->rating;
       return [$rate];
    });
    $multiplied->all();
    /********************************************************** */
     /********************************************* */
     $offer=$hall->posts()->where('accepted', true)->where('type','offer')->get();
     $collection = collect($offer);
     $multiplied = $collection->map(function ($posts, $key) {
         $rate=$posts->rating;
        return [$rate];
     });
     $multiplied->all();
     /********************************************************** */
/********************************************* */
$normal=$hall->posts()->where('accepted', true)->where('type','normal')->get();
$collection = collect($normal);
$multiplied = $collection->map(function ($posts, $key) {
    $rate=$posts->rating;
   return [$rate];
});
$multiplied->all();
/********************************************************** */

    $images=$hall->images;
    $reviews=$hall->reviews;
    $rating=$hall->rating;
    $day_of_book=$hall->day_of_book;
return response()->json(['name ' => $name, 'type' => $type,
 'gendre' => $gendre,
 'profile_thumbnail' =>$profile_thumbnail,
 'about' => $about,
  'city' => $city ,
 'since' => $since,
 'to' => $to,
 'max_number_of_person' =>$max_number_of_person,
 'min_number_of_person' =>$min_number_of_person,
 'number_of_client' => $number_of_client,
 'hospitality' => $hospitality,
 'normal' => $normal,

 'offer' => $offer,

 'images' => $images,
 'reviews' => $reviews,
 'rating' => $rating,
 'day_of_book' => $day_of_book,
            ]);


}

public function AddToCalanderHall(Request $request)
{
    $request->validate([
        'day_of_book' => 'required|date',

    ]);
    $hall= auth()->guard('hall-api')->user();

        $day= new Day_of_book();
        $day->hall_id=$hall->id;

    $day->day_of_book=$request->input('day_of_book');
    $day->save();
    return response()->json([
        'message' => 'done'
    ], 200);
}

public function getAllHall()
{
  $hall=Hall::all();
return $hall;
}
}
