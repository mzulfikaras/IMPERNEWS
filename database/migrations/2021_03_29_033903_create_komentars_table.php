<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentars', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('berita_id')->unsigned();
            $table->string('nama_user');
            $table->text('email_user');
            $table->text('komentar_user');
            $table->text('komentar_admin')->nullable();
            $table->timestamps();

            $table->foreign('berita_id')->references('id')->on('beritas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komentars');
    }
}
