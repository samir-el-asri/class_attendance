<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('etudiants')) {
            Schema::create('etudiants', function (Blueprint $table) {
                $table->id();
                $table->string("nom");
                $table->string("prenom");
                $table->char('sexe', 1);
                $table->integer("age");
                $table->integer("classe_id");
                $table->string('email')->unique();
                $table->string('password');
                $table->integer("user_id")->nullable();
                $table->string("profilePhoto");
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudiants');
    }
}
