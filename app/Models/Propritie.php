<?php

namespace App\Models;

use App\Traits\HashId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Propritie extends Model
{
    use HashId;
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($property) {
            // Delete associated reviews
            $property->reviews()->delete();

            // Delete associated photos from storage
            $photos = json_decode($property->photos, true) ?? [];
            foreach ($photos as $photo) {
                if (Storage::disk('public')->exists($photo)) {
                    Storage::disk('public')->delete($photo);
                }
            }
        });
    }

    public function getSlugAttribute()
    {
        $city = Str::slug($this->city);
        $title = Str::slug($this->title);
        return "{$city}-{$title}-{$this->hashed_id}";
    }
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
        'date_available',
        'amenities',
        'slug'
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
