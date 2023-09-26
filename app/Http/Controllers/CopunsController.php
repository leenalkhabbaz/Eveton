<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Copun;
use App\Models\Admin;
use App\Models\Book;
use App\Models\User;
use App\Models\Post;
use App\Models\Vendor;
use Carbon\Carbon;

use App\Models\UseCopun;

class CopunsController extends Controller
{
    public function create_copun(Request $request)

    {//dd( $request);
        $request->validate([
            'code_owner' => 'required',
            'period_of_copun' => 'required',
            'datefinish' =>'required',
            'amount' => 'required',

            //'admin_id' => 'required',
        ]);
        //if( auth()->guard('admin')->user() )
        //{
            //$admin= auth()->guard('admin')->user();
            $copun=new Copun();
            $copun->code_owner=$request->input('code_owner');
           // dd( $copun->code_owner);
            $copun->period_of_copun=$request->input('period_of_copun');
            $copun->datefinish=$request->input('datefinish');

            $copun->amount=$request->input('amount');

            //$copun->admin_id= 6;

            $copun->save();
            return 'sucsessssssssss';





       // }
        //$copon=Copun::find(1);
       // $start=$copon->datebegin;
        //$finish=$copon->datefinish;
      //  $now=Carbon::now();
        //$check = Carbon::now()->between($start,$finish);
       // $check = Carbon::now()->between(Carbon::create($start),Carbon::create($finish));
     //  dd($check);
        //return $now;
       // $check= Carbon::now()->lessThan( $finish); // true
       // dd($check);

    }
    public function show_copuns(){
$admin=Admin::find(6);
$users=$admin->copuns;
return $users;
    }


    public function use_copuns($id,Request $request)
    {
        $user=auth()->guard('user-api')->user();
        //dd($user);
        $copuns=Copun::find($id);
        $delete=  $copuns->period_of_copun;

        $finish=$copuns->datefinish;
         $check= Carbon::now()->lessThan( $finish); // true
        //dd(  $check);
        if( $check){

            $codeofcopuns=$request->input('code_owner');

            if( $codeofcopuns==$copuns->code_owner)
            {
           // $copuns->users()->attach($user);

            $new=new UseCopun();
            $new->user_id= $user->id;
            $new->copun_id=$id;
            $new->period_of_copun=$delete;
            $new->save();

           // $oo=$copuns->users;
            $user->usecopun=1;
            $xx=$user->copuns;


            $user->save();
            return  $xx;
           /* }
            else {return response()->json('the code is not the same');
            }*/


        }
    }
    }
        public function user_copons(Request $request)
{
    $user=auth()->guard('user-api')->user();
    $user=User::find($user->id);
    $mycopuns=$user->copuns;
    return response()->json(['mycopuns ' =>   $mycopuns
            ]);
}
public function activecopun(Request $request)
{   $user=auth()->guard('user-api')->user();
      $code_owner=$request->input('code_owner');
     // dd(  $code_owner);
    $copun=Copun::where('code_owner',$code_owner)->first();
   // dd( $copun);
    if( $copun!=Null){
    $delete=$copun->period_of_copun;
    $finish=$copun->datefinish;
     $check= Carbon::now()->lessThan( $finish); // true
     if($check){
        $new=new UseCopun();
        $new->user_id=$user->id;
        $new->copun_id=$copun->id;
        $new->period_of_copun=$delete;
        $new->type=$copun->type;
        $new->code_owner= $copun->code_owner;
        $new->save();
        return response()->json(['can' => 1
            ]);
     }else
     {  return response()->json(['can' => 2
     ]);}}
     else
     {  return response()->json(['can' => 2
     ]);
}}
public function use_copons($id,Request $request)
{
    $code_owner =$request->input('code_owner');
    //dd($code_owner);
    $copun=UseCopun::where('code_owner',$code_owner)->first();
    //dd($copun);
    $iddd=$copun->id;
    //dd($iddd);
    //dd( $copun);
    if( $copun!=Null){
        if ( $copun->type=='all'){
            $post=Post::find($id);
            $oldcopun=Copun::find($copun->copun_id);
           //dd($oldcopun);
            $newprice=  ($oldcopun->amount*$post->price)/100;
            //dd( $newprice);
            $post->price=$newprice;

            $post->save();
            $postprice=$post->price;

            return response()->json(['postprice' => $postprice
        ]);
        }
        $post=Post::find($id);
        $vendor=$post->vendor_id;
        $vendor1=Vendor::find($vendor);
        $vendortype=$vendor1->type;
        if( $copun->type==$vendortype)
        {
            $post=Post::find($id);
            $oldcopun=Copun::find($copun->copun_id);
           //dd($oldcopun);
            $newprice=  ($oldcopun->amount*$post->price)/100;
            //dd( $newprice);
            $post->price=$newprice;

            $post->save();
            $postprice=$post->price;

            return response()->json(['postprice' => $postprice
        ]);
        }
        else  return response()->json(['can' => 2
    ]);;


    }else  return response()->json(['can' => 2
]);

}
}

