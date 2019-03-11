<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('active_people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date');
            $table->string('category')->nullable();
            $table->string('type')->nullable();
            $table->string('membership_id');
            $table->string('email');
            $table->string('phone');
            $table->string('address_line_1');
            $table->string('address_line_2')->nullable();
            $table->string('city');
            $table->string('province');
            $table->string('zip_code')->nullable();
            $table->string('country')->nullable();
            $table->integer('team_id')->unsigned();
            $table->integer('person_id')->unsigned();
            $table->foreign('team_id')
                ->references('id')
                ->on('teams')
                ->onDelete('SET NULL');
            $table->foreign('person_id')
                ->references('id')
                ->on('people')
                ->onDelete('SET NULL');
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
        Schema::drop('active_people');
    }


}
