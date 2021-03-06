<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('type');
            $table->string('username')->unique();
            $table->string('phone');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('pin')->default('NULL');
            $table->string('website')->default('NULL');
            $table->string('avatar')->default('NULL');
            $table->string('business_name')->default('NULL');
            $table->string('address')->default('NULL');
            $table->tinyInteger('active')->default(1);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
