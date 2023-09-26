<?php

namespace App\Http\Controllers;

use App\Models\DayOfBook;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Guest;
use App\Models\Post;
use App\Models\Rating;
use App\Models\ReportVendor;
use App\Models\Review;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Hall;
use App\Models\Publicity;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function showProfile(){
        $user=auth()->guard('user-api')->user();
        if($user){
        $name=$user->name;
        $email=$user->email;
        $gendre=$user->gendre;
        $profile_thumbnail= $user->profile_thumbnail;
        $events=$user->events;

    return response()->json(['name ' => $name, 'email' => $email,
     'gendre' => $gendre,
     'profile_thumbnail' =>$profile_thumbnail,
 'events' => $events,
                ]);
            }

}



    public function addPostToFavorite(Request $request)
    {
        $request->validate([
            'post_id' => 'required',//['required', 'exists:posts,id'],

        ]);
        $user= auth()->guard('user-api')->user();
        //$company= Company :: find($id);

        $user->savedposts()->attach($request->post_id);
        $vv=Post::find($request->post_id);
       $vv->save=true;
       $vv->save();
        return response()->json([
            'message' => 'done'
        ], 200);
    }
    public function unsavePost(Request $request){

        $request->validate([
            'post_id' => 'required',//['required', 'exists:posts,id'],
        ]);
        $user= auth()->guard('user-api')->user();
        $user->savedposts()->detach($request->post_id);

        return response()->json([
            'message' => 'unsave done'
        ], 200);

    }
    public function showSavePost(){
        $user= auth()->guard('user-api')->user();
        $favorites= $user->savedposts;
        $posts=Post::where('accepted', true)->get();

        $collection = collect($favorites);
       // $posts=$posts->sortByDesc('created_at');
       // $rate=$posts->rating();
        $multiplied = $collection->map(function ($posts, $key) {
            $vendor=$posts->vendor;
            $hall=$posts->hall;

           return [$vendor,$hall];
        });

        $multiplied->all();

        return response()->json([
            'favorites' => $favorites
        ]);

    }
    public function reviewVendorById(Request $request)
    {
        $request->validate([
            'vendor_id' => 'nullable|exists:vendors,id',
            'hall_id' => 'nullable|exists:halls,id',
            'review' => 'required'
        ]);
        $user= auth()->guard('user-api')->user();
      //  $user = $request->user();
      $user = User::find($user->id);
     if( $user->beneficiary != 0){

            $review= new Review();
            $review->user_id=$user->id;

        $review->vendor_id=$request->input('vendor_id');
        $review->hall_id=$request->input('hall_id');
        $review->review=$request->input('review');
        $review->save();
        return response()->json([
            'message' => 'done'
        ], 200);
    }
    else { return response()->json([
        'message' => 'The user does not benefit from the services of this provider'
    ], 400);}
    }



    public function reportById(Request $request)
    {
        $request->validate([
            'vendor_id' => 'nullable|exists:vendors,id',
            'hall_id' => 'nullable|exists:halls,id',
            'reason' => 'required'
        ]);
        $user= auth()->guard('user-api')->user();
        ReportVendor::create([
           // 'user_id' => $user->id,
            'vendor_id' => $request->vendor_id,
            'hall_id' => $request->hall_id,
            'reason' => $request->reason
        ]);
        return response()->json([
            'message' => 'done'
        ]);
    }

    public function reportUserById(Request $request)//ريبورت على يوزر
    {
        $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'reason' => 'required'
        ]);
        $vendor= auth()->guard('vendor-api')->user();
        if($vendor){
        ReportVendor::create([
            'user_id' => $request->user_id,
            'reason' => $request->reason
        ]);
        return response()->json([
            'message' => 'done'
        ]);
    }
    $hall= auth()->guard('hall-api')->user();
    if($hall){
    ReportVendor::create([
        'user_id' => $request->user_id,
        'reason' => $request->reason
    ]);
    return response()->json([
        'message' => 'done'
    ]);
}

    }

// public function reportUserById(Request $request,$id){
//     $this->validate($request ,[
//         'reason'=>'required'
//     ]);
//     $report = new ReportVendor();
//     $report->reason=$request->input('reason');

//     if(auth()->guard('hall-api')->user())
//     {
//         $report->hall_id=auth()->guard('hall-api')->user()->id;
//         // $report->sendable_type='App\Models\User';
//     }
//     else {
//         $report->vendor_id= auth()->guard('vendor-api')->user()->id;
//        // $report->sendable_type='App\Models\Company';
//     }
//     $report->user_id=$id;
//    // $report->receivable_type='App\Models\User';
//     $report->save();
//     return response()->json([
//                 'message' => 'done'
//             ]);
//     // return redirect('/users/'.$id)->with('status', 'Report Sent');
// }


    public function rateById(Request $request)
    {
        $request->validate([
            // 'vendor_id' => 'nullable|exists:vendors,id',
            // 'hall_id' => 'nullable|exists:halls,id',
            'post_id' => 'required|exists:posts,id',
            'rating' => ['required', Rule::in(['1', '2', '3', '4', '5'])],
            'rating_text' => 'required',
        ]);
        $user= auth()->guard('user-api')->user();
        $user = User::find($user->id);
        $username=$user->name;
        // if( $user->beneficiary != 0){

        // $rate = Rating::where('post_id', $request->post_id)->where('user_id', $user->id)->first();
        // if ($rate) {
        //     return response()->json([
        //         'message' => 'you already rated this post'
        //     ]);
        // }
        Rating::create([
            'user_id' => $user->id,
           'user_name'=>$username,
            // 'vendor_id' => $request->vendor_id,
            // 'hall_id' => $request->hall_id,
            'post_id' => $request->post_id,
            'rating' => $request->rating,
            'rating_text' =>$request->rating_text
        ]);
        return response()->json([
            'message' => 'done'
        ]);
    // }
    // else { return response()->json([
    //     'message' => 'The user does not benefit from the services of this provider'
    // ], 400);}

    }

    public function createEvent(Request $request)
    {

    $request->validate([
        'name' =>'required',
        'time' => 'required',
        'date' => 'required|date',
        'note' => 'nullable',
    ]);

   $user= auth()->guard('user-api')->user();

     $event= new Event();
     $event->user_id=  $user->id;
     $event->name=$request->input('name');
    $event->time=$request->input('time');
    $event->date=$request->input('date');
    $event->note=$request->input('note');
   $event->save();
   //$success =  $event;

 return response()->json(['success' => 'done']);
  // return response()->json('leen');
    }

    public function updateEventById(Request $request,$id)
    {
        $request->validate([
            'name' =>'nullable',
            'time' => 'nullable',
            'date' => 'nullable|date',
            'note' => 'nullable',
        ]);
        $event=Event::find($request->id);
        if($event){
        $event->name=$request->input('name');
        $event->time=$request->input('time');
        $event->date=$request->input('date');
        $event->note=$request->input('note');
        $event->update();

        return response()->json('update done');
        }
        else{
            return response()->json(' no update ');
        }


    }


///get book in this event
    public function showEventById($id){
        $event = Event::find($id);
        $name=$event->name;
        $time=$event->time;
        $date=$event->date;
    return response()->json(['name ' => $name, 'time' => $time, 'date' => $date ]);

    }

    public function getAllEventUser(){
        $user=auth()->guard('user-api')->user();
        return $user->events;

    }

    public function AddToGusts(Request $request,$id)
    {
        $event=Event::find($id);
        $guests= new Guest();
     $guests->event_id=$event->id;
        $guests->name=$request->input('name');
        $guests->phone_number=$request->input('phone_number');
        $guests->save();
        return response()->json('done');
    }
    public function showGustsbyIDevent(Request $request,$id)
    {
       $event=Event::find($id);
       if($event!=null){
        $guest= $event->guest;
       }
    //    $guest=Guest::where('event_id',$id)->first();
    //  //  dd($guest);
    //    $guest->name;
    //   $guest->phone_number;

    //   $collection = collect($guest);
    //   $multiplied = $collection->map(function ($guest, $key) {
    //   $guest->name;
    //     $guest->phone_number;
    //      return [$guest];
    //   });

    //   $multiplied->all();

    return response()->json(['event' => $event ]);
    }
    public function updateGusts(Request $request,$id)
    {
        $request->validate([
            'name' =>'nullable',
            'phone_number' => 'nullable',

        ]);
        $gust=Guest::find($request->id);
        if($gust){

        $gust->name=$request->input('name');
        $gust->phone_number=$request->input('phone_number');

        $gust->update();

        return response()->json('update done');
        }
        else{
            return response()->json(' no update ');
        }

    }

    public function deleteGust($id)
    {
        $gust = Guest::find($id);
       $result= $gust->delete();
if($result){
        return["result"=>"gust delete"];
}

else{
    return["result"=>"gust not delete"];
}
    }

    public function getVendorByType(Request $request,$type){
        // $request->validate([
        //     'type' =>'required'

        // ]);
        $vendors=Vendor::where('type', $type)->get();
       // return $vendors;

        return response()->json(['vendors ' => $vendors
                   ]);
    }


    public function search( Request $request) { //newwwwww

        $request->validate([
            'word' => 'nullable',
            'min_price' =>'nullable',
            'min_price' =>'nullable',
            'type'=> 'nullable',
            'city'=>'nullable'
        ]);
        $word = $request->input('word');
        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');
        $type = $request->input('type');
        //dd(  $type);
        $city = $request->input('city');
        $filteredvendor =null;
        $filteredposts=null;
        $filteredhall=null;
        //dd($type);
        if($word!=null && $type==null && $city==null){

        $filteredvendor = Vendor::where('forbiddin',false)->where('name', 'LIKE', "%{$word}%")
        ->get();}
        if($word!=null && $type!=null && $city==null ){
            $filteredvendor = Vendor::where('name', 'LIKE', "%{$word}%")->Where('type', 'LIKE', "%{$type}%")->where('forbiddin',false)->get();
           // dd($type);
        }
            if($city!=null && $word!=null && $type!=null  ){
                $filteredvendor = Vendor::where('name', 'LIKE', "%{$word}%")->Where('type', 'LIKE', "%{$type}%")->where('city', 'LIKE', "%{$city}%")->where('forbiddin',false)->get();
        }



        if($word!=null && $min_price==null && $max_price==null){
       $filteredposts = Post::where('accepted', true)
                                ->where('title', 'LIKE', "%{$word}%")
                                ->get();
                                $collection = collect($filteredposts);
                                $multiplied = $collection->map(function ($posts, $key) {
                                    $vendor=$posts->vendor;
                                    $hall=$posts->hall;

                                   return [$vendor,$hall];
                                });
                                $multiplied->all();
        }
        if($word!=null && $min_price!=null && $max_price!=null){
            $filteredposts = Post::where('accepted', true)
                                     ->where('title', 'LIKE', "%{$word}%")
                                     ->whereBetween('price', [$min_price, $max_price])
                                     ->orderBy('price', 'ASC')
                                     ->get();
                                     $collection = collect($filteredposts);
                                     $multiplied = $collection->map(function ($posts, $key) {
                                         $vendor=$posts->vendor;
                                         $hall=$posts->hall;

                                        return [$vendor,$hall];
                                     });
                                     $multiplied->all();
             }

        if($word!=null  && $city==null){
         $filteredhall = Hall:: where('name', 'LIKE', "%{$word}%")->where('forbiddin', false)

                                ->where('forbiddin', false)
                                ->get();

        }
        if($word!=null  && $city!=null){
            $filteredhall = Hall:: where('name', 'LIKE', "%{$word}%")->where('forbiddin', false)
                                   ->Where('city', 'LIKE', "%{$city}%")
                                   ->where('forbiddin', false)
                                   ->get();

           }

        return response()->json([
        'filteredvendor' => $filteredvendor,
        'filteredposts' => $filteredposts,
        'filteredhall' => $filteredhall,
           ]);

    }

    public function getUserProfile(Request $request)
    {
        $request->validate([

            'vendorName' => 'nullable',
            'hallName' => 'nullable'
        ]);

    if($request->vendorName){
     $vendor = Vendor::where('name', $request->vendorName)->first()->id;
//dd($vendor);
    $v2=Vendor::find($vendor);
    $id=$v2->id;
    $name=$v2->name;
    $type=$v2->type;
    $gendre=$v2->gendre;
    $profile_thumbnail= $v2->profile_thumbnail;
    $about= $v2->about;
    $city= $v2->city;
    $since= $v2->since;
    $to= $v2->to;
   /********************************************* */
   $offer=$v2->posts()->where('accepted', true)->where('type','offer')->get();
   $collection = collect($offer);
   $multiplied = $collection->map(function ($posts, $key) {
       $rate=$posts->rating;
      return [$rate];
   });
   $multiplied->all();
//    /********************************************************** */
// /********************************************* */
$normal=$v2->posts()->where('accepted', true)->where('type','normal')->get();
$collection = collect($normal);
$multiplied = $collection->map(function ($posts, $key) {
  $rate=$posts->rating;
 return [$rate];
});
$multiplied->all();
/********************************************************** */
    $images=$v2->images;
    $reviews=$v2->reviews;
    $rating=$v2->rating;
    $day_of_book=$v2->day_of_book;
    return response()->json(['id' => $id, 'name ' => $name, 'type' => $type,/////////////name not space
    'gendre' => $gendre,
    'profile_thumbnail' =>$profile_thumbnail,
    'about' => $about,
    'city' => $city ,
    'since' => $since,
    'to' => $to,
    'normal' => $normal,

    'offer' => $offer,
    'images' => $images,
    // 'reviews' => $reviews,
    // 'rating' => $rating,
    'day_of_book' => $day_of_book,
            ]);
    }

    if($request->hallName){
    $hallId = Hall::where('name', $request->hallName)->first()->id;
    $hall=Hall::find($hallId);
    $id=$hall->id;
    $name=$hall->name;
        $type=$hall->type;
        $gendre=$hall->gendre;
        $profile_thumbnail= $hall->profile_thumbnail;
        $about= $hall->about;
        $city= $hall->city;
        $since= $hall->since;
        $to= $hall->to;
        $max_number_of_person= $hall->max_number_of_person;
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
    return response()->json(['id' => $id,'name ' => $name, 'type' => $type,
     'gendre' => $gendre,
     'profile_thumbnail' =>$profile_thumbnail,
     'about' => $about,
      'city' => $city ,
     'since' => $since,
     'to' => $to,
     'max_number_of_person' =>$max_number_of_person,
     'number_of_client' => $number_of_client,
     'hospitality' => $hospitality,
     'normal' => $normal,

     'offer' => $offer,

     'images' => $images,
    //  'reviews' => $reviews,
    //  'rating' => $rating,
     'day_of_book' => $day_of_book,
                ]);
    }
    }
    ///newwww
    public function showPublicity(Request $request)
    {
        $adv=Publicity::get();
        return response()->json([
            'adv' => $adv,

               ]);
    }

}
