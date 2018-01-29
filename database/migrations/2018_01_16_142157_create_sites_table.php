<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->text('site_url');
            $table->smallInteger('statut');
            $table->boolean('slug_statut')->default(0);
            $table->string('slug', 120)->nullable();
            $table->string('title', 50)->nullable();
            $table->boolean('footer_statut')->default(0);
            $table->string('footer_content')->nullable();
            $table->string('template_selectionned')->nullable();
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
        Schema::dropIfExists('sites');
    }
}
