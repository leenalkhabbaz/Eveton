<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Admin;
use App\Models\Hall;
use App\Models\Vendor;
use Hash;
use Validator;
use Auth;

class LoginController extends Controller
{
    // public function user_register(Request $request)
    // {
    //     $this->validate($request, [
    //         'name' => 'required|min:4',
    //         'email' => 'required|email',
    //         'password' => 'required|min:8',
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => bcrypt($request->password)
    //     ]);
    //     //$user=User::where('email',$request->email)->get();

    //     $token = $user->createToken('Laravel-9-Passport-Auth')->accessToken;

    //     return response()->json(['token' => $token], 200);
    // }
    public function  user_register(Request $request)
    {   $temp = $request->all();
        $rules = [
            'name' => 'unique:users|required',
            'email' => 'unique:users|required',
            'password' => 'required',
            'gendre' => 'required',
            'profile_thumbnail' => 'required|image',
            'fcm' => 'nullable'
        ];

        $input= $request->only('name', 'email','password','gendre','profile_thumbnail','fcm',

    );
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $fcm = $request->fcm;
        $gendre = $request->gendre;
        $profile_thumbnail=$request->profile_thumbnail;

        if ($request->hasFile('profile_thumbnail')) {
            $profile_thumbnail = $request->file('profile_thumbnail');
            $filename = time() . $profile_thumbnail->getClientOriginalName();
            Storage::disk('public')->putFileAs(
                'UserPhoto/VendorProfile',
                $profile_thumbnail,
                $filename
            );
            $profile_thumbnail = $request->profile_thumbnail = $filename;
        }

        $user = User::create(['name' => $name, 'email' => $email, 'password' => Hash::make($password),

        'gendre' => $request->gendre,
        'profile_thumbnail'=>$profile_thumbnail,
        'fcm'=>$fcm,
        ]);

        $token = $user->createToken('Laravel-9-Passport-Auth')->accessToken;
        return response()->json(['token' => $token], 200);
    }


    public function updateUserProfile(Request $request)//newwwwww
    {
        $request->validate([
            'name' =>'nullable',
            'profile_thumbnail' => 'nullable|image',
        ]);

    $id= auth()->guard('user-api')->user()->id;
    $user= User::findOrFail( $id);

        $user->name=$request->input('name');
        $user->update();

        return response()->json('update done');

    }


        public function  vendor_register(Request $request)
        {   $temp = $request->all();
            $rules = [
                'name' => 'unique:users|required',
                'email' => 'unique:users|required',
                'password' => 'required',
                'profile_thumbnail' => 'required|image',
                'type' => 'required',
                'gendre' => 'required',
                'about' => 'required',
                'city' => 'required',
                'since' => 'required',
                'to' => 'required',
                'period_of_book' => 'required',
                'phone_number' => 'required',/*****************اذا مو شرط دخله؟ */
                'fcm' => 'nullable',
            ];

            $input= $request->only('name', 'email','password','profile_thumbnail','type','gendre',
            'about',
            'city',
            'since',
            'to',
            'period_of_book',
            'phone_number',
            'fcm'
        );
            $validator = Validator::make($input, $rules);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'error' => $validator->messages()]);
            }
            $name = $request->name;
            $email = $request->email;
            $password = $request->password;
            $profile_thumbnail=$request->profile_thumbnail;
            $type = $request->type;
            $gendre = $request->gendre;
            $about = $request->about;
            $city = $request->city;
            $since = $request->since;
            $to = $request->to;
            $period_of_book = $request->period_of_book;
            $phone_number = $request->phone_number;
            $fcm=$request->fcm;
            if ($request->hasFile('profile_thumbnail')) {
                $profile_thumbnail = $request->file('profile_thumbnail');
                $filename = time() . $profile_thumbnail->getClientOriginalName();
                Storage::disk('public')->putFileAs(
                    'UserPhoto/VendorProfile',
                    $profile_thumbnail,
                    $filename
                );
                $profile_thumbnail = $request->profile_thumbnail =$filename;
            }
            $vendor = Vendor::create(['name' => $name, 'email' => $email, 'password' => Hash::make($password),'profile_thumbnail'=>$profile_thumbnail,
           'type' => $request->type,
            'gendre' => $request->gendre,
            'about' => $request->about,
            'city' => $request->city,
            'since' => $request->since,
            'to' => $request->to,
            'period_of_book' => $request->period_of_book,
            'phone_number' => $request->phone_number,
            'fcm' => $request->fcm,
            ]);


            $token = $vendor->createToken('Laravel-9-Passport-Auth')->accessToken;
            return response()->json(['token' => $token], 200);

        }


        public function updateVendorProfile(Request $request)//newwwwwwwwww
        {
            $request->validate([
                'name' =>'nullable',
                'type' =>'nullable',
                'gendre' => 'nullable',
                'about' => 'nullable',
                'city' => 'nullable',
                'since' => 'nullable',
                'to' => 'nullable',
                'period_of_book' => 'nullable',
                'phone_number' => 'nullable',
                'profile_thumbnail' => 'nullable|image',
            ]);

        $id= auth()->guard('vendor-api')->user()->id;
        $vendor= Vendor::findOrFail( $id);

            $vendor->name=$request->input('name');
            $vendor->type=$request->input('type');
            $vendor->gendre=$request->input('gendre');
            $vendor->about=$request->input('about');
            $vendor->city=$request->input('city');
            $vendor->since=$request->input('since');
            $vendor->to=$request->input('to');
            $vendor->period_of_book=$request->input('period_of_book');
            $vendor->phone_number=$request->input('phone_number');

            $vendor->update();

            return response()->json('update done');

        }


        public function  hall_register(Request $request)
        {   $temp = $request->all();
            $rules = [
                'name' => 'unique:users|required',
                'email' => 'unique:users|required',
                'password' => 'required',
                'profile_thumbnail' => 'required|image',
                'gendre' => 'required',//delete
                'about' => 'required',
                'city' => 'required',
                'since' => 'required',
                'to' => 'required',
                'period_of_book' => 'required',
                'phone_number' => 'required',/*****************اذا مو شرط دخله؟ */
                'max_number_of_person' => 'required',
                'min_number_of_person' => 'required',
                'fcm' => 'nullable',

            ];

            $input= $request->only('name', 'email','password','profile_thumbnail','gendre',
            'about',
            'city',
            'since',
            'to',
            'period_of_book',
            'phone_number',
            'max_number_of_person',
            'min_number_of_person',
            'fcm',
        );
            $validator = Validator::make($input, $rules);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'error' => $validator->messages()]);
            }
            $name = $request->name;
            $email = $request->email;
            $password = $request->password;
            $profile_thumbnail=$request->profile_thumbnail;
            $gendre = $request->gendre;
            $about = $request->about;
            $city = $request->city;
            $since = $request->since;
            $to = $request->to;
            $period_of_book = $request->period_of_book;
            $phone_number = $request->phone_number;
            $max_number_of_person = $request->max_number_of_person;
            $min_number_of_person = $request->min_number_of_person;
            $fcm = $request->fcm;
            if ($request->hasFile('profile_thumbnail')) {
                $profile_thumbnail = $request->file('profile_thumbnail');
                $filename = time() . $profile_thumbnail->getClientOriginalName();
                Storage::disk('public')->putFileAs(
                    'UserPhoto/VendorProfile',
                    $profile_thumbnail,
                    $filename
                );
                $profile_thumbnail = $request->profile_thumbnail = $filename;
            }
            $hall = Hall::create(['name' => $name, 'email' => $email, 'password' => Hash::make($password),'profile_thumbnail'=>$profile_thumbnail,

            'gendre' => $request->gendre,
            'about' => $request->about,
            'city' => $request->city,
            'since' => $request->since,
            'to' => $request->to,
            'period_of_book' => $request->period_of_book,
            'phone_number' => $request->phone_number,
            'max_number_of_person' => $request->max_number_of_person,
            'min_number_of_person' => $request->min_number_of_person,
            'fcm' => $request->fcm,
            ]);

            $token = $hall->createToken('Laravel-9-Passport-Auth')->accessToken;
            return response()->json(['token' => $token], 200);
        }

        public function updateHallProfile(Request $request)//newwwwww
        {
            $request->validate([
                'name' =>'nullable',
                'max_number_of_person' => 'nullable',
                'min_number_of_person' => 'nullable',

                'about' => 'nullable',
                'city' => 'nullable',
                'since' => 'nullable',
                'to' => 'nullable',
                'period_of_book' => 'nullable',
                'phone_number' => 'nullable',
                'profile_thumbnail' => 'nullable|image',
            ]);

        $id= auth()->guard('hall-api')->user()->id;
        $hall= Hall::findOrFail( $id);

            $hall->name=$request->input('name');
            $hall->max_number_of_person=$request->input('max_number_of_person');
            $hall->min_number_of_person=$request->input('min_number_of_person');

            $hall->about=$request->input('about');
            $hall->city=$request->input('city');
            $hall->since=$request->input('since');
            $hall->to=$request->input('to');
            $hall->period_of_book=$request->input('period_of_book');
            $hall->phone_number=$request->input('phone_number');

            $hall->update();

            return response()->json('update done');

        }

    public function userLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'fcm' => 'nullable',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()->all()]);
        }

        if(auth()->guard('user')->attempt(['email' => request('email'), 'password' => request('password'),'fcm' => request('fcm')])){

            config(['auth.guards.api.provider' => 'user']);

            $user = User::select('users.*')->where('forbiddin',false)->find(auth()->guard('user')->user()->id);
            $user->login=1;
            $user->save();
            $success =  $user;
            $success['token'] =  $user->createToken('MyApp',['user'])->accessToken;

            return response()->json($success, 200);
         }
        if(auth()->guard('vendor')->attempt(['email' => request('email'), 'password' => request('password'),'fcm' => request('fcm')])){

            config(['auth.guards.api.provider' => 'vendor']);

            $vendor = Vendor::select('vendors.*')->where('forbiddin',false)->find(auth()->guard('vendor')->user()->id);
            $vendor->login=1;
            $vendor->save();
            $success =  $vendor;
            $success['token'] =  $vendor->createToken('MyApp',['vendor'])->accessToken;

            return response()->json($success, 200);
        }
        if(auth()->guard('hall')->attempt(['email' => request('email'), 'password' => request('password'),'fcm' => request('fcm')])){

            config(['auth.guards.api.provider' => 'hall']);

            $hall = Hall::select('halls.*')->where('forbiddin',false)->find(auth()->guard('hall')->user()->id);
            $hall->login=1;
            $hall->save();
            $success =  $hall;
            $success['token'] =  $hall->createToken('MyApp',['hall'])->accessToken;

            return response()->json($success, 200);
        }
        else{
            return response()->json(['error' => ['Email and Password are Wrong.']], 200);
        }

    }
    public function logout(Request $request) {
        // dd(  $user= auth()->guard('user-api')->user());

     // auth()->user()->tokens()->delete();
     $user= auth()->guard('user-api')->user();
     $user->login=0;
     $user->save();

      auth()->user()->tokens()->delete();
          return  response()->json([
              'status' => true,
              'message' => 'user logged out successfully'
          ]);
    }

    public function logout_vendor(Request $request) {
        // dd(  $user= auth()->guard('user-api')->user());

    //  auth()->user()->tokens()->delete();
    $vendor= auth()->guard('vendor-api')->user();
     $vendor->login=0;
     $vendor->save();

      auth()->user()->tokens()->delete();

          return  response()->json([
              'status' => true,
              'message' => 'user logged out successfully'
          ]);
    }

    public function logout_hall(Request $request) {
        // dd(  $user= auth()->guard('user-api')->user());
        $hall= auth()->guard('hall-api')->user();
        $hall->login=0;
        $hall->save();

         auth()->user()->tokens()->delete();
     // auth()->user()->tokens()->delete();

          return  response()->json([
              'status' => true,
              'message' => 'user logged out successfully'
          ]);
    }



}
