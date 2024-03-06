<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'salute',
        'name',
        'email',
        'address',
        'gender',
        'terms',
        'image',
    ];
}
