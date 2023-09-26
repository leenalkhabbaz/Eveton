<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'description',
        'title',
        'imagepost',
    ];


    public function report()
    {
        return $this->belongsTo(ReportVendor::class, 'report_id');
    }
    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class,'post_user','post_id','user_id');
    }
    public function hall()
    {
        return $this->belongsTo(Hall::class, 'hall_id');
    }
    public function image(){
            return $this->hasMany(Image::class);
    }
    public function book_users()
    {
        return $this->belongsToMany(User::class ,'books','post_id','user_id')->withPivot('fullname','status_of_book','event_date','description');;
    }
    public function rating()
    {
        return $this->hasMany(Rating::class);

    }


}
