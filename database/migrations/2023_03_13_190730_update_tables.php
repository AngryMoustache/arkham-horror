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
        Schema::table('campaign_player', function (Blueprint $table) {
            $table->string('deck_id')->nullable();
        });

        Schema::table('cards', function (Blueprint $table) {
            $table->string('starter_deck_id')->after('type')->nullable();
        });

        Schema::dropIfExists('starter_decks');
        Schema::dropIfExists('decks');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
