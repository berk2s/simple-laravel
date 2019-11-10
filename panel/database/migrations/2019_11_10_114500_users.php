<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table){

            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

           $table->bigIncrements('user_id');
           $table->string('username');
           $table->string('password');
           $table->integer('user_role');

           $table->softDeletes();
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
        //
    }
}
