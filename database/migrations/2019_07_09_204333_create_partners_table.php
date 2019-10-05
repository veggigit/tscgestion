<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            // personal
            $table->bigIncrements('id');
            $table->string('rut')->unique();
            $table->string('first_name');
            $table->string('second_name')->nullable();
            $table->string('first_surname');
            $table->string('second_surname');
            $table->string('phone')->nullable();
            $table->string('personal_email')->nullable();
            $table->date('birthday')->nullable();
            $table->tinyInteger('social_charges')->nullable();
            // fk
            $table->unsignedBigInteger('civil_status_id')->nullable();
            $table->foreign('civil_status_id')->references('id')->on('civil_statuses')
            ->onUpdate('cascade')
            ->onDelete('set null');
            // fk
            $table->unsignedBigInteger('region_id')->nullable();
            $table->foreign('region_id')->references('id')->on('regions')
            ->onUpdate('cascade')
            ->onDelete('set null');

            $table->string('address')->nullable();
            // corporative
            $table->string('corporative_email')->nullable();
            // fk
            $table->unsignedBigInteger('office_id')->nullable();
            $table->foreign('office_id')->references('id')->on('offices')
            ->onUpdate('cascade')
            ->onDelete('set null');

            $table->date('date_admission')->nullable();
            // fk
            $table->unsignedBigInteger('partner_status_id')->nullable();
            $table->foreign('partner_status_id')->references('id')->on('partner_statuses')
            ->onUpdate('cascade')
            ->onDelete('set null');

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
        Schema::dropIfExists('partners');
    }
}
