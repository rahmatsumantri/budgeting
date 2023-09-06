<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('outcomes', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            
            $table->unsignedBigInteger('outcome_category_id');
            $table->foreign('outcome_category_id')->references('id')->on('outcome_categories');

            $table->string('name', 64);
            $table->text('description')->nullable();
            $table->unsignedInteger('budget');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('outcomes');
    }
};
