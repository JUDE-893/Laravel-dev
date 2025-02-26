<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = ['full_name', 'email', 'national_id','nationality', 'country_flag'];

    // relationship
    public function bookings() {
      return $this->hasMany(Booking::class);
    }
}
