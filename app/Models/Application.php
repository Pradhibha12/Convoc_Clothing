<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'phone',
        'store_name',
        'store_description', 
        'status'
    ];

    public function user() {
        return $this->belongsTo(User::class)->withDefault();
    }

}
