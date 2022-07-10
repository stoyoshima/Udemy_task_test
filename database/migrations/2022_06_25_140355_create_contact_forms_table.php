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
        Schema::create('contact_forms', function (Blueprint $table) {
            $table->id();
            //氏名、メールアドレス、url、性別、年齢、お問い合わせ内容
            $table->string('your_name', 20);
            $table->string('email', 255);
            $table->string('title', 255);
            $table->string('url', 255);
            $table->longText('description')->nullable($value = true);
            $table->boolean('gender');
            $table->tinyInteger('age');
            $table->string('contact', 200);
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
        Schema::dropIfExists('contact_forms');
    }
};
