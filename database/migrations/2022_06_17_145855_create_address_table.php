<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('user_id') -> nullable();
            $table ->foreign('user_id')-> references('id')->on('users') ->onDelete('cascade');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->string('zip-code');
            $table->softDeletes();
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
        Schema::dropIfExists('address');
    }
}
