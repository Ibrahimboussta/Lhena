<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('proprities', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Title of the property
            $table->string('property_type'); // Type of property (appartment, house, etc.)
            $table->string('price_type')->nullable()->default(null);
            $table->string('city'); // City where the property is located
            $table->string('neighborhood'); // Neighborhood of the property
            $table->string('address'); // Complete address of the property
            $table->integer('surface'); // Surface area of the property in square meters
            $table->integer('bedrooms'); // Number of bedrooms
            $table->integer('bathrooms'); // Number of bathrooms
            $table->decimal('price', 10, 2); // Price of the property
            $table->string('contact_phone'); // Contact phone number
            $table->text('description')->nullable(); // Detailed description of the property (optional)
            $table->json('photos'); // Photos of the property stored as JSON
            $table->string('listing_type'); // Photos of the property stored as JSON
            $table->unsignedBigInteger('user_id'); // Foreign key to the User table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Foreign key constraint (cascade delete)
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proprities');
    }
};
