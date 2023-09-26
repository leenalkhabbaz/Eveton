<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportVendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vendor_id',
        'hall_id',
        'reason',
        'seen_by_admin',
    ];

    public function reportUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function reportVendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
    public function reportHall()
    {
        return $this->belongsTo(Hall::class, 'hall_id');
    }

}
