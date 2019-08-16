<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'orders';

    /**
     * Run the migrations.
     * @table orders
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->increments('id');
            $table->string('order_id');
            $table->string('product_id');
            $table->string('title');
            $table->decimal('price', 8, 2);
            $table->string('status');
            $table->string('token');
            $table->string('total_price');
            $table->string('buyer');
            $table->string('buyer_id');
            $table->string('destination');
            $table->string('distance_matrix');
            $table->integer('quantity');
            $table->string('valuation');
            $table->string('supplier_id')->nullable()->default(null);
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
