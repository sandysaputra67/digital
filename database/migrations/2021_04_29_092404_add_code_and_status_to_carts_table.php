<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCodeAndStatusToCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->string('code')->nullable()->after('customer_name');
            $table->integer('parent_id')->unsigned()->nullable()->after('code');
            $table->string('total_items')->nullable()->after('parent_id');
            $table->decimal('grand_total', 12, 4)->default(0)->after('total_items');
            $table->decimal('discount_amount', 12, 4)->default(0)->after('grand_total');
            $table->string('status')->nullable()->after('discount_amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropColumn('code');
            $table->dropColumn('parent_id');
            $table->dropColumn('grand_total');
            $table->dropColumn('discount_amount');
            $table->dropColumn('status');
        });
    }
}
