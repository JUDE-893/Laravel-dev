<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = ['user_id','wikipediaId','description',
                           'date','countryFlag','countryName',
                           'cityName','lat','lng'];

    protected $table = 'trip';

    public function user() {
      return $this->belongsTo(User::class);
    }

}
