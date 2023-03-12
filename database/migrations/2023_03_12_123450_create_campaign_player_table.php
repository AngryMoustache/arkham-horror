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
        Schema::create('campaign_player', function (Blueprint $table) {
            $table->foreignId('campaign_id')->constrained();
            $table->foreignId('player_id')->constrained();
            $table->integer('mental_trauma')->default(0);
            $table->integer('physical_trauma')->default(0);
            $table->boolean('killed')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaign_player');
    }
};
