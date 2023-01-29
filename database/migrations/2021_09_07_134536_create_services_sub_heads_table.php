<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesSubHeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_sub_heads', function (Blueprint $table) {
            $table->id();
            $table->string('sub_head')->nullable(false);
            $table->longtext('discription');
            $table->string("s_no");
            $table->string("service_id")->nullable(false);
            $table->string("status")->default('1');
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
        Schema::dropIfExists('services_sub_heads');
    }
}
