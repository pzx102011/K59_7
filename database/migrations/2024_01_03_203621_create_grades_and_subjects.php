<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create(
            'subjects',
            function (Blueprint $table) {
                $table->id();
                $table->string('name');

                $table->bigInteger('tutor_id', unsigned: true);
                $table->foreign('tutor_id')->references('id')->on('users')->onDelete('cascade');
            }
        );

        Schema::create(
            'subjects_grades',
            function (Blueprint $table) {
                $table->id();
                $table->smallInteger('grade');
                $table->bigInteger('subject_id', unsigned: true);
                $table->bigInteger('pupil_id', unsigned: true);
                $table->bigInteger('tutor_id', unsigned: true);
                $table->timestamps();

                $table->foreign('tutor_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
                $table->foreign('pupil_id')->references('id')->on('users')->onDelete('cascade');
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists('subjects_grades');
        Schema::dropIfExists('subjects');
    }
};
