<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
  protected $fillable = ['start_date', 'end_date', 'num_nights',
                         'num_guests','cabin_price', 'extra_price',
                         'total_price', 'status', 'has_breakfast', 'is_paid',
                         'observation', 'cabin_id', 'guest_id'
                       ];
  // relationship
  public function guest() {
    return $this->belongsTo(Guest::class);
  }

  public function cabin() {
    return $this->belongsTo(Cabin::class);
  }
}
