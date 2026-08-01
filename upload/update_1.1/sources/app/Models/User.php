<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
  
     use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
        'role_id',
        'is_vendor',
        'photo',
        'phone',
        'address',
        'city',
        'state',
        'zip',
        'status',
        'date_of_birth',
        'gender',
        'email_verified_at',
        'temp'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role() {
        return $this->belongsTo(Role::class)->withDefault();
    }
    public function scopeCustomers() {
        return $this->where('user_type', 'customer');
    }
    public function scopeStaffs() {
        return $this->where('user_type', 'staff');
    }
    public function scopeAdmins() {
        return $this->where('user_type', 'admin');
    }

    public function wishlist_items() {
        return $this->hasMany(Wishlist_item::class);
    }

    public function city() {
        return $this->belongsTo(City::class)->withDefault();
    }
    
    public function shipping_addresses() {
        return $this->hasMany(Shipping_address::class);
    }
    

}
