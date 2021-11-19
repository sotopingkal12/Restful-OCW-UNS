<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SamlTableSeeder extends Seeder
{

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{


		\DB::table('saml')->delete();

		\DB::table('saml')->insert(array(
			0 =>
			array(
				'id' => 3,
				'saml' => 'PHZW1lbnQ+PC9zYW1sOkFzc2VydGlvbj48L3NhbWxwOlJlc3BvbnNlPg==',
				'created_at' => '2021-11-19 10:37:32',
				'updated_at' => '2021-11-19 10:37:32',
			),
		));
	}
}
