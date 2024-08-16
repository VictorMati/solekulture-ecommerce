<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('full_name');
            $table->text('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->timestamp('signup_date')->useCurrent();
            $table->string('profile_image')->nullable();
            $table->enum('auth_type', ['local', 'google', 'facebook', 'microsoft'])->default('local');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
