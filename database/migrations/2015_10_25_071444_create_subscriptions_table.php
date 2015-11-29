<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function(Blueprint $table)
        {
            $table->increments('id');
			$table->string('subscription_name');
			$table->text('description');
			$table->integer('amt');
			$table->boolean('segment');
			$table->boolean('msg_delivery');
			$table->boolean('jackpot_calls');
			$table->boolean('earlier_calls');
			$table->boolean('telephonic_support');
			$table->boolean('client_query');
			$table->boolean('msg_on_alert');

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
        Schema::drop('subscriptions');
    }

}
