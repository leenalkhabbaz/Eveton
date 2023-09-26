<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
class Vendor extends  Authenticatable
{
    use HasFactory;
    use HasApiTokens ,Notifiable;
  //  use AuthenticableTrait;
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_thumbnail' ,
        'type',
        'gendre' ,
        'about' ,
        'city' ,
        'since' ,
        'to' ,
        'period_of_book',
        'phone_number',
        'fcm',
    ];


public function posts()
{
    return $this->hasMany(Post::class);

}
public function images()
{
    return $this->hasMany(Image::class);

}
public function reviews()
{
    return $this->hasMany(Review::class);

}
// public function rating()
// {
//     return $this->hasMany(Rating::class);

// }
public function day_of_book()
{
    return $this->hasMany(DayOfBook::class);
}
public function report()
{
    return $this->hasMany(ReportVendor::class,'report_vendor_id');

}
public function books()
{
    return $this->hasMany(Book :: class);
}

public function orderOfbooks()
{
    return $this->hasMany(Order_of_book :: class);
}


public function dayOfbook()
{
    return $this->hasMany(Day_of_book:: class);
}
public function users()
{
    return $this->belongsToMany(User::class ,'books','vendor_id','user_id')->withPivot('fullname','status_of_book','event_date','description');
}
public function user_chat()
{
    return $this->belongsToMany(User::class ,'chats','vendor_id','user_id');
}

}
