<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parameter_values', function (Blueprint $table) {
            $table->foreign(['vendor_id'], 'parameter_values_ibfk_2')->references(['vendor_id'])->on('vendors')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['parameter_id'], 'parameter_values_ibfk_1')->references(['parameter_id'])->on('parameters')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parameter_values', function (Blueprint $table) {
            $table->dropForeign('parameter_values_ibfk_2');
            $table->dropForeign('parameter_values_ibfk_1');
        });
    }
};
