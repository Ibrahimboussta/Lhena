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
        'price_type',
        'contact_phone',
        'description',
        'photos',
        'user_id',
        'listing_type',
        'available_from',
        'available_until',
        'date_available'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'proprity_id');
    }
}
