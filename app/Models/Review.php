<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
      protected $fillable = ['user_id', 'proprity_id', 'rating', 'comment'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function proprity()
    {
        return $this->belongsTo(Propritie::class, 'proprity_id');
    }
}
