<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('company_profiles', function (Blueprint $table) {
        $table->id();
        $table->string('companyName')->nullable();
        $table->string('phoneNum')->nullable();
        $table->string('email')->unique()->nullable();
        $table->string('firstName')->nullable();
        $table->string('lastName')->nullable();
        $table->string('title')->nullable();
        $table->string('countryName')->nullable();
        $table->string('requestType')->nullable();
        $table->string('existingSystem')->nullable();
        $table->string('password')->nullable();

        $table->json('businessType')->nullable();
        $table->string('otherBusinessType')->nullable();
        $table->json('businessGroup')->nullable();
        $table->string('goodService')->nullable();
        $table->string('otherBusinessGroup')->nullable();
        $table->json('businessIndustry')->nullable();
        $table->string('otherBusinessIndustry')->nullable();
        $table->string('numOfEmployee')->nullable();

        $table->string('street')->nullable();;
        $table->string('city')->nullable();;
        $table->string('state')->nullable();
        $table->string('zipCode')->nullable();
        $table->integer('numOfCountry')->nullable();
        $table->integer('numOfBranches')->nullable();
        $table->text('branchLocation')->nullable();

        $table->text('selectedPackage')->nullable();
        $table->json('totalAmount')->nullable();

        
        
       
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_profiles');
    }
};
