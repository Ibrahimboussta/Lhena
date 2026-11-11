<?php

namespace Database\Seeders;

use App\Models\Propritie;
use App\Models\User;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        $owner = User::query()->first() ?? User::factory()->create(['role' => 'user']);

        $properties = [
            [
                'title' => 'Demo - Riad avec patio et piscine',
                'property_type' => 'maison',
                'city' => 'Marrakech',
                'neighborhood' => 'Médina',
                'address' => 'Rue Sidi Mimoun, Médina',
                'surface' => 180,
                'bedrooms' => 3,
                'bathrooms' => 3,
                'price' => 2400,
                'price_type' => 'nuit',
                'contact_phone' => '+212600000001',
                'description' => 'Riad lumineux avec patio privatif, piscine et terrasse au cœur de la médina.',
                'amenities' => ['Piscine', 'Terrasse', 'Climatisation', 'Wi-Fi'],
            ],
            [
                'title' => 'Demo - Appartement lumineux près de la plage',
                'property_type' => 'appartement',
                'city' => 'Agadir',
                'neighborhood' => 'Founty',
                'address' => 'Avenue des Dunes, Founty',
                'surface' => 96,
                'bedrooms' => 2,
                'bathrooms' => 2,
                'price' => 8500,
                'price_type' => 'mois',
                'contact_phone' => '+212600000002',
                'description' => 'Appartement meublé avec balcon, à quelques minutes de la plage et des commerces.',
                'amenities' => ['Balcon', 'Parking', 'Meublé', 'Wi-Fi'],
            ],
            [
                'title' => 'Demo - Villa familiale avec jardin',
                'property_type' => 'maison',
                'city' => 'Casablanca',
                'neighborhood' => 'Californie',
                'address' => 'Rue des Oliviers, Californie',
                'surface' => 260,
                'bedrooms' => 4,
                'bathrooms' => 3,
                'price' => 18000,
                'price_type' => 'mois',
                'contact_phone' => '+212600000003',
                'description' => 'Villa spacieuse avec jardin arboré, garage et espace de vie familial.',
                'amenities' => ['Jardin', 'Garage', 'Cuisine équipée', 'Sécurité 24/7'],
            ],
            [
                'title' => 'Demo - Studio moderne au centre-ville',
                'property_type' => 'studio',
                'city' => 'Rabat',
                'neighborhood' => 'Agdal',
                'address' => 'Avenue Fal Ould Oumeir, Agdal',
                'surface' => 48,
                'bedrooms' => 1,
                'bathrooms' => 1,
                'price' => 5200,
                'price_type' => 'mois',
                'contact_phone' => '+212600000004',
                'description' => 'Studio fonctionnel et meublé, proche du tramway, des cafés et des commerces.',
                'amenities' => ['Meublé', 'Ascenseur', 'Climatisation', 'Interphone'],
            ],
            [
                'title' => 'Demo - Duplex avec terrasse panoramique',
                'property_type' => 'duplex',
                'city' => 'Tanger',
                'neighborhood' => 'Malabata',
                'address' => 'Rue de la Corniche, Malabata',
                'surface' => 145,
                'bedrooms' => 3,
                'bathrooms' => 2,
                'price' => 1600,
                'price_type' => 'nuit',
                'contact_phone' => '+212600000005',
                'description' => 'Duplex contemporain avec terrasse aménagée et vue dégagée sur la baie.',
                'amenities' => ['Terrasse', 'Vue panoramique', 'Parking', 'Ascenseur'],
            ],
            [
                'title' => 'Demo - Appartement de charme à Guéliz',
                'property_type' => 'appartement',
                'city' => 'Marrakech',
                'neighborhood' => 'Guéliz',
                'address' => 'Rue Ibn Aïcha, Guéliz',
                'surface' => 78,
                'bedrooms' => 2,
                'bathrooms' => 1,
                'price' => 7000,
                'price_type' => 'mois',
                'contact_phone' => '+212600000006',
                'description' => 'Appartement confortable dans une résidence calme, près des restaurants et boutiques.',
                'amenities' => ['Balcon', 'Ascenseur', 'Cuisine équipée', 'Gardien'],
            ],
            [
                'title' => 'Demo - Maison traditionnelle avec terrasse',
                'property_type' => 'maison',
                'city' => 'Essaouira',
                'neighborhood' => 'Médina',
                'address' => 'Rue Attarine, Médina',
                'surface' => 132,
                'bedrooms' => 3,
                'bathrooms' => 2,
                'price' => 1200,
                'price_type' => 'nuit',
                'contact_phone' => '+212600000007',
                'description' => 'Maison rénovée avec terrasse ensoleillée, à proximité du port et des remparts.',
                'amenities' => ['Terrasse', 'Cheminée', 'Meublé', 'Eau chaude'],
            ],
            [
                'title' => 'Demo - Appartement familial avec piscine',
                'property_type' => 'appartement',
                'city' => 'Tétouan',
                'neighborhood' => 'Cabo Negro',
                'address' => 'Résidence des Pins, Cabo Negro',
                'surface' => 110,
                'bedrooms' => 3,
                'bathrooms' => 2,
                'price' => 1400,
                'price_type' => 'nuit',
                'contact_phone' => '+212600000008',
                'description' => 'Appartement de vacances dans une résidence avec piscine et espaces extérieurs.',
                'amenities' => ['Piscine', 'Parking', 'Balcon', 'Sécurité 24/7'],
            ],
            [
                'title' => 'Demo - Studio cosy près de la corniche',
                'property_type' => 'studio',
                'city' => 'Casablanca',
                'neighborhood' => 'Aïn Diab',
                'address' => 'Boulevard de la Corniche, Aïn Diab',
                'surface' => 52,
                'bedrooms' => 1,
                'bathrooms' => 1,
                'price' => 900,
                'price_type' => 'nuit',
                'contact_phone' => '+212600000009',
                'description' => 'Studio cosy avec accès rapide à la corniche, aux restaurants et aux transports.',
                'amenities' => ['Climatisation', 'Meublé', 'Ascenseur', 'Wi-Fi'],
            ],
            [
                'title' => 'Demo - Villa avec piscine et vue sur l’Atlas',
                'property_type' => 'maison',
                'city' => 'Marrakech',
                'neighborhood' => 'Route de l’Ourika',
                'address' => 'Domaine des Jardins, Route de l’Ourika',
                'surface' => 320,
                'bedrooms' => 5,
                'bathrooms' => 4,
                'price' => 4200,
                'price_type' => 'nuit',
                'contact_phone' => '+212600000010',
                'description' => 'Grande villa avec piscine privée, jardin paysager et vue sur les montagnes de l’Atlas.',
                'amenities' => ['Piscine', 'Jardin', 'Parking', 'Climatisation'],
            ],
        ];

        $demoPhotos = [
            'properties/0b7EQcfEUJ6szQ7oNcYFR5qBFcdQu35QxisGVWqC.jpg',
            'properties/0Kj2Puw5rMbgbpa2eo4JF0V2RE2tCF6WPWhrRHkt.jpg',
            'properties/0RdaYgLDmExG4gWtz6itfNWfcNB7gqdnWEQZoQfb.jpg',
            'properties/0v66cPPX4mbQLxwYJBIUL0kvgnmLeHG7cQuJZJgX.png',
            'properties/143QiTDdfHevLIiBOfMkAP3IsZM10hNahNn9ZdfI.png',
            'properties/1nc8QCIW6RvneoLy5AEGYOQErc84ckHweBaOGfGM.png',
            'properties/1p2Xi28NfVgycz6tL4gzBeLD8kybnB1QWdTEDO0N.png',
            'properties/1qJMDno6kl9LUieQxs0XI55e8jle8GgQ4hGzVwpi.jpg',
            'properties/1ZNk2FO11NePtOUaA9salDAdiidyscp3FzHASQDt.jpg',
            'properties/2kFNLyaHAiE2fAbff7LIFZRTQqCGp2yDVGlLjSQv.jpg',
        ];

        foreach ($properties as $index => $attributes) {
            $amenities = $attributes['amenities'];
            unset($attributes['amenities']);

            $property = Propritie::query()->firstOrCreate(
                [
                    'title' => $attributes['title'],
                    'city' => $attributes['city'],
                    'user_id' => $owner->id,
                ],
                [
                    ...$attributes,
                    'photos' => json_encode([]),
                    'listing_type' => 'À-louer',
                ],
            );

            $property->photos = json_encode([$demoPhotos[$index]]);
            $property->amenities = json_encode($amenities);
            $property->published = true;
            if ($property->isDirty()) {
                $property->save();
            }
        }
    }
}
