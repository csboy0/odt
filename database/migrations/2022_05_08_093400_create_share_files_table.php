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
            $table->string('subject')->nullable();
            $table->longText('fid');
            $table->string('name');
            $table->string('filename')->nullable();
            $table->string('recipient_email')->nullable();
            $table->string('sender_email')->nullable();
            $table->longText('message')->nullable();
            $table->string('code');
            $table->string('sharable_link');
            $table->string('download_link');
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
