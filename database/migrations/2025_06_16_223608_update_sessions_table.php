<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void {
        Schema::table('sessions', function (Blueprint $table) {
            if (!Schema::hasColumn('sessions', 'title')) {
                $table->string('title')->nullable();
            }
            if (!Schema::hasColumn('sessions', 'description')) {
                $table->text('description')->nullable();
            }
            if (!Schema::hasColumn('sessions', 'start_time')) {
                $table->timestamp('start_time')->nullable();
            }
            if (!Schema::hasColumn('sessions', 'end_time')) {
                $table->timestamp('end_time')->nullable();
            }
            if (!Schema::hasColumn('sessions', 'location')) {
                $table->string('location')->nullable();
            }
            if (!Schema::hasColumn('sessions', 'capacity')) {
                $table->integer('capacity')->nullable();
            }
            if (!Schema::hasColumn('sessions', 'price')) {
                $table->decimal('price', 8, 2)->nullable();
            }
            // Skip user_id, already exists
        });
    }

    public function down(): void {
        Schema::table('sessions', function (Blueprint $table) {
            $table->dropColumn([
                'title',
                'description',
                'start_time',
                'end_time',
                'location',
                'capacity',
                'price',
            ]);
        });
    }
};

