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
        Schema::create("playlist_movies",function(Blueprint $table){
            $table->foreignId("playlist_id")->constrained("playlists");
            $table->foreignId("movie_id")->constrained("movies");

            $table->primary(["playlist_id","movie_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
