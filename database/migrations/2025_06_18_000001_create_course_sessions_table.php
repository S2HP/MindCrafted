<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('course_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->string('location');
            $table->integer('capacity');
            $table->decimal('price', 8, 2);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('course_sessions');
    }
};
