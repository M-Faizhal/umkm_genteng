<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_categories');
            $table->string('nama');
            $table->text('desc')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('telp')->nullable();
            $table->string('owner')->nullable();
            $table->year('year')->nullable();
            $table->longText('full_desc')->nullable();
            $table->text('about')->nullable();
            $table->text('products')->nullable();
            $table->string('op_hour')->nullable();
            $table->string('img_lists')->nullable();
            $table->timestamps();

            $table->foreign('id_categories')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('lists');
    }
};
