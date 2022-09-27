<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDishIdColToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dishes', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('dish_cover');
            // scrivo che l'id di cat_id fa riferimento all'id della tab categories
            $table->foreign('user_id')
            ->references('id')
            ->on('users');
            // ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dishes', function (Blueprint $table) {
            $table->dropForeign('dishes_user_id_foreign');

            $table->dropColumn('user_id');
        });
    }
}
