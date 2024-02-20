<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_rating', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('rating')->nullable();
            $table->text('yorum')->nullable();
            $table->unsignedBigInteger('hizmet_alan_id');
            $table->foreign('hizmet_alan_id')
                ->references('id')
                ->on('user')
                ->onDelete('cascade');
            $table->unsignedBigInteger('hizmet_veren_id');
            $table->foreign('hizmet_veren_id')
                ->references('id')
                ->on('user')
                ->onDelete('cascade');
            $table->unsignedBigInteger('hizmet_id');
            $table->foreign('hizmet_id')
                ->references('id')
                ->on('hizmet')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_rating');
    }
}
