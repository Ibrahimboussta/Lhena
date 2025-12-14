<?php

namespace Database\Seeders;

use App\Models\Propritie;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        $users = User::factory()->count(10)->create(); // create 10 fake users
        // Propritie::factory(50)->make()->each(function ($property) use ($users) {
        //     $property->user_id = $users->random()->id;
        //     $property->save();
        // });
    }
}
