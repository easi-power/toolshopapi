<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends SuperModel
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'street','number', 'zipcode', 'city', 'user_id', 'country', 'active'
    ];

    protected $hidden = [
        'updated_at', 'created_at', 'user_id'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
