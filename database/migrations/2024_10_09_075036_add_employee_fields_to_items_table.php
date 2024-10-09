<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmployeeFieldsToItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('items', function (Blueprint $table) {
        $table->string('employee_name')->nullable();
        $table->string('employee_department')->nullable();
        $table->string('employee_id')->nullable();
        $table->string('employee_designation')->nullable();
        $table->string('employee_contact')->nullable();
        $table->string('employee_email')->nullable();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
{
    Schema::table('items', function (Blueprint $table) {
        $table->dropColumn([
            'employee_name', 'employee_department', 'employee_id',
            'employee_designation', 'employee_contact', 'employee_email'
        ]);
    });
}
}
