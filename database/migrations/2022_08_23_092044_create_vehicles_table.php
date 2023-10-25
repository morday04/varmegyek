<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    const TABLENAME = 'vehicles';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists(self::TABLENAME);
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->boolean('is_active')->default(true);
            $table->integer('id_category')->index()->nullable();
            $table->integer('id_manufacturer')->index()->nullable();
            $table->integer('id_type')->index()->nullable();
            $table->integer('id_fuel')->index()->nullable();
            $table->integer('id_cassis')->index()->nullable();

            $table->string('registration_plate')->index();
            $table->string('vin')->index()->unique()->nullable();
            $table->date('valid_until')->nullable();
            $table->text('notes')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::TABLENAME);
    }
}
