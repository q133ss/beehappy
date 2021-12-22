<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixPath1Tables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('category_paths', function(Blueprint $table){
            $table->string('locable_type')->change();
        });

        Schema::table('product_paths', function(Blueprint $table){
            $table->string('locable_type')->change();
        });

        Schema::table('product_size_paths', function(Blueprint $table){
            $table->string('locable_type')->change();
        });

        Schema::table('main_banner_patchs', function(Blueprint $table){
            $table->string('locable_type')->change();
        });
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
