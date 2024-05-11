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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('slug');
            $table->string('description');
            $table->string('duration');
            $table->string('image');
            $table->string('category_id')->nullable()->constrained('categories');

            //featured 1->active && 2->inactive
            $table->tinyinteger('featured')->default(1);

            //visibility 1->yes && 2->no
            $table->tinyinteger('visibility')->default(1);
            $table->string('price');
            $table->string('discount_price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
