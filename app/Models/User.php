<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gendre',
        'profile_thumbnail',
        'fcm',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function events()
    {
        return $this->hasMany(Event::class);
    }
    public function posts()
    {
        return $this->belongsToMany(Post::class,'favorites','user_id','post_id');
    }
    public function books()
    {
        return $this->hasMany(Book :: class);
    }
    public function reviews()
    {
        return $this->hasMany(Review :: class,'review_id');
    }
    public function ratinguser()
    {
        return $this->hasMany(Rating :: class);
    }

    public function savedposts()
    {
        return $this->belongsToMany(Post :: class,'favorites','user_id','post_id')->withTimestamps();
    }
    public function report()
{
    return $this->hasMany(ReportVendor::class,'report_vendor_id');

}
public function vendors()
{
    return $this->belongsToMany(Vendor::class ,'books','user_id','vendor_id')->withPivot('fullname','status_of_book','event_date','description');
}
public function book_posts()
{
    return $this->belongsToMany(Post::class ,'books','user_id','post_id')->withPivot('fullname','status_of_book','event_date','description');
}
public function copuns()
{
    return $this->belongsToMany(Copun::class ,'use_copuns','user_id','copun_id')->withTimestamps();
}

public function vendor_chat()
{
    return $this->belongsToMany(Vendor::class ,'chats','user_id','vendor_id');

}
public function hall_chat()
{
    return $this->belongsToMany(Hall::class ,'chats','user_id','hall_id');
}

}
