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
        // schema::table('user', function(Blueprint $table) {
        //   $table->string('profile_img')->nullable()->change();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('user',function(Blueprint $table) {
        //   $table->string('profile_img')->nullable(false)->change();
        // });
    }
};
