<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Hall;
use App\Models\Publicity;
use App\Models\Notification;

use App\Notification_class\record_log;

use App\Models\Admin;
use App\Models\ReportVendor;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
public function showAdminPost()
{

$posts=Post::where('accepted', false)->get();

$collection = collect($posts);

$multiplied = $collection->map(function ($posts, $key) {
    $vendor=$posts->vendor;
    $hall=$posts->hall;
   return [$vendor,$hall];
});

$multiplied->all();
return view ('View Posts',['posts'=>$posts]);

  }



  public function showAdminCopon()
{
//$posts=Post::where('accepted', false)->get();

//return $posts;
return view ('copon');

  }




  public function showAdminReport()
{

$reports=ReportVendor::where('seen_by_admin', false)->whereNotNull('user_id')->get();

        $collection = collect($reports);

        $multiplied = $collection->map(function ($reports, $key) {
            $user=$reports->reportUser;
           return $user;
        });

        $multiplied->all();
        return view ('Reporting',['reports' =>$reports ]);
}

public function blockUser($id,$id_user){
    $admin= auth()->guard('admin')->user() ;
    $report=ReportVendor::findOrFail($id);
    $report = ReportVendor::find($id);
    $report->seen_by_admin = true;
    $users=User::find($id_user);
    if($users){
    $users->forbiddin=true;
$users->save();
    }
    $report->save();
    return redirect('/showreport');
}


  public function showAdminReportHall(){
    $reports=ReportVendor::where('seen_by_admin', false)->whereNotNull('hall_id')->get();

    $collection = collect($reports);

    $multiplied = $collection->map(function ($reports, $key) {
        $hall=$reports->reportHall;
       return $hall;
    });

    $multiplied->all();
    return view ('ReportingHall',['reports' =>$reports ]);

  }


public function blockHall($id,$id_hall){

    $report=ReportVendor::findOrFail($id);
    $report = ReportVendor::find($id);
    $report->seen_by_admin = true;
    $halls=Hall::find($id_hall);
    if($halls){
    $halls->forbiddin=true;
$halls->save();
    }
    $report->save();
    return redirect('/showreportHall');
}

public function showAdminReportVendor(){
    $reports=ReportVendor::where('seen_by_admin', false)->whereNotNull('vendor_id')->get();

    $collection = collect($reports);

    $multiplied = $collection->map(function ($reports, $key) {
        $vendor=$reports->reportVendor;
       return $vendor;
    });

    $multiplied->all();
    return view ('ReportingVendor',['reports' =>$reports ]);

  }
  public function blockVendor($id,$id_vendor){

    $report=ReportVendor::findOrFail($id);
    $report = ReportVendor::find($id);
    $report->seen_by_admin = true;
    $vendors=Vendor::find($id_vendor);
    if($vendors){
    $vendors->forbiddin=true;
$vendors->save();
    }
    $report->save();
    return redirect('/showreportVendor');
}
public function ignoreVendor($id){

 //   $post=Post::findOrFail($id);
    $report = ReportVendor::find($id)->delete($id);
    return redirect('/showreportVendor');

}

public function ignoreUser($id){

    //   $post=Post::findOrFail($id);
       $report = ReportVendor::find($id)->delete($id);
       return redirect('/showreport');

   }

   public function ignoreHall($id){

    //   $post=Post::findOrFail($id);
       $report = ReportVendor::find($id)->delete($id);
       return redirect('/showreportHall');

   }

///////////////////////////////////////////
   public function showAdminUsers()
   {
     $users= auth()->guard('user-api')->user();
   $users=User::where('forbiddin', false)->get();
   return view ('showUsers',['users'=>$users],compact('users'));
     }

     public function showAdminUsersSearch(Request $request){


         $request->validate([

             'q' => 'required'
         ]);


        $q = $request->q;

         $filteredUsers = User::where('name', 'like', '%' . $q . '%')
                                 ->orWhere('email', 'like', '%' . $q . '%')->get();

                                 //dd($filteredUsers);
         if ($filteredUsers->count()) {

             return view('showUsers')->with([
                 'users' =>  $filteredUsers
             ]);
 }
 else{
    return redirect('/showAdminUsers')->with([
        'status' => 'search failed ,, please try again'
    ]);
 }
     }
     public function showAdminVendors()
     {
     $vendors=Vendor::where('forbiddin', false)->get();
    // return dd($vendors);
     return view ('vendors',['vendors'=>$vendors],compact('vendors'));
       }

       public function vendorSearch(Request $request){


         $request->validate([

             'q' => 'required'
         ]);

        $q = $request->q;

         $filteredUsers = Vendor::where('name', 'like', '%' . $q . '%')
                                 ->orWhere('email', 'like', '%' . $q . '%')->get();

                                 //dd($filteredUsers);
         if ($filteredUsers->count()) {

             return view('vendors')->with([
                 'vendors' =>  $filteredUsers
             ]);
 }
 else{
        return redirect('/showAdminvendors')->with([
            'status' => 'search failed ,, please try again'
        ]);
     }
     }

       public function showAdminHalls()
       {
       $halls=Hall::where('forbiddin', false)->get();
       //return dd($halls);
       return view ('showHall',['halls'=>$halls],compact('halls'));

         }

         public function hallSearch(Request $request){
             $request->validate([
                 'q' => 'required'
             ]);
            $q = $request->q;

             $filteredUsers = Hall::where('name', 'like', '%' . $q . '%')
                                     ->orWhere('email', 'like', '%' . $q . '%')->get();

                                     //dd($filteredUsers);
             if ($filteredUsers->count()) {

                 return view('showHall')->with([
                     'halls' =>  $filteredUsers
                 ]);
     }
     else{
        return redirect('/showAdminHalls')->with([
            'status' => 'search failed ,, please try again'
        ]);
     }
         }
///////////////////////////////////////////////////


//   public function acceptPost($id){
//     $admin= auth()->guard('admin')->user() ;
//     $post=Post::findOrFail($id);
//     $post = Post::find($id);
//     $post->accepted = true;
//     $post->save();
//     // return view('View-Posts',['posts'=>$post]);
//     return redirect('/showpost');

// }
public function acceptPost($id){
    $post=Post::find($id);
    if($post->vendor_id!=null){
      $vendor=Vendor::find($post->vendor_id);
      if($vendor->login==1){
        $notification=new Notification();
       $body= $notification->body='your post is published';
        $notification->vendor_id=$vendor->id;
        $notification->save();
       record_log::sendNotification('cB-hxy2JQYmK9lMsc19hHz:APA91bGtjWfrFTrwDzsgr_HKioWPp_iXBRgbJaRjpG4n8LOxSliaaThx2F8OwpBaAlQ-w7W63XNq1al75jNGJhP73sWIfBGcUpAoojMnmPm_ayqR0CA9MoBGrapLd9JTmX7gGFm_WEZN', $body);
        }
        else{
          $notification=new Notification();
          $notification->body='your post is published';
          $notification->vendor_id=$vendor->id;
          $notification->save();
           }
    }
    if($post->hall_id!=null)
    {
      $hall=Hall::find($post->hall_id);
      if($hall->login==1){
        $notification=new Notification();
       $body= $notification->body='your post is published';
        $notification->hall_id=$hall->id;
        $notification->save();
       record_log::sendNotification('cB-hxy2JQYmK9lMsc19hHz:APA91bGtjWfrFTrwDzsgr_HKioWPp_iXBRgbJaRjpG4n8LOxSliaaThx2F8OwpBaAlQ-w7W63XNq1al75jNGJhP73sWIfBGcUpAoojMnmPm_ayqR0CA9MoBGrapLd9JTmX7gGFm_WEZN', $body);
        }
        else{
          $notification=new Notification();
          $notification->body='your post is published';
          $notification->hall_id=$hall->id;
          $notification->save();
           }

    }
    $admin= auth()->guard('admin')->user() ;
    $post=Post::findOrFail($id);
    $post = Post::find($id);
    $post->accepted = true;
    $post->save();
    // return view('View-Posts',['posts'=>$post]);
    return redirect('/showpost');

}
public function ignorePost($id){

    $post=Post::findOrFail($id);
    $post = Post::find($id)->delete($id);
    return redirect('/showpost');

}

// public function ignorePost($id){

//     $post=Post::find($id);
//       if($post->vendor_id!=null){
//         $vendor=Vendor::find($post->vendor_id);
//         if($vendor->login==1){
//           $notification=new Notification();
//          $body= $notification->body='your post is published';
//           $notification->vendor_id=$vendor->id;
//           $notification->save();
//          record_log::sendNotification($vendor->fcm, $body);
//           }
//           else{
//             $notification=new Notification();
//             $notification->body='your post is published';
//             $notification->vendor_id=$vendor->id;
//             $notification->save();
//              }
//       }
//       if($post->hall_id!=null)
//       {
//         $hall=Hall::find($post->hall_id);
//         if($hall->login==1){
//           $notification=new Notification();
//          $body= $notification->body='your post is ignored';
//           $notification->hall_id=$hall->id;
//           $notification->save();
//          record_log::sendNotification($hall->fcm, $body);
//           }
//           else{
//             $notification=new Notification();
//             $notification->body='your post is ignored';
//             $notification->hall_id=$hall->id;
//             $notification->save();
//              }
//       $post=Post::findOrFail($id);
//       $post = Post::find($id)->delete($id);
//       return redirect('/showpost');

//   }
//   }

public function showAdmin()
{
    $admin= dd(auth()->guard('admin')->user()) ;
    return $admin;
  }


  public function showAdminPublicities()///newwww
  {

  return view ('publicities');

    }
    ///newwww
  public function CreatePublicity(Request $request){
      $request->validate([
         // 'type' =>'required',
          'copunCode' => 'nullable',
          'vendorName' => 'nullable',
          'hallName' => 'nullable',
         'image' => 'required|image|mimes:jpeg,jpg,png,bmp,gif,svg',

      ]);
       $publicity= new Publicity();

     // $publicity->type=$request->input('type');
      $publicity->copunCode=$request->input('copunCode');
    $publicity->vendorName=$request->input('vendorName');
    $publicity->hallName=$request->input('hallName');
      $publicity->image=$request->image;
      if($request->hasFile('image')){
          // Get filename with the extension
          $filenameWithExt = $request->file('image')->getClientOriginalName();
          // Get just filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          // Get just ext
          $extension = $request->file('image')->getClientOriginalExtension();
          // Filename to store
          $fileNameToStore= $filename.'_'.time().'.'.$extension;
          // Upload Image
          $path = $request->file('image')->storeAs('public/publicity', $fileNameToStore);
          $publicity->image=$fileNameToStore;
      }
      else {
              $fileNameToStore = 'companydefault.png';
              $publicity->imagepost=$fileNameToStore;
      }
      if($request->input('default')!= null)
      {
        $publicity->type=$request->input('default');
      }
     else if($request->input('copun')!= null)
      {

        $publicity->type=$request->input('copun');
      }

     $publicity->save();

    return redirect('/showpublicities')->with('status', 'Blog Post Form Data Has Been inserted');
    // return response()->json('done');

  }
  ///newwww
//   public function getUserProfile(Request $request)
//   {
//       $request->validate([

//           'vendorName' => 'nullable',
//           'hallName' => 'nullable'
//       ]);

//   if($request->vendorName){
//    $vendor = Vendor::where('name', $request->vendorName)->first()->id;

//   $v2=Vendor::find($vendor);
//   $name=$v2->name;
//   $type=$v2->type;
//   $gendre=$v2->gendre;
//   $profile_thumbnail= $v2->profile_thumbnail;
//   $about= $v2->about;
//   $city= $v2->city;
//   $since= $v2->since;
//   $to= $v2->to;

//   /********************************************* */
//   $offer=$vendor->posts()->where('accepted', true)->where('type','offer')->get();
//   $collection = collect($offer);
//   $multiplied = $collection->map(function ($posts, $key) {
//       $rate=$posts->rating;
//      return [$rate];
//   });
//   $multiplied->all();
//   /********************************************************** */
// /********************************************* */
// $normal=$vendor->posts()->where('accepted', true)->where('type','normal')->get();
// $collection = collect($normal);
// $multiplied = $collection->map(function ($posts, $key) {
//  $rate=$posts->rating;
// return [$rate];
// });
// $multiplied->all();
// /********************************************************** */
//   $images=$v2->images;
//   $reviews=$v2->reviews;
//   $rating=$v2->rating;
//   $day_of_book=$v2->day_of_book;
//   return response()->json(['name ' => $name, 'type' => $type,/////////////name not space
//   'gendre' => $gendre,
//   'profile_thumbnail' =>$profile_thumbnail,
//   'about' => $about,
//   'city' => $city ,
//   'since' => $since,
//   'to' => $to,
//   'normal' => $normal,
//   'offer' => $offer,
//   'images' => $images,
// //   'reviews' => $reviews,
// //   'rating' => $rating,
//   'day_of_book' => $day_of_book,
//           ]);
//   }

//   if($request->hallName){
//   $hallId = Hall::where('name', $request->hallName)->first()->id;
//   $hall=Hall::find($hallId);
//   $name=$hall->name;
//       $type=$hall->type;
//       $gendre=$hall->gendre;
//       $profile_thumbnail= $hall->profile_thumbnail;
//       $about= $hall->about;
//       $city= $hall->city;
//       $since= $hall->since;
//       $to= $hall->to;
//       $max_number_of_person= $hall->max_number_of_person;
//       $number_of_client= $hall->number_of_client;

//       /********************************************* */
//     $hospitality=$hall->posts()->where('accepted', true)->where('type','hospitality')->get();
//     $collection = collect($hospitality);
//     $multiplied = $collection->map(function ($posts, $key) {
//         $rate=$posts->rating;
//        return [$rate];
//     });
//     $multiplied->all();
//     /********************************************************** */
//      /********************************************* */
//      $offer=$hall->posts()->where('accepted', true)->where('type','offer')->get();
//      $collection = collect($offer);
//      $multiplied = $collection->map(function ($posts, $key) {
//          $rate=$posts->rating;
//         return [$rate];
//      });
//      $multiplied->all();
//      /********************************************************** */
// /********************************************* */
// $normal=$hall->posts()->where('accepted', true)->where('type','normal')->get();
// $collection = collect($normal);
// $multiplied = $collection->map(function ($posts, $key) {
//     $rate=$posts->rating;
//    return [$rate];
// });
// $multiplied->all();
// /********************************************************** */

//       $images=$hall->images;
//       $reviews=$hall->reviews;
//       $rating=$hall->rating;
//       $day_of_book=$hall->day_of_book;
//   return response()->json(['name ' => $name, 'type' => $type,
//    'gendre' => $gendre,
//    'profile_thumbnail' =>$profile_thumbnail,
//    'about' => $about,
//     'city' => $city ,
//    'since' => $since,
//    'to' => $to,
//    'max_number_of_person' =>$max_number_of_person,
//    'number_of_client' => $number_of_client,
//    'hospitality' => $hospitality,
//    'normal' => $normal,
//    'offer' => $offer,
//    'images' => $images,
// //    'reviews' => $reviews,
// //    'rating' => $rating,
//    'day_of_book' => $day_of_book,
//               ]);
//   }
//   }
  ///newwww
//   public function showPublicity()
//   {
//       $publicity=Publicity::where('type', 'default')->where('type','copun')->get();
//            //  $adv= $publicity;
//            return response()->json([
//             'p ' => $publicity,

//                ]);
//   }



}

