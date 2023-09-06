<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->id();
            $table->string('month', 4);
            $table->string('year', 4);
            $table->unsignedInteger('total_income');
            $table->unsignedInteger('total_outcome');
            $table->unsignedInteger('balance');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('balances');
    }
};
