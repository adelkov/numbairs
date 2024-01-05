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
        Schema::create('expenditures', function (Blueprint $table) {
            $table->id();
            $table->enum('currency', ["HUF","EUR"]);
            $table->string('grossAmount');
            $table->enum('type', ["infrastructure","personal","legal","overhead","other","tax","marketing"]);
            $table->string('description');
            $table->string('reference');
            $table->string('merchant');
            $table->date('paidAt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenditures');
    }
};
