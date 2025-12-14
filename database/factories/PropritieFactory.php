<?php

namespace Database\Factories;

use App\Models\Propritie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */

class PropritieFactory extends Factory
{

    protected $model = Propritie::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        $photosFolder = public_path('properties');

     $allPhotos = collect(scandir(public_path('properties')))
    ->filter(fn($file) => !in_array($file, ['.', '..']))
    ->map(fn($file) => 'properties/' . $file) // store relative path
    ->toArray();



        return [
            'title' => $this->faker->sentence(3),
            'slug' => $this->faker->slug(),
            'description' => implode("\n\n", $this->faker->paragraphs(12)),
            'address' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'neighborhood' => $this->faker->streetName,
            'price' => $this->faker->numberBetween(2000, 20000),
            'property_type' => $this->faker->randomElement(['Appartement', 'Maison', 'Terrain', 'Villa']),
            'price_type' => $this->faker->randomElement(['USD', 'MAD', 'EUR']),
            'listing_type' => $this->faker->randomElement(['À-louer', 'À-vendre']),
            'bedrooms' => $this->faker->numberBetween(1, 6),
            'bathrooms' => $this->faker->numberBetween(1, 4),
            'surface' => $this->faker->numberBetween(50, 500),
            'contact_phone' => $this->faker->phoneNumber,
            'photos' => json_encode(
                $this->faker->randomElements($allPhotos, min(3, count($allPhotos)))
            ),
            'available_from' => $this->faker->date(),
            'available_until' => $this->faker->date(),
            'published' => $this->faker->boolean(80),
            'amenities' => json_encode($this->faker->randomElements([
                'wifi',
                'parking',
                'elevator',
                'security',
                'ac',
                'heating',
                'furnished',
                'equipped_kitchen',
                'balcony',
                'terrace',
                'garden',
                'pool',
                'gym',
                'concierge'
            ], 5)),
            'user_id' => 1, // Assign a valid user ID or update dynamically in seeder
        ];
    }
}
