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
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('national_code')->unique();
            $table->enum('gender',['male' , 'female']);
            $table->string('password')->nullable();
            $table->foreignId('father_id')->nullable()->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('mother_id')->nullable()->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('spouse_id')->nullable()->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('email')->nullable();
            $table->string('phone',13)->nullable();
            $table->string('address')->nullable();
            $table->timestamp('DOB')->nullable();
            $table->integer('other_access_level')->default(0);
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
