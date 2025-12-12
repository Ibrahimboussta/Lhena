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
            $table->string('title');
            $table->string('property_type');
            $table->string('price_type')->nullable()->default(null);
            $table->string('city');
            $table->string('neighborhood');
            $table->string('address');
            $table->integer('surface');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->decimal('price', 10, 2);
            $table->string('contact_phone');
            $table->text('description')->nullable();
            $table->json('photos');
            $table->string('listing_type');
            $table->date('available_from')->nullable();
            $table->date('available_until')->nullable();
            $table->boolean('published')->default(false);
            $table->string('slug')->unique()->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
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
