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
        Schema::table('lists', function (Blueprint $table) {
            $table->string('img_lists_2')->nullable()->after('img_lists');
            $table->string('img_lists_3')->nullable()->after('img_lists_2');
            $table->string('img_lists_4')->nullable()->after('img_lists_3');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lists', function (Blueprint $table) {
            $table->dropColumn(['img_lists_2', 'img_lists_3', 'img_lists_4']);
        });
    }
};
