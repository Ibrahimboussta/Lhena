<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propritie extends Model
{
    //
    protected $table = 'proprities';
    protected $fillable = [
        'title',
        'property_type',
        'city',
        'neighborhood',
        'address',
        'surface',
        'bedrooms',
        'bathrooms',
        'price',
        'contact_phone',
        'description',
        'photos',
        'user_id', 
        'listing_type',  // Add this line to the fillable array

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
