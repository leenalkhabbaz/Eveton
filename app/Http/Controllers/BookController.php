<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Hall;
use App\Models\Post;
use App\Models\User;
use App\Models\Event;
use App\Models\Notification;

use App\Notification_class\record_log;
///////////mmmmmmmmmmmmmmmmmm

use App\Models\Day_of_book;
use Carbon\Carbon;

class BookController extends Controller
{
    public function create_book(Request $request,$id)
    {
        $request->validate([
            'fullname' => 'required',
            'description' => 'required',
            'event_date' => 'required|date',
            'event_id' => 'required',
        ]);
          $post=Post::find($id);
            $user= auth()->guard('user-api')->user();
            //$this_book = Book::findOrFail($id);
            //dd(  $user);
            $book= new Book();
            $vendorid= $post->vendor_id;
            $book->vendor_id= $post->vendor_id;
            $book->hall_id= $post->hall_id;
            if( $vendorid!=Null){
            $vendor=Vendor::find(  $book->vendor_id);
            $book->period_of_book=  $vendor->period_of_book;
            }
            if( $book->hall_id!=Null){
                $hall=Hall::find(  $book->hall_id);
                //dd($hall);
                $book->period_of_book=  $hall->period_of_book;
            }
            $book->post_id=   $post->id;
            $book->user_id=$user->id;
            $user=User::find( $book->user_id);
            $book->photo=$user->profile_thumbnail;
            //dd( $book->photo);

            $book->event_id=$request->input('event_id');
            $book->fullname=$request->input('fullname');
            $book->description=$request->input('description');
            $book->event_date=$request->input('event_date');
            $book->edit=Carbon::now()->addHours(12);
           // $day_of_book=Day_of_book::all();
           if( $book->vendor_id!=Null){
           $kk=Vendor::find( $book->vendor_id);
           //dd($kk);
           $day_of_book=  $kk->dayOfbook;
            $book->save();
           // dd($day_of_book);
            return $day_of_book;
           }
           if( $book->hall_id!=Null){
            $kk=Hall::find($book->hall_id);
            //dd( $kk);
            $day_of_book=$kk->day_of_book;
            //dd($day_of_book);


             $book->save();
             return $day_of_book;
            }



    }
    public function show_book()
    {
        $vendor=auth()->guard('vendor-api')->user();

        if(  $vendor!=Null){
            $allbook= $vendor->books;
         return response()->json(['allbook ' =>  $allbook
            ]);
        }}
        public function show_book_hall()
        {
        $hall=auth()->guard('hall-api')->user();
       if($hall!=Null){
            $allbook= $hall->books;
         return response()->json(['allbook ' =>  $allbook ]);

        }
    }


    public function show_book_filter($id)
    {
        $vendor=auth()->guard('vendor-api')->user();

        if(  $vendor!=Null){
            $allbook= $vendor->books;

        $book=Book::where('status_of_book', $id)->where('vendor_id', $vendor->id)->get();

         return response()->json(['allbook ' =>$book
            ]);
        }}
        public function show_book_filter_hall($id)
        { $hall=auth()->guard('hall-api')->user();
       if($hall!=Null){
            $allbook= $hall->books;
            $book=Book::where('status_of_book', $id)->where('hall_id', $hall->id)->get();
         return response()->json(['allbook ' =>  $book ]);

        }
    }







    public function show_book_user($id)
    {
       $vendor=auth()->guard('vendor-api')->user();
       $hall=
        //$user=auth()->guard('user-api')->user();
       //dd($user);
        //$books=$vendor-> books;
        //$ii=User::find(4);
        $oop=Post::find($id);
        //dd($oop);
        $posts=$user->book_posts;
        //dd( $posts);
        $collection = collect( $posts);

        $check=$collection->has( '$oop');
        //dd($check);
        if( $check)
        {
            //dd( $check);
            return true;
        }
        return   response()->json('yoy are not buy it');

    }






    public function inprogress($id)
    {
         //$user=auth()->guard('user-api')->user();
             $book=Book::find($id);
             $id_user=$book->user_id;
             $user=User::find( $id_user);
             if($user->login==1){
             $notification=new Notification();
            $body= $notification->body='your order is accepted';
             $notification->user_id=$user->id;
             $notification->save();
            record_log::sendNotification($user->fcm, $body);
             }
             else{
            $notification=new Notification();
            $notification->body='your order is accepted';
            $notification->user_id=$user->id;
            $notification->save();
             }

        $vendor=auth()->guard('vendor-api')->user();
        if($vendor!=Null)
        {   //dd($vendor->id);
        $book=Book::find($id);
        $book->status_of_book=1;
        $idd=$book->id;
        $date=$book->event_date;

        $DayOfBook= new Day_of_book();
        $DayOfBook->day_of_book= $date;
        $DayOfBook->book_id= $idd;
        $DayOfBook->vendor_id=$vendor->id;
        //dd($vendor->vendor_id);
        $book->save();
        $DayOfBook->save();
        return 1;
        }
    }
        public function inprogress_hall($id)
        {
            $book=Book::find($id);
            $id_user=$book->user_id;
            $user=User::find( $id_user);
            if($user->login==1){
            $notification=new Notification();
           $body= $notification->body='your order is accepted';
            $notification->user_id=$user->id;
            $notification->save();
           record_log::sendNotification($user->fcm, $body);
            }
            else{
           $notification=new Notification();
           $notification->body='your order is accepted';
           $notification->user_id=$user->id;
           $notification->save();
            }


            $hall=auth()->guard('hall-api')->user();
        if($hall!=Null)
        {  // dd($hall);
            $book=Book::find($id);
            $idd=$book->id;
            $book->status_of_book=1;
            $date=$book->event_date;
            $book->save();
            $DayOfBook= new Day_of_book();
            $DayOfBook->day_of_book= $date;
            $DayOfBook->book_id= $idd;
            $DayOfBook->hall_id=$hall->id;
            $DayOfBook->save();
            return 1;
        }

    }
    public function fail_book($id)
    {   $book=Book::find($id);
        $id_user=$book->user_id;
        $user=User::find( $id_user);
        //dd( $user);
        if($user->login==1){
        $notification=new Notification();
       $body= $notification->body='your order is rejected';
        $notification->user_id=$user->id;
        $notification->save();
       record_log::sendNotification('cB-hxy2JQYmK9lMsc19hHz:APA91bGtjWfrFTrwDzsgr_HKioWPp_iXBRgbJaRjpG4n8LOxSliaaThx2F8OwpBaAlQ-w7W63XNq1al75jNGJhP73sWIfBGcUpAoojMnmPm_ayqR0CA9MoBGrapLd9JTmX7gGFm_WEZN', $body);
        }
        else{
       $notification=new Notification();
       $notification->body='your order is accepted';
       $notification->user_id=$user->id;
       $notification->save();
        }
        $book=Book::find($id);
        $book->status_of_book=2;
        $book->save();
        return 2;
    }
    public function accept_book($id)
    {
        $book=Book::find($id);
        $id_user=$book->user_id;
        $user=User::find( $id_user);
        if($user->login==1){
        $notification=new Notification();
       $body= $notification->body='your order is inprogrss';
        $notification->user_id=$user->id;
        $notification->save();
       record_log::sendNotification($user->fcm, $body);
        }
        else{
       $notification=new Notification();
       $notification->body='your order is accepted';
       $notification->user_id=$user->id;
       $notification->save();
        }
        $book=Book::find($id);
        $book->status_of_book=3;
        $book->save();
        return  3;
    }
    public function deleverd_book($id)
    {
        $book=Book::find($id);
        $id_user=$book->user_id;
        $user=User::find( $id_user);
        if($user->login==1){
        $notification=new Notification();
       $body= $notification->body='your order is deleverd';
        $notification->user_id=$user->id;
        $notification->save();
       record_log::sendNotification($user->fcm, $body);
        }
        else{
       $notification=new Notification();
       $notification->body='your order is accepted';
       $notification->user_id=$user->id;
       $notification->save();
        }
        $book=Book::find($id);
        $book->status_of_book=4;
        $book->save();
        return 4;
    }

    //0 default
    //1 من قبل الزبون الحجز الاخير الاخير
    // 3 قبول الفيندور الحجز
    //2 رفض الحجز
    public function updateBook(Request $request,$id)
    {
        $request->validate([
            'fullname' => 'required',
            'description' => 'required',
            'event_date' => 'required|date',
        ]);
        $book=Book::find($id);
        $check= Carbon::now()->lessThan($book->edit);
        //dd( $check);
        if( $check)
        {
        $book->fullname=$request->input('fullname');
        $book->description=$request->input('description');
        $book->event_date=$request->input('event_date');
        $book->save();
        }
        else {return response()->json('yoy are pass the period of update');


    }
}
    public function show_book_event($id)
    {

        $books=Book::where('event_id',$id)->get();
       $coll=collect([]);
        foreach($books as $book)
        {
            $post=Post::find($book->post_id);
            $vendor=Vendor::find($post->vendor_id);
            $vendors=$coll->push( $vendor);

        }
        //dd( $yy);



     // return  $vendors;
         return response()->json(['book ' => $books,'vendors'=>$vendors ]);
    }
    public function deleteBook($id)
    {
        $book = Book::find($id);
        $check= Carbon::now()->lessThan($book->edit);
        //dd( $check);
        if( $check)
        {
       $result= $post->delete();
if($result){
        return["result"=>"post delete"];
}

else{
    return["result"=>"post not delete"];
}
    }
    else {return response()->json('yoy are pass the period of delete');


    }
}
}



