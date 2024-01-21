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
        Schema::create('parameter_values', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('vendor_id', 100)->nullable()->index('val_vendor');
            $table->string('parameter_id', 100)->nullable()->index('val_param');
            $table->longText('value')->nullable();
            $table->string('value_type')->nullable();
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('parameter_values');
    }
};
