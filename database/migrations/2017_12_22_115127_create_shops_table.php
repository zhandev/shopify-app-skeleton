<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->char("name");
            $table->char("email");
            $table->char("domain");
            $table->char('created_at');
            $table->char("province");
            $table->char("country");
            $table->char("address1");
            $table->char("zip");
            $table->char("city");
            $table->char("customer_email")->nullable();
            $table->char("phone");
            $table->char("updated_at");
            $table->char("country_code");
            $table->char("country_name");
            $table->char("currency");
            $table->char("shop_owner");
            $table->char("money_format");
            $table->char("plan_name");
            $table->char("plan_display_name");
            $table->char("myshopify_domain");
            $table->char("money_in_emails_format");
            $table->char("token");
            $table->boolean('status');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
