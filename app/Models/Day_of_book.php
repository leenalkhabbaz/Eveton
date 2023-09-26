<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day_of_book extends Model
{
    use HasFactory;
    protected $fillable = [
        'day_of_book',

    ];
    public function vendors()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
    public function halls()
    {
        return $this->belongsTo(Hall::class, 'hall_id');
    }
}
