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
        Schema::create('investor_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->string('location')->nullable();
            $table->decimal('investment_range')->nullable();
            $table->string('proffession')->nullable();
            $table->string('company_name')->nullable();
            $table->string('designation')->nullable();
            $table->string('photo')->nullable();
            $table->string('linkedin_profile')->nullable();

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
        Schema::dropIfExists('investor_profiles');
    }
};
