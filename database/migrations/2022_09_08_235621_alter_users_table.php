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
        Schema::table('users', function (Blueprint $table) 
        { 
            $table->string('city');
            $table->string('address');
            $table->string('phone');
            $table->string('document');
            $table->string('role')->default('client'); 
            $table->integer('balance');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) 
        { 
            $table->dropColumn(['city']); 
            $table->dropColumn(['address']); 
            $table->dropColumn(['phone']); 
            $table->dropColumn(['document']); 
            $table->dropColumn(['role']); 
            $table->dropColumn(['balance']);
        });
    }
};
