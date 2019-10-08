<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnerPartnerTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_partner_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            // pivot
            $table->unsignedBigInteger('partner_id');
            $table->foreign('partner_id')->references('id')->on('partners');
            // pivot
            $table->unsignedBigInteger('partner_tag_id');
            $table->foreign('partner_tag_id')->references('id')->on('partner_tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partner_partner_tag');
    }
}
