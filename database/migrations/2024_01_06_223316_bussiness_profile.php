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
        Schema::create('bussiness_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->decimal('avg_monthly_sale')->nullable();
            $table->decimal('latest_yearly_sale')->nullable();
            $table->decimal('profit_margin_percentage')->nullable();
            $table->decimal('expected_valuation')->nullable();
            $table->decimal('real_valuation')->nullable();
            $table->string('description')->nullable();
            $table->unsignedBigInteger('bussiness_categories_id')->nullable();
            $table->string('total_permanent_employee')->nullable();
            $table->date('established_date')->nullable();

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
        Schema::dropIfExists('bussiness_profiles');

    }
};
