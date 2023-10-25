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
        Schema::table('clients', function (Blueprint $table) {
            $table->boolean('is_active')->default(true);
            $table->string('name');
            $table->string('email')->nullable();
            $table->boolean('notify')->default(true);
            $table->string('phone_number');
            $table->string('address')->nullable();
            $table->boolean('is_company')->default(false);
            $table->text('notes')->nullable();
          
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function($table) {
            $table->dropColumn('is_active');
            $table->dropColumn('name');
            $table->dropColumn('email');
            $table->dropColumn('notify');
            $table->dropColumn('phone_number');
            $table->dropColumn('address');
            $table->dropColumn('is_company');
            $table->dropColumn('notes');
        });
    }
};
