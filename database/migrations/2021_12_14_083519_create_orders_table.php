<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(App\Models\Customer::class);
            $table->foreignIdFor(App\Models\ServiceProvider::class)->nullable();
            $table->string('billing_address');
            $table->timestamps();
        });
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(App\Models\Order::class);
            $table->integer('aircon_number');
            $table->string('service_type');
            $table->float('price')->nullable();
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
        Schema::dropIfExists('orders');
        Schema::dropIfExists('services');
    }
}
