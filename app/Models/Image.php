<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
class Image extends Model
{

    use HasFactory;
    use HasApiTokens ,Notifiable;
    protected $fillable = [
        'post_id',
        'vendor_id',
        'hall_id',
    ];
    // protected $hidden = [
    //     'path',

    // ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }
    public function hall()
    {
        return $this->belongsTo(Hall::class, 'hall_id');
    }

}
