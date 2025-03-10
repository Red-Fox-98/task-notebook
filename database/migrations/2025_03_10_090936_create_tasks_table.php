<?php

declare(strict_types=1);

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
        Schema::create(
            'tasks',
            static function (Blueprint $table) {
                $table->id();
                $table->string('title', 255);
                $table->text('description');
                $table->dateTime('due_date')->nullable();
                $table->dateTime('create_date');
                $table->string('priority');
                $table->string('category');
                $table->string('status');
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
