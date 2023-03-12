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
        Schema::table('campaigns', function (Blueprint $table) {
            $table->foreignId('set_id')->after('set_code')->constrained()->cascadeOnDelete();
            $table->dropColumn('set_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->string('set_code')->after('set_id');
            $table->dropForeign(['set_id']);
            $table->dropColumn('set_id');
        });
    }
};
