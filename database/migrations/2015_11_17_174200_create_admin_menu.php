<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_menu', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			$table->integer('fid')->comment('父级ID');
            $table->string('name')->comment('菜单名称');
            $table->string('url')->comment('菜单链接地址');
            $table->integer('sort')->comment('排序');
			$table->integer('status')->comment('是否启用');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admin_menu');
    }
}
