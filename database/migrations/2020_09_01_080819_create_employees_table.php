<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            $table->integer('department_id');
            $table->integer('role_id');
            $table->string('name', 100);
            $table->string('phone');
            $table->string('address', 200)->nullable();
            $table->string('email')->unique();
            $table->date('join_date');
            $table->date('resign_date');
            $table->integer('gender');
            $table->float('salary',12);
            $table->string('password');
            $table->string('image')->default('user.png');
            $table->softDeletes();
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
        Schema::dropIfExists('employees');
    }
}
