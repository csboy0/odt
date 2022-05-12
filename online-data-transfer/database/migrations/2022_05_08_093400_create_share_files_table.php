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
        Schema::create('share_files', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('recipient_email');
            $table->string('path');
            $table->string('sender_name')->nullable();
            $table->string('subject')->nullable();
            $table->string('message')->nullable();
            $table->string('code')->nullable();
            $table->string('sharable_link');
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
        Schema::dropIfExists('share_files');
    }
};
