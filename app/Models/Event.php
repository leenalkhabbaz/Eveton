<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'time',
        'date',

    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function books()
    {
        return $this->hasMany(Book::class);
    }
    public function guest()
{
    return $this->hasMany(Guest::class);

}

}
