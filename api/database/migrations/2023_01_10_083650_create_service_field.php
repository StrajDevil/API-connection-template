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
        Schema::create('service_field', function (Blueprint $table) {
            $table->id();
            $table->foreignId('serviceID')
                ->index()
                ->comment('Service ID')
                ->constrained('services');
            $table->foreignId('fieldID')
                ->index()
                ->comment('Field ID')
                ->constrained('fields');
            $table->foreignId('typeFieldID')
                ->index()
                ->comment('Type Field ID')
                ->constrained('typeFields');
            $table->unique(['serviceID', 'fieldID', 'typeFieldID']);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
            $table->comment('Service to field');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_field');
    }
};
