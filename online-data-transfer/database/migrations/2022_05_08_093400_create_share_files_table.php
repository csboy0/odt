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
            $table->string('title')->nullable();
            $table->string('filename')->nullable();
            $table->string('recipient_email');
            $table->string('sender_email')->nullable();
            $table->longText('message')->nullable();
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
