<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create(
            'subject',
            function (Blueprint $table) {
                $table->id();
                $table->string('name');

                $table->bigInteger('tutor_id', unsigned: true);
                $table->foreign('tutor_id')->references('id')->on('users');
            }
        );

        Schema::create(
            'subject_grade',
            function (Blueprint $table) {
                $table->smallInteger('grade');
                $table->bigInteger('subject_id', unsigned: true);
                $table->bigInteger('pupil_id', unsigned: true);
                $table->timestamps();

                $table->foreign('subject_id')->references('id')->on('subject');
                $table->foreign('pupil_id')->references('id')->on('users');
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists('subject');
    }
};
