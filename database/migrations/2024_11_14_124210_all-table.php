<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use
    Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tb_extracurricular', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->string('logo')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('tb_gallery', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['photo', 'video']);
            $table->longText('file');
            $table->timestamps();
        });

        Schema::create('tb_achievements', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('member');
            $table->string('champion', 50);
            $table->string('photo');
            $table->year('year');
            $table->string('certificate')->nullable();
            $table->timestamps();
        });

        Schema::create('tb_facility', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('photo_path')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('tb_major', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60)->unique();
            $table->string('logo')->nullable();
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('tb_students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('major_id')->constrained('tb_major');
            $table->enum('class', ['10', '11', '12']);
            $table->enum('semester', ['1', '2']);
            $table->integer('amount');
            $table->timestamps();
        });

        Schema::create('tb_teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('nip', 50)->unique();
            $table->string('photo')->nullable();
            $table->enum('sex', ['laki-laki', 'perempuan']);
            $table->foreignId('major_id')->constrained('tb_major');
            $table->timestamps();
        });

        Schema::create('tb_subject', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->enum('semester', ['1', '2']);
            $table->enum('class', ['10', '11', '12']);
            $table->foreignId('major_id')->constrained('tb_major');
            $table->timestamps();
        });

        Schema::create('tb_accreditation', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('certificate')->nullable();
            $table->foreignId('major_id')->unique()->constrained('tb_major');
            $table->timestamps();
        });

        Schema::create('tb_graduation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('major_id')->constrained('tb_major');
            $table->integer('year');
            $table->string('pdf');
            $table->timestamps();
        });

        Schema::create('tb_news', function (Blueprint $table) {
            $table->id('news_id');
            $table->string('title', 100)->unique();
            $table->text('content');
            $table->string('author', 100);
            $table->string('thumbnail')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        Schema::create('tb_about', function (Blueprint $table) {
            $table->id('id');
            $table->text('description');
            $table->string('photo');
            $table->string('video');
            $table->timestamps();
        });

        Schema::create('tb_welcome', function (Blueprint $table) {
            $table->id('id');
            $table->text('headmaster');
            $table->text('nip');
            $table->longText('words');
            $table->string('photo')->nullable();
            $table->timestamps();
        });

        Schema::create('tb_future', function (Blueprint $table) {
            $table->id('id');
            $table->longText('vision')->nullable();
            $table->longText('mission')->nullable();
            $table->longText('goals')->nullable();
            $table->timestamps();
        });

        Schema::create('tb_contact', function (Blueprint $table) {
            $table->id('id');
            $table->text('instagram')->nullable();
            $table->text('facebook')->nullable();
            $table->text('mail')->nullable();
            $table->text('whatsapp')->nullable();
            $table->timestamps();
        });

        Schema::create('tb_organizational', function (Blueprint $table) {
            $table->id();
            $table->string('name', 65);
            $table->integer('nip')->nullable();
            $table->string('jabatan', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_graduation');
        Schema::dropIfExists('tb_accreditation');
        Schema::dropIfExists('tb_subject');
        Schema::dropIfExists('tb_teachers');
        Schema::dropIfExists('tb_students');
        Schema::dropIfExists('tb_major');
        Schema::dropIfExists('tb_facility');
        Schema::dropIfExists('tb_achievements');
        Schema::dropIfExists('tb_gallery');
        Schema::dropIfExists('tb_extracurricular');
        Schema::dropIfExists('tb_news');
        Schema::dropIfExists('tb_about');
        Schema::dropIfExists('tb_welcome');
        Schema::dropIfExists('tb_future');
        Schema::dropIfExists('tb_contact');
        Schema::dropIfExists('tb_organizational');
    }
};
