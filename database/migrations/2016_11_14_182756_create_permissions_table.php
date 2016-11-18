<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 60)->index();
            $table->string('name', 60);
            $table->string('description', 400);
            $table->boolean('site')->default(0);
            $table->boolean('dashboard')->default(0);
            $table->boolean('blog')->default(0);
            $table->boolean('image')->default(0);
            $table->boolean('user')->default(0);
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
        Schema::dropIfExists('permissions');
    }
}
