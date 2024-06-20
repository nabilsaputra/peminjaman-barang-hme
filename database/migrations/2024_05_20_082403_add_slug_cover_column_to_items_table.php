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
        Schema::table('items', function (Blueprint $table) {
            $table->string('slug', 100)->nullable()->after('item_name');
            $table->string('cover', 100)->nullable()->after('item_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            if (Schema::hasColumn('items', 'slug')) {
                $table->dropColumn('slug');
            }

            if (Schema::hasColumn('items', 'cover')) {
                $table->dropColumn('cover');
            }
        });
    }
};
