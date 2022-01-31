<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->constrained()->onDelete('cascade');
            $table->foreignId('inventory_id')->constrained();
            $table->decimal('qty');
            $table->decimal('rate');
            $table->decimal('disc');
            $table->decimal('value')->default(0.00);
            $table->decimal('discAmt')->default(0.00);
            $table->decimal('tax')->default(0.00);
            $table->decimal('total')->default(0.00);
            $table->unique(['invoice_id', 'inventory_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_items');
    }
}
