<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    const TABLE_NAME = 'clients';
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists(self::TABLE_NAME);
        
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
};
