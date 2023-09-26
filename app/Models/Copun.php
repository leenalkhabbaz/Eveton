<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Copun extends Model
{
    use HasFactory;
    protected $fillable = [
        'datefinish',
        'period_of_copun',
        'amount',
        'code_owner',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class ,'use_copuns','copun_id','user_id')->withTimestamps();
    }
    public function admins()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }


}
