<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Catalog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalog', function (Blueprint $table) {
            $table->increments('itemId');
            $table->string('name');
            $table->double('basePrice');
            $table->string('remark');
            $table->boolean('isActive');
            $table->timestamps();
        });

        Schema::create('client', function (Blueprint $table) {
            $table->increments('clientId');
            $table->string('firstName');
            $table->string('lastName');
            $table->date('birthDate');
            $table->string('contactNo');
            $table->integer('currentLevel');           
        });

        Schema::create('customerLevel', function (Blueprint $table) {
            $table->increments('levelId');
            $table->string('levelName');
            $table->string('remark');        
        });

        Schema::create('eyeSight', function (Blueprint $table) {
            $table->increments('eyeSightId');
            $table->integer('clientId');    
            $table->string('leftEye');    
            $table->string('rightEye');    
            $table->string('remark');    
            $table->date('dateMeasure');    
        });

        Schema::create('orderItem', function (Blueprint $table) {
            $table->increments('orderItemId');
            $table->integer('orderId');    
            $table->integer('catalogId');    
            $table->double('price'); 
        });

        Schema::create('orderStatus', function (Blueprint $table) {
            $table->increments('orderStatusId');
            $table->string('statusName');    
            $table->string('remark');    
        });

        Schema::create('shopOrder', function (Blueprint $table) {
            $table->increments('orderId');
            $table->integer('clientId');  
            $table->date('orderDate');  
            $table->string('status');  
            $table->date('orderFinishDate');
            $table->double('totalPrice');
            $table->string('paymentMethod');
            $table->string('remark');
        });

        // Schema::create('client', function (Blueprint $table) {
        //     $table->id('clientId');
        //     $table->string('firstName');
        //     $table->string('lastName');
        //     $table->date('birthDate');
        //     $table->string('contactNo');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
