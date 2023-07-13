<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable(false);
            $table->text('description')->nullable();
            $table->integer('priority')->nullable();
            $table->date('due_date')->nullable();
            $table->timestamps();
        });

        DB::statement("ALTER TABLE tasks ADD Status ENUM('open', 'in progress', 'completed') DEFAULT 'open' NOT NULL");
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
