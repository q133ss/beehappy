<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixPathTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('category_paths', function(Blueprint $table){
            $table->renameColumn('model', 'locable_type');
            $table->renameColumn('model_id', 'locable_id');
        });

        Schema::table('product_paths', function(Blueprint $table){
            $table->renameColumn('model', 'locable_type');
            $table->renameColumn('model_id', 'locable_id');
        });

        Schema::table('product_size_paths', function(Blueprint $table){
            $table->renameColumn('model', 'locable_type');
            $table->renameColumn('model_id', 'locable_id');
        });

        Schema::table('main_banner_patchs', function(Blueprint $table){
            $table->renameColumn('model', 'locable_type');
            $table->renameColumn('model_id', 'locable_id');
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
