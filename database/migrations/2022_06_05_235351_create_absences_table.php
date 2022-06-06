<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->date("date");
            $table->boolean("confirmee")->default(0);
            $table->boolean("justifiee")->default(0);
            $table->integer("seance_id");
            $table->integer("etudiant_id");
            $table->timestamps();
            $table->unique(['date', 'seance_id', 'etudiant_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absences');
    }
}
