<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('code');
            $table->string('name');
            $table->string('tag');
            $table->string('headline');
            $table->text('summary');
            $table->string('ideal');
            $table->string('display');
            $table->string('method');
            $table->string('frequencies');
            $table->string('weight');
            $table->string('range');
            $table->string('extra');
            $table->json('features');
            $table->json('specs');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
