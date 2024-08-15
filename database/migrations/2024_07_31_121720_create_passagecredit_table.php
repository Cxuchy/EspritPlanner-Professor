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
        Schema::create('passagecredit', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usercreditsid');
            $table->timestamps();

            $table->foreign('usercreditsid')->references('id')->on('usercredits')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passagecredit');
    }
};
