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
            $table->after('player_id', function (Blueprint $table) {
                $table->foreignId('investigator_id')->after('player_id')->constrained('cards')->cascadeOnDelete();
                $table->integer('experience')->default(0);
            });

            $table->text('information')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('campaign_player', function (Blueprint $table) {
            $table->dropForeign(['investigator_id']);
            $table->dropColumn('investigator_id');
            $table->dropColumn('experience');
            $table->dropColumn('information');
        });
    }
};
