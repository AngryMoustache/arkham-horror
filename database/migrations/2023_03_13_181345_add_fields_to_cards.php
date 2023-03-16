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
        Schema::table('cards', function (Blueprint $table) {
            $table->after('type', function (Blueprint $table) {
                $table->string('faction')->nullable();
                $table->string('deck_limit')->nullable();
                $table->string('traits')->nullable();
                $table->string('experience')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cards', function (Blueprint $table) {
            $table->dropColumn('faction');
            $table->dropColumn('deck_limit');
            $table->dropColumn('traits');
            $table->dropColumn('experience');
        });
    }
};
