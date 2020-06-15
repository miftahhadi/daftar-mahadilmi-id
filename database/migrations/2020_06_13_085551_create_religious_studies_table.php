<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReligiousStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('religious_studies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registrant_id')->constrained();
            $table->string('bahasa_arab');
            $table->string('riwayat_tahsin');
            $table->string('hafalan');
            $table->timestamps();

            $table->index('registrant_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('religious_studies');
    }
}
