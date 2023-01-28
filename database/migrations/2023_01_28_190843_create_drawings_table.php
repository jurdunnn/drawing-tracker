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
        Schema::create('drawings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('tag_id');
            $table->foreignId('project_id');
            $table->boolean('done')->default(false);
            $table->string('name')->index();
            $table->string('file_path');
            $table->timestamp('due_date')->nullable();
            $table->timestamp('start_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drawings');
    }
};
