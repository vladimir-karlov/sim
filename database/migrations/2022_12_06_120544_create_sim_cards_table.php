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
        Schema::create('sim_cards', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('account_id')->unsigned()->index()->nullable();            
            $table->bigInteger('iccid')->unsigned();            
			$table->boolean('is_active');     
            $table->string('imei',32)->nullable();
            $table->string('notes');
            $table->softDeletes();                            
            $table->timestamps();

			$table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sim_cards');
    }
};
