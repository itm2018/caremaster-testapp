<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',255);
            $table->string('last_name', 255);
            $table->string('email',255)->nullable()->unique();
            $table->string('phone', 30)->nullable()->unique();
            $table->unsignedBigInteger('company_id');
            $table->timestamps();
            /*
             * create foreign key for 'company_id' reference to 'id' on companies table
             */
            Schema::enableForeignKeyConstraints();
            $table->foreign('company_id')->references('id')->on('companies');
            Schema::disableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
