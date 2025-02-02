<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeRegistrationDateToRegistrationNumber extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('smmes', function (Blueprint $table) {
			$table->dropColumn('registration_date');
			$table->string('registration_number')->after('name');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('smmes', function (Blueprint $table) {
			$table->dropColumn('registration_number');
			$table->date('registration_date')->after('name');
		});
	}
}