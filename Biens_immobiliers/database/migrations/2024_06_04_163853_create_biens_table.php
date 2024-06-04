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
        Schema::create('biens', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->longText('description');
            $table->string('adresse');
            $table->string('image');
            $table->enum('statut',['occupe','pas_occupe']);
            $table->foreignId('user_id')->constrained()->onDelete('set null');
            $table->foreignId('categorie_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biens');
        Schema::table('biens', function (Blueprint $table) {
            $table->dropForeign('biens_user_id_foreign');
            $table->dropForeign('categorie_user_id_foreign');

        });



    }
};
