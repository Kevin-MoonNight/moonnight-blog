<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description');
            $table->timestamps();
        });

        DB::table('roles')->insert(
            array(
                [
                    'name' => '管理員',
                    'slug' => 'administrator',
                    'description' => '擁有所有權限'
                ],
                [
                    'name' => '客服',
                    'slug' => 'customer-service',
                    'description' => '擁有管理訊息的權限'
                ],
                [
                    'name' => '筆者',
                    'slug' => 'author',
                    'description' => '擁有寫文章的權限'
                ]
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
