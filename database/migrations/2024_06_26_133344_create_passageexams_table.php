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
        Schema::create('passageexams', function (Blueprint $table) {
            $table->id();
            $table->date('datepassage');
            $table->integer('heurepassage');
            $table->integer('nbprof_required');
            $table->integer('nbprof_enrolled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passageexams');
    }
};
