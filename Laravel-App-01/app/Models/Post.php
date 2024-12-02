<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use App\Models\User;


class Post extends Model
{

    // (!) define what tables column must be filled when inserting a record
    protected $fillable = [
      'title','contentBody','user_id'
    ];

    // (opt) defining the name of the table (if not the plural of the model name)
    protected $table = 'posts';

    // set relationship : Many-To-One
    public function user() {
      return $this->belongsTo(User::class);
    }
}
