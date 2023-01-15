<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_trips', function (Blueprint $table) {
            $table->id();
            $table->date('departure_date');
            $table->date('return_date');
            $table->text('description');
            $table->enum('status',['pending','approved','rejected'])->default('pending');
            $table->foreignId('user_id');
            $table->foreignId('city_id_1');
            $table->foreignId('city_id_2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_trips');
    }
}
