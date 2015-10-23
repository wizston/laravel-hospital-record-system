<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'address',
        'phone',
        'date_of_birth',
        'gender',
        'next_of_kin_name',
        'next_of_kin_phone',
        'next_of_kin_gender',
        'next_of_kin_relationship',
        'next_of_kin_address',
        'user_id'
    ];
    //
}
