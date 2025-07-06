<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->bigInteger('tailor_id')->unsigned()->nullable()->after('advance_payment');
            $table->integer('assigned_by')->unsigned()->nullable()->after('tailor_id');
            $table->dateTime('assigned_at')->nullable()->after('assigned_by');
            //foreign key
            $table->foreign('tailor_id')->references('id')->on('tailors');
            $table->foreign('assigned_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('', function (Blueprint $table) {

        });
    }
};
