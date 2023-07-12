<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->integer('parent_id')->nulllable()->change();

        });
        DB::statement("UPDATE categories SET parent_id = 0 WHERE parent_id IS NULL");
        DB::statement('ALTER TABLE categories MODIFY parent_id INT NOT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->integer('parent_id')->nulllable(true)->change();

        });
        DB::statement('ALTER TABLE categories MODIFY parent_id INT NULL');
    }
};
