<?php

class HotelsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('hotels')->delete();
        
		\DB::table('hotels')->insert(array (
			0 => 
			array (
				'id' => 2,
				'name' => 'La cucaracha II',
				'nearest_airport_id' => NULL,
				'address_id' => 26,
				'updated_at' => '2014-09-26 11:17:38',
				'created_at' => '2014-09-26 11:16:40',
				'deleted_at' => NULL,
			),
			1 => 
			array (
				'id' => 3,
				'name' => 'La cucaracha III',
				'nearest_airport_id' => NULL,
				'address_id' => 31,
				'updated_at' => '2014-09-26 15:19:30',
				'created_at' => '2014-09-26 15:19:30',
				'deleted_at' => NULL,
			),
			2 => 
			array (
				'id' => 4,
				'name' => 'La cucaracha I',
				'nearest_airport_id' => NULL,
				'address_id' => 32,
				'updated_at' => '2014-09-29 10:01:41',
				'created_at' => '2014-09-26 15:19:47',
				'deleted_at' => NULL,
			),
			3 => 
			array (
				'id' => 5,
				'name' => 'Radisson Blue',
				'nearest_airport_id' => NULL,
				'address_id' => 492,
				'updated_at' => '2014-11-14 13:40:09',
				'created_at' => '2014-11-14 13:40:09',
				'deleted_at' => NULL,
			),
			4 => 
			array (
				'id' => 6,
				'name' => 'Kempinski Hotel',
				'nearest_airport_id' => NULL,
				'address_id' => 494,
				'updated_at' => '2014-11-19 12:27:24',
				'created_at' => '2014-11-19 12:27:24',
				'deleted_at' => NULL,
			),
			5 => 
			array (
				'id' => 7,
				'name' => 'Kempinski Hotel',
				'nearest_airport_id' => NULL,
				'address_id' => 495,
				'updated_at' => '2014-11-19 16:25:02',
				'created_at' => '2014-11-19 16:25:02',
				'deleted_at' => NULL,
			),
			6 => 
			array (
				'id' => 8,
				'name' => 'Hotel Mulia',
				'nearest_airport_id' => NULL,
				'address_id' => 496,
				'updated_at' => '2014-11-19 16:27:06',
				'created_at' => '2014-11-19 16:27:06',
				'deleted_at' => NULL,
			),
			7 => 
			array (
				'id' => 9,
				'name' => 'Hotel Mulia',
				'nearest_airport_id' => NULL,
				'address_id' => 497,
				'updated_at' => '2014-11-19 16:27:49',
				'created_at' => '2014-11-19 16:27:49',
				'deleted_at' => NULL,
			),
			8 => 
			array (
				'id' => 10,
				'name' => 'Hotel Fort Canning',
				'nearest_airport_id' => NULL,
				'address_id' => 499,
				'updated_at' => '2014-11-19 16:35:24',
				'created_at' => '2014-11-19 16:35:24',
				'deleted_at' => NULL,
			),
			9 => 
			array (
				'id' => 11,
				'name' => 'St Regis',
				'nearest_airport_id' => NULL,
				'address_id' => 500,
				'updated_at' => '2014-11-19 16:36:23',
				'created_at' => '2014-11-19 16:36:23',
				'deleted_at' => NULL,
			),
			10 => 
			array (
				'id' => 12,
				'name' => 'test hotel',
				'nearest_airport_id' => NULL,
				'address_id' => 502,
				'updated_at' => '2014-11-20 09:52:14',
				'created_at' => '2014-11-20 09:52:14',
				'deleted_at' => NULL,
			),
			11 => 
			array (
				'id' => 13,
				'name' => 'testest',
				'nearest_airport_id' => NULL,
				'address_id' => 503,
				'updated_at' => '2014-11-20 09:57:20',
				'created_at' => '2014-11-20 09:57:20',
				'deleted_at' => NULL,
			),
			12 => 
			array (
				'id' => 14,
				'name' => 'The Taj West End',
				'nearest_airport_id' => NULL,
				'address_id' => 505,
				'updated_at' => '2014-11-24 17:17:25',
				'created_at' => '2014-11-24 17:17:25',
				'deleted_at' => NULL,
			),
			13 => 
			array (
				'id' => 15,
				'name' => 'Four Seasons',
				'nearest_airport_id' => NULL,
				'address_id' => 507,
				'updated_at' => '2014-11-24 17:33:53',
				'created_at' => '2014-11-24 17:33:53',
				'deleted_at' => NULL,
			),
			14 => 
			array (
				'id' => 16,
				'name' => 'Shangri-La',
				'nearest_airport_id' => NULL,
				'address_id' => 508,
				'updated_at' => '2014-11-24 17:35:53',
				'created_at' => '2014-11-24 17:35:53',
				'deleted_at' => NULL,
			),
			15 => 
			array (
				'id' => 17,
				'name' => 'The Metropolitan Hotel ',
				'nearest_airport_id' => NULL,
				'address_id' => 510,
				'updated_at' => '2014-11-24 17:58:01',
				'created_at' => '2014-11-24 17:58:01',
				'deleted_at' => NULL,
			),
			16 => 
			array (
				'id' => 18,
				'name' => 'Park Hyatt Istanbul',
				'nearest_airport_id' => NULL,
				'address_id' => 521,
				'updated_at' => '2014-12-01 17:20:13',
				'created_at' => '2014-12-01 17:20:13',
				'deleted_at' => NULL,
			),
			17 => 
			array (
				'id' => 19,
				'name' => 'Sheraton Istanbul Maslak Hotel',
				'nearest_airport_id' => NULL,
				'address_id' => 522,
				'updated_at' => '2014-12-01 17:23:46',
				'created_at' => '2014-12-01 17:23:46',
				'deleted_at' => NULL,
			),
			18 => 
			array (
				'id' => 20,
				'name' => 'Peermont D\'Oreale Grand Hotel',
				'nearest_airport_id' => NULL,
				'address_id' => 525,
				'updated_at' => '2014-12-10 16:38:20',
				'created_at' => '2014-12-10 16:38:20',
				'deleted_at' => NULL,
			),
			19 => 
			array (
				'id' => 21,
				'name' => 'D. Pedro Palace',
				'nearest_airport_id' => NULL,
				'address_id' => 530,
				'updated_at' => '2014-12-10 16:56:55',
				'created_at' => '2014-12-10 16:56:55',
				'deleted_at' => NULL,
			),
			20 => 
			array (
				'id' => 22,
				'name' => 'Sofitel Lisbon Liberdade',
				'nearest_airport_id' => NULL,
				'address_id' => 531,
				'updated_at' => '2014-12-10 16:58:36',
				'created_at' => '2014-12-10 16:58:36',
				'deleted_at' => NULL,
			),
			21 => 
			array (
				'id' => 23,
				'name' => 'Sheraton Tel Aviv',
				'nearest_airport_id' => NULL,
				'address_id' => 537,
				'updated_at' => '2014-12-16 17:36:50',
				'created_at' => '2014-12-16 17:36:50',
				'deleted_at' => NULL,
			),
			22 => 
			array (
				'id' => 24,
				'name' => 'Real Intercontinental Guatemala',
				'nearest_airport_id' => NULL,
				'address_id' => 546,
				'updated_at' => '2014-12-16 17:54:46',
				'created_at' => '2014-12-16 17:54:46',
				'deleted_at' => NULL,
			),
			23 => 
			array (
				'id' => 25,
				'name' => 'Westin Camino Real',
				'nearest_airport_id' => NULL,
				'address_id' => 547,
				'updated_at' => '2014-12-16 17:56:38',
				'created_at' => '2014-12-16 17:56:38',
				'deleted_at' => NULL,
			),
			24 => 
			array (
				'id' => 26,
				'name' => 'Radisson Blu Edwardian',
				'nearest_airport_id' => NULL,
				'address_id' => 578,
				'updated_at' => '2014-12-17 15:37:31',
				'created_at' => '2014-12-17 15:37:31',
				'deleted_at' => NULL,
			),
			25 => 
			array (
				'id' => 27,
				'name' => 'The Fitzwilliam Hotel Belfast',
				'nearest_airport_id' => NULL,
				'address_id' => 580,
				'updated_at' => '2014-12-17 15:43:51',
				'created_at' => '2014-12-17 15:43:51',
				'deleted_at' => NULL,
			),
			26 => 
			array (
				'id' => 28,
				'name' => 'The Gibson Hotel',
				'nearest_airport_id' => NULL,
				'address_id' => 583,
				'updated_at' => '2014-12-17 16:32:59',
				'created_at' => '2014-12-17 16:32:59',
				'deleted_at' => NULL,
			),
		));
	}

}
