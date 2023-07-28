<?php

use App\Models\MicroDistrict;
use App\Models\Orient;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent_apartments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MicroDistrict::class)->nullable();
            $table->foreignIdFor(Orient::class)->nullable();
            $table->integer("price");
            $table->integer('num_rooms');
            $table->enum('type',['yer joy',"ko\'p qavatli uy"]);
            $table->text('description');
            $table->integer('phone');
            $table->string('telegram')->nullable();
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
        Schema::dropIfExists('rent_apartments');
    }
};
