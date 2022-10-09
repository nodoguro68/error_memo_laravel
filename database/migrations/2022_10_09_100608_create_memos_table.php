<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('folder_id')->nullable();
            $table->string('title');
            $table->text('content')->nullable();
            $table->text('attempt')->nullable();
            $table->string('solution')->nullable();
            $table->text('cause')->nullable();
            $table->string('reference')->nullable();
            $table->timestamps();
            $table->boolean('is_solved');
            $table->boolean('is_published');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('category_id')
            ->references('id')->on('categories')
            ->onDelete('cascade');
            $table->foreign('folder_id')
            ->references('id')->on('folders')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memos');
    }
}
