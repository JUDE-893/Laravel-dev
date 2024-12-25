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
        Schema::create('trip', function(Blueprint $table){
          $table->id();
          $table->string('cityName');
          $table->string('countryName');
          $table->string('countryFlag');
          $table->decimal('lat',10,6);
          $table->decimal('lng',10,6);
          $table->date('date');
          $table->text('description');
          $table->string('wikipediaId');
          $table->unsignedBigInteger('user_id');
          $table->foreign('user_id')    // The column that will reference the primary key
              ->references('id')     // The column in the 'users' table
              ->on('users')          // The table that contains the referenced column
              ->onDelete('cascade'); 
          $table->timesTamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
