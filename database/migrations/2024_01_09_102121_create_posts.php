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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('post_title')->nullable();
            $table->text("description")->nullable();
            $table->string('company_name')->nullable();
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('royality')->nullable();
            $table->string('post_type')->nullable();
            $table->string('investment_amount')->nullable();
            $table->string('industry')->nullable();
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('postable_id')->nullable();
            $table->string('postable_type')->nullable();
            $table->unsignedBigInteger('created_by')->nullable()->comment('from users table');
            $table->unsignedBigInteger('updated_by')->nullable()->comment('from users table');
            $table->unsignedBigInteger('deleted_by')->nullable()->comment('from users table');
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
        Schema::dropIfExists('posts');
    }
};
