<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
      'min_booking_length', 'max_booking_length', 'max_guest_per_booking', 'breakfast_price'
    ];


}
