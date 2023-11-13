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
        Schema::create('logbook', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('category'); // 1 = daily, 2 = weekly, 3 = monthly, 4 = akhir
            $table->date('date');
            $table->string('hari');
            $table->string('location');
            $table->string('field1');
            $table->string('field2');
            $table->string('field3');
            $table->text('field4');
            $table->string('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logbook');
    }
};
