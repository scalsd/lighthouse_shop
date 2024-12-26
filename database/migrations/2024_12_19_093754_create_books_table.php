<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->integer('author_id');
            $table->integer('series_id');
            $table->integer('category_id');
            $table->integer('publishing_house_id');
            $table->string('age_limit')->nullable();
            $table->year('year')->nullable();
            $table->integer('amount_pages')->nullable();
            $table->string('binding_type')->nullable();
            $table->string('format')->nullable();
            $table->integer('weight')->nullable();
            $table->float('price')->default(0);
            $table->integer('stock')->default(0);
            $table->string('isbn');
            $table->text('description')->nullable();
            $table->string('book_cover_1')->nullable();
            $table->string('book_cover_2')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
            $table->foreign('series_id')->references('id')->on('series')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('publishing_house_id')->references('id')->on('publishing_houses')->onDelete('cascade');
            $table->timestamps();
           
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
