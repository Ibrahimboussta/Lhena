<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement('ALTER TABLE proprities MODIFY surface INT NULL');
    }

    public function down(): void
    {
        DB::statement('ALTER TABLE proprities MODIFY surface INT NOT NULL');
    }
};
