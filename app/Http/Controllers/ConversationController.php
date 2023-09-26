<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Hall;
use App\Models\User;
use App\Models\chat;
use Illuminate\Support\Facades\DB;



class ConversationController extends Controller
{
    public function sendmessage(Request $request,$id)
    {
        $request->validate([
            'message' => 'required',
            'state'=>'required',
            //'who' => 'required',
        ]);
        //$user=auth()->guard('user-api')->user()->id;
       // $hall= User::findOrFail( $id);


        $state=$request->input('state');

       // dd( $user);
        if( $state==8){
       $user=auth()->guard('user-api')->user();
       $who=$request->input('who');
       //dd('who');
       if($who==1){
        $vendor=Vendor::find($id);
        $message=new chat();
        $message->message=$request->input('message');
        $message->user_id=  $user->id;
        $message->state=$state;
        $message->vendor_id=$vendor->id;
        //dd($vendor->id);
        $message->who=  $who;
        //dd($vendor->id);
        $message->save();
        return true;
       }
       if($who==2){
        $hall=Hall::find($id);
        $message=new chat();
        $message->message=$request->input('message');
        $message->user_id=  $user->id;
        $message->hall_id=$hall->id;
        $message->state=$state;
        //dd( $message->hall_id);
        $message->who=  $who;
        $message->save();
        return true;
       }
        }

        if( $state==9)
        { $who=$request->input('who');
             $ven=auth()->guard('vendor-api')->user();
            $user=User::find($id);
           // dd( $ven);
            $message=new chat();
            $message->message=$request->input('message');
            $message->vendor_id=  $ven->id;
            $message->user_id=$user->id;
            $message->state=$state;
            $message->who=  $who;
            //dd($vendor->id);
            $message->save();
            return true;
        }
        if($state==10)
        { $who=$request->input('who');
             $hall=auth()->guard('hall-api')->user();
            $user=User::find($id);
            $message=new chat();
            $message->message=$request->input('message');
            $message->hall_id=  $hall->id;
            $message->user_id=$user->id;
            $message->state=$state;
            $message->who=  $who;
            //dd($vendor->id);
            $message->save();
            return true;
        }
    }

    public function getmessage(Request $request)
    {   //$user=auth()->guard('user-api')->user();


        //dd( $user);
        $state=$request->input('state');
        //dd( $state);
        if($state==8 ){
            $user=auth()->guard('user-api')->user();
            $chats= $user->vendor_chat;
            $chats_hall= $user->hall_chat;
            $rr=collect($chats);
            $mm=collect($chats_hall);
             $unique =  $rr->unique('email');
             $unique1= $mm->unique('email');
            $new=  $unique->push( $unique1);
            $box = $new->flatten();
            return response()->json(['box ' =>  $box
            ]);
        }
        if($state==9){
            $vendor=auth()->guard('vendor-api')->user();
           // dd( $vendor);
            $chats=$vendor->user_chat;
           // dd( $chats);
            $unique=$chats->unique('email');
            $unique->values()->all();
            $box =  $unique->flatten();
            return response()->json(['box ' => $box
            ]);
        }
        if($state==10){
            $hall=auth()->guard('hall-api')->user();
            $chats=$hall->user_chat;
            $unique=$chats->unique('email');
            $unique->values()->all();
            return response()->json(['box ' =>  $unique
            ]);
        }
    }


    public function gett(Request $request,$id)
    { $state=$request->input('state');



        if(  $state==8){
            $user=auth()->guard('user-api')->user();
            $who=$request->input('who');
            if( $who==1){
                $message=Chat::where('vendor_id',$id)->where('user_id',$user->id)->get();
                return  $message;
            }
            if( $who==2){
                $message=Chat::where('hall_id',$id)->where('user_id',$user->id)->get();
                return  $message;
            }
        }
        if( $state==9){
            $vendor=auth()->guard('vendor-api')->user();
            $message=Chat::where('user_id',$id)->where('vendor_id',$vendor->id)->get();
            return  $message;


        }
        if( $state==10){
            $hall=auth()->guard('hall-api')->user();
            $message=Chat::where('user_id',$id)->where('hall_id',$hall->id)->get();
            return  $message;


        }
    }

}
