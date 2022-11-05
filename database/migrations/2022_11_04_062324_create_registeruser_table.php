<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisteruserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registeruser', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobile')->nullable();
             $table->string('email')->unique();
              $table->timestamp('email_verified_at')->nullable();
             $table->string('password')->nullable();
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
        Schema::dropIfExists('registeruser');
    }
}
