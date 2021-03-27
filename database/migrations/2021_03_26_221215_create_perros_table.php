<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perros', function (Blueprint $table) {
            $table->id();
            $table->string('perro_nombre', 100)->unique();
            $table->string('perro_color', 50)->nullable();
            $table->integer('perro_edad')->nullable();
            $table->unsignedBigInteger('perro_raza_id')->nullable();
            $table->foreign('perro_raza_id')->references('id')->on('razas')->onDelete('set null');
            $table->softDeletes('deleted_at', 0);
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
        Schema::dropIfExists('perros');
    }
}
