<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Products', function (Blueprint $table) {
            $table->tinyInteger('new')->default(0)->after('price');
            $table->tinyInteger('hit')->default(0)->after('new');
            $table->tinyInteger('recomend')->default(0)->after('hit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Products', function (Blueprint $table) {
            $table->dropColumn('new');
            $table->dropColumn('hit');
            $table->dropColumn('recomend');
        });
    }
}
