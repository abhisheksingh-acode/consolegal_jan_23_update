<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_contents', function (Blueprint $table) {
            $table->id();
            $table->string("form_name_id")->nullable(false);
            $table->string("form_content")->nullable(false);
            $table->string("required")->dafault("0");
            $table->string("type")->dafault("text");
            $table->string("status")->dafault("0");
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
        Schema::dropIfExists('form_contents');
    }
}
