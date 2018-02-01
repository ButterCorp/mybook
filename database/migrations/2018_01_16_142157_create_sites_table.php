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
            $table->smallInteger('statut');
            $table->text('site_url');
            $table->string('title', 50)->nullable();
            $table->string('template_selectionned')->nullable();
            $table->boolean('slug_statut')->default(1);
            $table->string('slug_content', 120)->nullable();
            $table->boolean('footer_statut')->default(1);
            $table->string('footer_content')->nullable();
            $table->boolean('network_statut')->default(0);
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('google_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('linkedin_url')->nullable();
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
