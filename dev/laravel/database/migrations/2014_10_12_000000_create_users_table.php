<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('contact_name')->nullable()->default('');
            $table->integer('country_id')->nullable();
            $table->string('state')->nullable()->default('');
            $table->string('city')->nullable()->default('');
            $table->string('postal_code')->nullable()->default('');
            $table->text('address')->nullable();
            $table->string('phone_number')->nullable()->default('');
            // $table->bigInteger('credit')->default(0);
            $table->string('validation_code')->default(0);
            $table->boolean('active')->default(0);
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
