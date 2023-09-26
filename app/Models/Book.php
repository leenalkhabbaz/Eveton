<?php


namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    use HasApiTokens, Notifiable;
    protected $fillable = [
        'fullname',
        'description',
        'event_date',



    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function vendors()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
    public function events()
    {
        return $this->belongsTo(Event::class, 'vendor_id');

    }
    public function books()
    {
        return $this->hasMany(Hall::class,'hall_id');
    }


}
