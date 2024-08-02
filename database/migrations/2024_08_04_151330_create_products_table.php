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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained(
                    table: 'users'
                )
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('product_category_id')
                ->constrained(
                    table: 'product_categories'
                )
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('product_branch_id')
                ->nullable()
                ->constrained(
                    table: 'product_branches'
                )
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('code')->unique();
            $table->string('name');
            $table->text('description');
            $table->integer('price');
            $table->integer('quantity');
            $table->json('attributes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
