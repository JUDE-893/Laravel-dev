<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cabin extends Model
{
    protected $fillable = ['name', 'max_capacity', 'regular_price', 'discount', 'description', 'image'];

    // relationship
    public function bookings() {
      return $this->hasMany(Booking::class);
    }
}
