<?php

namespace App\Models;

use App\Helper\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class customer extends Model
{
    use HasFactory, UUID;
    protected $keyType  = 'string';
    public $incrementing = false;

    protected $fillable = [
        'first_name',
        'last_name',
        'birth_day',
        'place_birth',
        'email',
        'mobilephone',
        'address',
        'city',
        'country'
    ];
}
