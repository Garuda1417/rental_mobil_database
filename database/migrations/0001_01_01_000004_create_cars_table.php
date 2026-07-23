<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('plate_number')->unique();
            $table->unsignedBigInteger('showroom_id')->nullable();
            $table->integer('year')->nullable();
            $table->decimal('price_per_day', 10, 2)->default(0);
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('showroom_id')->references('id')->on('showrooms')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
