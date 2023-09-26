<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
class Hall extends  Authenticatable
{
    use HasFactory;
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_thumbnail' ,
        //'gendre' ,
        'about' ,
        'city' ,
        'since' ,
        'to' ,
        'period_of_book',
        'phone_number',
        'max_number_of_person',
        'min_number_of_person',
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
public function day_of_book()
{
    return $this->hasMany(Day_of_Book::class);

}
public function report()
{
    return $this->hasMany(ReportVendor::class,'report_vendor_id');

}
public function books()
{
    return $this->hasMany(Book::class);
}
public function user_chat()
{
    return $this->belongsToMany(User::class ,'chats','hall_id','user_id');
}
}
