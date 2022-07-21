<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketingVisitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketing_visit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_customer'); 
            $table->string('user');    
            $table->string('alamat'); 
            $table->string('meeting_point'); 
            $table->timestamp('date');    
            $table->text('service_offer');   
            $table->string('progress');    
            $table->string('flaq');



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
        Schema::dropIfExists('marketing_visit');
    }
}
