<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoxPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('box_permissions', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('box_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->foreign('box_id')
                  ->references('id')->on('boxes')
                  ->onDelete('cascade');
            $table->boolean('is_owner');
            $table->boolean('can_edit_contents');
            $table->boolean('can_share');
            $table->boolean('can_revoke_shares');
            $table->boolean('can_edit_box_settings');
            $table->boolean('can_edit_contents_settings');
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
        Schema::drop('box_permissions');
    }
}

