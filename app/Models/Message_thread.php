<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message_thread extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_one',
        'user_two'
    ];

    public function user()
    {
        $user = $this->belongsTo(User::class, 'user_one', 'id');

        if ($user->value('id') != auth()->user()->id) {
            return $user;
        } else {
            return $this->belongsTo(User::class, 'user_two', 'id');
        }
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
