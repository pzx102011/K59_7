<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(
            'user_roles',
            function (Blueprint $table) {
                $table->smallInteger('id')->primary();
                $table->string('name');
            }
        );

        Schema::table(
            'users',
            function (Blueprint $table) {
                $table->foreign('role_id')->references('id')->on('user_roles');
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(
            'users',
            function (Blueprint $table) {
                $table->dropForeign('role_id');
            }
        );

        Schema::dropIfExists('user_roles');
    }
};
