<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'store_name',
        'pic_name',
        'email',
        'phone',
        'province',
        'city',
        'address',
        'pic_photo',
        'ktp_photo',
        'status',
    ];


    public function user() {
        return $this->belongsTo(User::class);
    }
}
