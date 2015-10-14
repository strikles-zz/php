<?php

class AirportsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('airports')->delete();
        
		\DB::table('airports')->insert(array (
			0 => 
			array (
				'id' => 1,
				'address_id' => NULL,
				'name' => 'Aalborg, Denmark ',
				'code' => 'AAL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			1 => 
			array (
				'id' => 2,
				'address_id' => NULL,
				'name' => 'Aalesund, Norway ',
				'code' => 'AES',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			2 => 
			array (
				'id' => 3,
				'address_id' => NULL,
				'name' => 'Aarhus, Denmark - Bus service ',
				'code' => 'ZID',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			3 => 
			array (
				'id' => 4,
				'address_id' => NULL,
				'name' => 'Aarhus, Denmark - Tirstrup ',
				'code' => 'AAR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			4 => 
			array (
				'id' => 5,
				'address_id' => NULL,
				'name' => 'Aasiaat, Greenland ',
				'code' => 'JEG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			5 => 
			array (
				'id' => 6,
				'address_id' => NULL,
				'name' => 'Abadan, Iran ',
				'code' => 'ABD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			6 => 
			array (
				'id' => 7,
				'address_id' => NULL,
				'name' => 'Abakan, Russia ',
				'code' => 'ABA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			7 => 
			array (
				'id' => 8,
				'address_id' => NULL,
				'name' => 'Abbotsford, BC ',
				'code' => 'YXX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			8 => 
			array (
				'id' => 9,
				'address_id' => NULL,
				'name' => 'Aberdeen, SD ',
				'code' => 'ABR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			9 => 
			array (
				'id' => 10,
				'address_id' => NULL,
				'name' => 'Aberdeen, United Kingdom ',
				'code' => 'ABZ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			10 => 
			array (
				'id' => 11,
				'address_id' => NULL,
				'name' => 'Abha, Saudi Arabia ',
				'code' => 'AHB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			11 => 
			array (
				'id' => 12,
				'address_id' => NULL,
				'name' => 'Abidjan, Cote d\'Ivoire ',
				'code' => 'ABJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			12 => 
			array (
				'id' => 13,
				'address_id' => NULL,
				'name' => 'Abilene, TX ',
				'code' => 'ABI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			13 => 
			array (
				'id' => 14,
				'address_id' => NULL,
				'name' => 'Abu Dhabi, United Arab Emirates ',
				'code' => 'AUH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			14 => 
			array (
				'id' => 15,
				'address_id' => NULL,
				'name' => 'Abu Simbel, Egypt ',
				'code' => 'ABS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			15 => 
			array (
				'id' => 16,
				'address_id' => NULL,
				'name' => 'Abuja, Nigeria ',
				'code' => 'ABV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			16 => 
			array (
				'id' => 17,
				'address_id' => NULL,
				'name' => 'Acapulco, Mexico ',
				'code' => 'ACA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			17 => 
			array (
				'id' => 18,
				'address_id' => NULL,
				'name' => 'Acarigua, Venezuela ',
				'code' => 'AGV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			18 => 
			array (
				'id' => 19,
				'address_id' => NULL,
				'name' => 'Accra, Ghana ',
				'code' => 'ACC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			19 => 
			array (
				'id' => 20,
				'address_id' => NULL,
				'name' => 'Adak Island, AK ',
				'code' => 'ADK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			20 => 
			array (
				'id' => 21,
				'address_id' => NULL,
				'name' => 'Adana, Turkey ',
				'code' => 'ADA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			21 => 
			array (
				'id' => 22,
				'address_id' => NULL,
				'name' => 'Addis Ababa, Ethopia ',
				'code' => 'ADD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			22 => 
			array (
				'id' => 23,
				'address_id' => NULL,
				'name' => 'Adelaide, Australia ',
				'code' => 'ADL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			23 => 
			array (
				'id' => 24,
				'address_id' => NULL,
				'name' => 'Aden, Yemen ',
				'code' => 'ADE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			24 => 
			array (
				'id' => 25,
				'address_id' => NULL,
				'name' => 'Adler/Sochi, Russia ',
				'code' => 'AER',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			25 => 
			array (
				'id' => 26,
				'address_id' => NULL,
				'name' => 'Adrar, Algeria ',
				'code' => 'AZR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			26 => 
			array (
				'id' => 27,
				'address_id' => NULL,
				'name' => 'Afutara, Soloman Islands ',
				'code' => 'AFT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			27 => 
			array (
				'id' => 28,
				'address_id' => NULL,
				'name' => 'Agadir, Morocco ',
				'code' => 'AGA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			28 => 
			array (
				'id' => 29,
				'address_id' => NULL,
				'name' => 'Agartala, India ',
				'code' => 'IXA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			29 => 
			array (
				'id' => 30,
				'address_id' => NULL,
				'name' => 'Agaun, Papua New Guinea ',
				'code' => 'AUP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			30 => 
			array (
				'id' => 31,
				'address_id' => NULL,
				'name' => 'Agen, France ',
				'code' => 'AGF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			31 => 
			array (
				'id' => 32,
				'address_id' => NULL,
				'name' => 'Agra, India ',
				'code' => 'AGR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			32 => 
			array (
				'id' => 33,
				'address_id' => NULL,
				'name' => 'Agri, Turkey ',
				'code' => 'AJI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			33 => 
			array (
				'id' => 34,
				'address_id' => NULL,
				'name' => 'Aguadilla, Puerto Rico ',
				'code' => 'BQN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			34 => 
			array (
				'id' => 35,
				'address_id' => NULL,
				'name' => 'Aguascalientes, Mexico ',
				'code' => 'AGU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			35 => 
			array (
				'id' => 36,
				'address_id' => NULL,
				'name' => 'Aguni, Japan ',
				'code' => 'AGJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			36 => 
			array (
				'id' => 37,
				'address_id' => NULL,
				'name' => 'Ahmedabad, India ',
				'code' => 'AMD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			37 => 
			array (
				'id' => 38,
				'address_id' => NULL,
				'name' => 'Ahwaz, Iran ',
				'code' => 'AWZ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			38 => 
			array (
				'id' => 39,
				'address_id' => NULL,
				'name' => 'Ailuk Island, Marshall Islands ',
				'code' => 'AIM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			39 => 
			array (
				'id' => 40,
				'address_id' => NULL,
				'name' => 'Aioun El Atrouss, Mauritania ',
				'code' => 'AEO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			40 => 
			array (
				'id' => 41,
				'address_id' => NULL,
				'name' => 'Airok, Marshall Islands ',
				'code' => 'AIC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			41 => 
			array (
				'id' => 42,
				'address_id' => NULL,
				'name' => 'Aitutaki, Cook Islands ',
				'code' => 'AIT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			42 => 
			array (
				'id' => 43,
				'address_id' => NULL,
				'name' => 'Aizawl, India ',
				'code' => 'AJL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			43 => 
			array (
				'id' => 44,
				'address_id' => NULL,
				'name' => 'Ajaccio, France ',
				'code' => 'AJA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			44 => 
			array (
				'id' => 45,
				'address_id' => NULL,
				'name' => 'Akiachak, AK ',
				'code' => 'KKI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			45 => 
			array (
				'id' => 46,
				'address_id' => NULL,
				'name' => 'Akiak, AK ',
				'code' => 'AKI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			46 => 
			array (
				'id' => 47,
				'address_id' => NULL,
				'name' => 'Akita, Japan ',
				'code' => 'AXT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			47 => 
			array (
				'id' => 48,
				'address_id' => NULL,
				'name' => 'Akron/Canton, OH ',
				'code' => 'CAK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			48 => 
			array (
				'id' => 49,
				'address_id' => NULL,
				'name' => 'Aksu, China ',
				'code' => 'AKU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			49 => 
			array (
				'id' => 50,
				'address_id' => NULL,
				'name' => 'Aktyubinsk, Kazakhstan ',
				'code' => 'AKX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			50 => 
			array (
				'id' => 51,
				'address_id' => NULL,
				'name' => 'Akulivik, QC ',
				'code' => 'AKV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			51 => 
			array (
				'id' => 52,
				'address_id' => NULL,
				'name' => 'Akureyri, Iceland ',
				'code' => 'AEY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			52 => 
			array (
				'id' => 53,
				'address_id' => NULL,
				'name' => 'Akuton, AK ',
				'code' => 'KQA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			53 => 
			array (
				'id' => 54,
				'address_id' => NULL,
				'name' => 'Al Ain, United Arab Emirates ',
				'code' => 'AAN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			54 => 
			array (
				'id' => 55,
				'address_id' => NULL,
				'name' => 'Al Arish, Egypt ',
				'code' => 'AAC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			55 => 
			array (
				'id' => 56,
				'address_id' => NULL,
				'name' => 'Al Ghaydah, Yemen ',
				'code' => 'AAY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			56 => 
			array (
				'id' => 57,
				'address_id' => NULL,
				'name' => 'Al Hoceima, Morocco ',
				'code' => 'AHU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			57 => 
			array (
				'id' => 58,
				'address_id' => NULL,
				'name' => 'Alakanuk, AK ',
				'code' => 'AUK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			58 => 
			array (
				'id' => 59,
				'address_id' => NULL,
				'name' => 'Alamogordo, NM ',
				'code' => 'ALM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			59 => 
			array (
				'id' => 60,
				'address_id' => NULL,
				'name' => 'Alamosa, CO ',
				'code' => 'ALS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			60 => 
			array (
				'id' => 61,
				'address_id' => NULL,
				'name' => 'Al-Baha, Saudi Arabia ',
				'code' => 'ABT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			61 => 
			array (
				'id' => 62,
				'address_id' => NULL,
				'name' => 'Albany, NY ',
				'code' => 'ALB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			62 => 
			array (
				'id' => 63,
				'address_id' => NULL,
				'name' => 'Albany, OR - Bus service ',
				'code' => 'CVO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			63 => 
			array (
				'id' => 64,
				'address_id' => NULL,
				'name' => 'Albany, OR - Bus service ',
				'code' => 'QWY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			64 => 
			array (
				'id' => 65,
				'address_id' => NULL,
				'name' => 'Albuquerque, NM ',
				'code' => 'ABQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			65 => 
			array (
				'id' => 66,
				'address_id' => NULL,
				'name' => 'Albury, Australia ',
				'code' => 'ABX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			66 => 
			array (
				'id' => 67,
				'address_id' => NULL,
				'name' => 'Alderney, United Kingdom ',
				'code' => 'ACI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			67 => 
			array (
				'id' => 68,
				'address_id' => NULL,
				'name' => 'Aldershot, ON - Rail service ',
				'code' => 'XLY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			68 => 
			array (
				'id' => 69,
				'address_id' => NULL,
				'name' => 'Aleknagik, AK ',
				'code' => 'WKK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			69 => 
			array (
				'id' => 70,
				'address_id' => NULL,
				'name' => 'Aleppo, Syrian Arab Republic ',
				'code' => 'ALP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			70 => 
			array (
				'id' => 71,
				'address_id' => NULL,
				'name' => 'Alexander Bay, South Africa ',
				'code' => 'ALJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			71 => 
			array (
				'id' => 72,
				'address_id' => NULL,
				'name' => 'Alexandria, Egypt ',
				'code' => 'ALY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			72 => 
			array (
				'id' => 73,
				'address_id' => NULL,
				'name' => 'Alexandria, LA ',
				'code' => 'AEX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			73 => 
			array (
				'id' => 74,
				'address_id' => NULL,
				'name' => 'Alexandria,ON - Rail service ',
				'code' => 'XFS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			74 => 
			array (
				'id' => 75,
				'address_id' => NULL,
				'name' => 'Alexandroupolis, Greece ',
				'code' => 'AXD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			75 => 
			array (
				'id' => 76,
				'address_id' => NULL,
				'name' => 'Al-Fujairah, United Arab Emirates ',
				'code' => 'FJR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			76 => 
			array (
				'id' => 77,
				'address_id' => NULL,
				'name' => 'Alghero, Italy ',
				'code' => 'AHO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			77 => 
			array (
				'id' => 78,
				'address_id' => NULL,
				'name' => 'Algiers, Algeria ',
				'code' => 'ALG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			78 => 
			array (
				'id' => 79,
				'address_id' => NULL,
				'name' => 'Alicante, Spain ',
				'code' => 'ALC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			79 => 
			array (
				'id' => 80,
				'address_id' => NULL,
				'name' => 'Alice Springs, Australia ',
				'code' => 'ASP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			80 => 
			array (
				'id' => 81,
				'address_id' => NULL,
				'name' => 'Allakaket, AK ',
				'code' => 'AET',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			81 => 
			array (
				'id' => 82,
				'address_id' => NULL,
				'name' => 'Allentown, PA ',
				'code' => 'ABE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			82 => 
			array (
				'id' => 83,
				'address_id' => NULL,
				'name' => 'Alliance, NE ',
				'code' => 'AIA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			83 => 
			array (
				'id' => 84,
				'address_id' => NULL,
				'name' => 'Alma, QC ',
				'code' => 'YTF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			84 => 
			array (
				'id' => 85,
				'address_id' => NULL,
				'name' => 'Almaty, Kazakhstan ',
				'code' => 'AKX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			85 => 
			array (
				'id' => 86,
				'address_id' => NULL,
				'name' => 'Almeria, Spain ',
				'code' => 'LEI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			86 => 
			array (
				'id' => 87,
				'address_id' => NULL,
				'name' => 'Alor Island, Indonesia ',
				'code' => 'ARD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			87 => 
			array (
				'id' => 88,
				'address_id' => NULL,
				'name' => 'Alorsetar, Malaysia ',
				'code' => 'AOR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			88 => 
			array (
				'id' => 89,
				'address_id' => NULL,
				'name' => 'Alotau, Papua New Guinea ',
				'code' => 'GUR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			89 => 
			array (
				'id' => 90,
				'address_id' => NULL,
				'name' => 'Alpena, MI ',
				'code' => 'APN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			90 => 
			array (
				'id' => 91,
				'address_id' => NULL,
				'name' => 'Alta, Norway ',
				'code' => 'ALF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			91 => 
			array (
				'id' => 92,
				'address_id' => NULL,
				'name' => 'Altamira, Brazil ',
				'code' => 'ATM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			92 => 
			array (
				'id' => 93,
				'address_id' => NULL,
				'name' => 'Altay, China ',
				'code' => 'AAT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			93 => 
			array (
				'id' => 94,
				'address_id' => NULL,
				'name' => 'Altenrhein, Switzerland ',
				'code' => 'ACH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			94 => 
			array (
				'id' => 95,
				'address_id' => NULL,
				'name' => 'Alto Rio Senguerr, Argentina ',
				'code' => 'ARR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			95 => 
			array (
				'id' => 96,
				'address_id' => NULL,
				'name' => 'Altoona, PA ',
				'code' => 'AOO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			96 => 
			array (
				'id' => 97,
				'address_id' => NULL,
				'name' => 'Amami O Shima, Japan ',
				'code' => 'ASJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			97 => 
			array (
				'id' => 98,
				'address_id' => NULL,
				'name' => 'Amarillo, TX ',
				'code' => 'AMA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			98 => 
			array (
				'id' => 99,
				'address_id' => NULL,
				'name' => 'Amazon Bay, Papua New Guinea ',
				'code' => 'AZB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			99 => 
			array (
				'id' => 100,
				'address_id' => NULL,
				'name' => 'Ambanja, Madagascar ',
				'code' => 'IVA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			100 => 
			array (
				'id' => 101,
				'address_id' => NULL,
				'name' => 'Ambatomainty, Madagascar ',
				'code' => 'AMY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			101 => 
			array (
				'id' => 102,
				'address_id' => NULL,
				'name' => 'Ambatondrazaka, Madagascar ',
				'code' => 'WAM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			102 => 
			array (
				'id' => 103,
				'address_id' => NULL,
				'name' => 'Ambler, AK ',
				'code' => 'ABL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			103 => 
			array (
				'id' => 104,
				'address_id' => NULL,
				'name' => 'Ambon, Indonesia ',
				'code' => 'AMQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			104 => 
			array (
				'id' => 105,
				'address_id' => NULL,
				'name' => 'Amboseli, Kenya ',
				'code' => 'ASV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			105 => 
			array (
				'id' => 106,
				'address_id' => NULL,
				'name' => 'Amderma, Russia ',
				'code' => 'AMV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			106 => 
			array (
				'id' => 107,
				'address_id' => NULL,
				'name' => 'Amman, Jordan - Civil/Marka Airport ',
				'code' => 'ADJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			107 => 
			array (
				'id' => 108,
				'address_id' => NULL,
				'name' => 'Amman, Jordan - Queen Alia International ',
				'code' => 'AMM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			108 => 
			array (
				'id' => 109,
				'address_id' => NULL,
				'name' => 'Amritsar, India ',
				'code' => 'ATQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			109 => 
			array (
				'id' => 110,
				'address_id' => NULL,
				'name' => 'Amsterdam, Netherlands ',
				'code' => 'AMS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			110 => 
			array (
				'id' => 111,
				'address_id' => NULL,
				'name' => 'Anadyr, Russia ',
				'code' => 'DYR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			111 => 
			array (
				'id' => 112,
				'address_id' => NULL,
				'name' => 'Anahim Lake, BC ',
				'code' => 'YAA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			112 => 
			array (
				'id' => 113,
				'address_id' => NULL,
				'name' => 'Anaktueuk, AK ',
				'code' => 'AKP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			113 => 
			array (
				'id' => 114,
				'address_id' => NULL,
				'name' => 'Analalava, Madagascar ',
				'code' => 'HVA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			114 => 
			array (
				'id' => 115,
				'address_id' => NULL,
				'name' => 'Anapa, Russia ',
				'code' => 'AAQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			115 => 
			array (
				'id' => 116,
				'address_id' => NULL,
				'name' => 'Anchorage, AK ',
				'code' => 'ANC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			116 => 
			array (
				'id' => 117,
				'address_id' => NULL,
				'name' => 'Ancona, Italy ',
				'code' => 'AOI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			117 => 
			array (
				'id' => 118,
				'address_id' => NULL,
				'name' => 'Andenes, Norway ',
				'code' => 'ANX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			118 => 
			array (
				'id' => 119,
				'address_id' => NULL,
				'name' => 'Andizhan, Uzbekistan ',
				'code' => 'AZN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			119 => 
			array (
				'id' => 120,
				'address_id' => NULL,
				'name' => 'Aneityum, Vanuatu ',
				'code' => 'AUY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			120 => 
			array (
				'id' => 121,
				'address_id' => NULL,
				'name' => 'Angelholm/Helsingborg, Sweden ',
				'code' => 'JHE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			121 => 
			array (
				'id' => 122,
				'address_id' => NULL,
				'name' => 'Angers, France - Marce ',
				'code' => 'ANE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			122 => 
			array (
				'id' => 123,
				'address_id' => NULL,
				'name' => 'Angers, France - Rail service ',
				'code' => 'QXG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			123 => 
			array (
				'id' => 124,
				'address_id' => NULL,
				'name' => 'Anggi, Indonesia ',
				'code' => 'AGD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			124 => 
			array (
				'id' => 125,
				'address_id' => NULL,
				'name' => 'Anging, China ',
				'code' => 'AQG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			125 => 
			array (
				'id' => 126,
				'address_id' => NULL,
				'name' => 'Angling Lake, ON ',
				'code' => 'YAX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			126 => 
			array (
				'id' => 127,
				'address_id' => NULL,
				'name' => 'Angoon, AK ',
				'code' => 'AGN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			127 => 
			array (
				'id' => 128,
				'address_id' => NULL,
				'name' => 'Angouleme, France ',
				'code' => 'ANG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			128 => 
			array (
				'id' => 129,
				'address_id' => NULL,
				'name' => 'Anguilla, Anguilla ',
				'code' => 'AXA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			129 => 
			array (
				'id' => 130,
				'address_id' => NULL,
				'name' => 'Aniak, AK ',
				'code' => 'ANI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			130 => 
			array (
				'id' => 131,
				'address_id' => NULL,
				'name' => 'Aniwa, Vanuatu ',
				'code' => 'AWD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			131 => 
			array (
				'id' => 132,
				'address_id' => NULL,
				'name' => 'Ankang, China ',
				'code' => 'AKA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			132 => 
			array (
				'id' => 133,
				'address_id' => NULL,
				'name' => 'Ankara, Turkey - Esenboga ',
				'code' => 'ESB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			133 => 
			array (
				'id' => 134,
				'address_id' => NULL,
				'name' => 'Ankara, Turkey - Etimesqut ',
				'code' => 'ANK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			134 => 
			array (
				'id' => 135,
				'address_id' => NULL,
				'name' => 'Ankavandra, Madagascar ',
				'code' => 'JVA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			135 => 
			array (
				'id' => 136,
				'address_id' => NULL,
				'name' => 'Annaba, Algeria ',
				'code' => 'AAE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			136 => 
			array (
				'id' => 137,
				'address_id' => NULL,
				'name' => 'Annecy, France ',
				'code' => 'NCY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			137 => 
			array (
				'id' => 138,
				'address_id' => NULL,
				'name' => 'Antalaha, Madagascar ',
				'code' => 'ANM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			138 => 
			array (
				'id' => 139,
				'address_id' => NULL,
				'name' => 'Antalya, Turkey ',
				'code' => 'AYT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			139 => 
			array (
				'id' => 140,
				'address_id' => NULL,
				'name' => 'Antaninvarivo, Madgascar ',
				'code' => 'TNR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			140 => 
			array (
				'id' => 141,
				'address_id' => NULL,
				'name' => 'Antigua, Antigua and Barbuda ',
				'code' => 'ANU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			141 => 
			array (
				'id' => 142,
				'address_id' => NULL,
				'name' => 'Antofagasta, Chile ',
				'code' => 'ANF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			142 => 
			array (
				'id' => 143,
				'address_id' => NULL,
				'name' => 'Antsalova, Madagascar ',
				'code' => 'WAQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			143 => 
			array (
				'id' => 144,
				'address_id' => NULL,
				'name' => 'Antsiranana, Madagascar ',
				'code' => 'DIE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			144 => 
			array (
				'id' => 145,
				'address_id' => NULL,
				'name' => 'Antsohihy, Madagascar ',
				'code' => 'WAI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			145 => 
			array (
				'id' => 146,
				'address_id' => NULL,
				'name' => 'Antwerp, Belgium - Bus service ',
				'code' => 'ZAY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			146 => 
			array (
				'id' => 147,
				'address_id' => NULL,
				'name' => 'Antwerp, Belgium - Deurne Airport ',
				'code' => 'ANR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			147 => 
			array (
				'id' => 148,
				'address_id' => NULL,
				'name' => 'Anvik, AK ',
				'code' => 'ANV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			148 => 
			array (
				'id' => 149,
				'address_id' => NULL,
				'name' => 'Aomori, Japan ',
				'code' => 'AOJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			149 => 
			array (
				'id' => 150,
				'address_id' => NULL,
				'name' => 'Aosta, Italy ',
				'code' => 'AOT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			150 => 
			array (
				'id' => 151,
				'address_id' => NULL,
				'name' => 'Apartado, Colombia ',
				'code' => 'APO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			151 => 
			array (
				'id' => 152,
				'address_id' => NULL,
				'name' => 'Apia, Western Samoa ',
				'code' => 'APW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			152 => 
			array (
				'id' => 153,
				'address_id' => NULL,
				'name' => 'Apia, Western Samoa ',
				'code' => 'FGI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			153 => 
			array (
				'id' => 154,
				'address_id' => NULL,
				'name' => 'Appleton, WI ',
				'code' => 'ATW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			154 => 
			array (
				'id' => 155,
				'address_id' => NULL,
				'name' => 'Aqaba, Jordan ',
				'code' => 'AQJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			155 => 
			array (
				'id' => 156,
				'address_id' => NULL,
				'name' => 'Araca, Brazil ',
				'code' => 'AJU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			156 => 
			array (
				'id' => 157,
				'address_id' => NULL,
				'name' => 'Aracatuba, Brazil ',
				'code' => 'ARU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			157 => 
			array (
				'id' => 158,
				'address_id' => NULL,
				'name' => 'Arad, Romania ',
				'code' => 'ARW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			158 => 
			array (
				'id' => 159,
				'address_id' => NULL,
				'name' => 'Aragip, Papua New Guinea ',
				'code' => 'ARP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			159 => 
			array (
				'id' => 160,
				'address_id' => NULL,
				'name' => 'Araguaina, Brazil ',
				'code' => 'AUX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			160 => 
			array (
				'id' => 161,
				'address_id' => NULL,
				'name' => 'Arapoti, Brazil ',
				'code' => 'AAG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			161 => 
			array (
				'id' => 162,
				'address_id' => NULL,
				'name' => 'Arar, Saudi Arabia ',
				'code' => 'RAE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			162 => 
			array (
				'id' => 163,
				'address_id' => NULL,
				'name' => 'Arauca, Colombia ',
				'code' => 'AUC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			163 => 
			array (
				'id' => 164,
				'address_id' => NULL,
				'name' => 'Arba Mintch, Ethiopia ',
				'code' => 'AMH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			164 => 
			array (
				'id' => 165,
				'address_id' => NULL,
				'name' => 'Arcata, CA ',
				'code' => 'ACV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			165 => 
			array (
				'id' => 166,
				'address_id' => NULL,
				'name' => 'Arctic Bay, NU ',
				'code' => 'YAB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			166 => 
			array (
				'id' => 167,
				'address_id' => NULL,
				'name' => 'Arctic Village, AK ',
				'code' => 'ARC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			167 => 
			array (
				'id' => 168,
				'address_id' => NULL,
				'name' => 'Ardabil, Iran ',
				'code' => 'ADU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			168 => 
			array (
				'id' => 169,
				'address_id' => NULL,
				'name' => 'Arequipa, Peru ',
				'code' => 'AQP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			169 => 
			array (
				'id' => 170,
				'address_id' => NULL,
				'name' => 'Argelholm/Helsingborg, Sweden ',
				'code' => 'AGH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			170 => 
			array (
				'id' => 171,
				'address_id' => NULL,
				'name' => 'Argyle, Australia ',
				'code' => 'GYL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			171 => 
			array (
				'id' => 172,
				'address_id' => NULL,
				'name' => 'Arica, Chile ',
				'code' => 'ARI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			172 => 
			array (
				'id' => 173,
				'address_id' => NULL,
				'name' => 'Arkangelsk, Russia ',
				'code' => 'ARH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			173 => 
			array (
				'id' => 174,
				'address_id' => NULL,
				'name' => 'Armenia, Colombia ',
				'code' => 'AXM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			174 => 
			array (
				'id' => 175,
				'address_id' => NULL,
				'name' => 'Armidale, Australia ',
				'code' => 'ARM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			175 => 
			array (
				'id' => 176,
				'address_id' => NULL,
				'name' => 'Arthur\'s Town, Bahamas ',
				'code' => 'ATC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			176 => 
			array (
				'id' => 177,
				'address_id' => NULL,
				'name' => 'Arua, Uganda ',
				'code' => 'RUA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			177 => 
			array (
				'id' => 178,
				'address_id' => NULL,
				'name' => 'Aruba, Aruba ',
				'code' => 'AUA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			178 => 
			array (
				'id' => 179,
				'address_id' => NULL,
				'name' => 'Arusha, Tanzania ',
				'code' => 'ARK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			179 => 
			array (
				'id' => 180,
				'address_id' => NULL,
				'name' => 'Arviat, NU ',
				'code' => 'YEK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			180 => 
			array (
				'id' => 181,
				'address_id' => NULL,
				'name' => 'Arvidsjaur, Sweden ',
				'code' => 'AJR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			181 => 
			array (
				'id' => 182,
				'address_id' => NULL,
				'name' => 'Asahikawa, Japan ',
				'code' => 'AKJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			182 => 
			array (
				'id' => 183,
				'address_id' => NULL,
				'name' => 'Asheville, NC ',
				'code' => 'AVL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			183 => 
			array (
				'id' => 184,
				'address_id' => NULL,
				'name' => 'Ashgabat, Turkmenistan ',
				'code' => 'ASB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			184 => 
			array (
				'id' => 185,
				'address_id' => NULL,
				'name' => 'Ashland, KY/Huntington, WV ',
				'code' => 'HTS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			185 => 
			array (
				'id' => 186,
				'address_id' => NULL,
				'name' => 'Asmara, Eritrea ',
				'code' => 'ASM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			186 => 
			array (
				'id' => 187,
				'address_id' => NULL,
				'name' => 'Asosa, Ethopia ',
				'code' => 'ASO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			187 => 
			array (
				'id' => 188,
				'address_id' => NULL,
				'name' => 'Aspen, CO ',
				'code' => 'ASE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			188 => 
			array (
				'id' => 189,
				'address_id' => NULL,
				'name' => 'Assiut, Egypt ',
				'code' => 'ATZ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			189 => 
			array (
				'id' => 190,
				'address_id' => NULL,
				'name' => 'Astana, Kazakhstan ',
				'code' => 'TSE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			190 => 
			array (
				'id' => 191,
				'address_id' => NULL,
				'name' => 'Astrakhan, Russia ',
				'code' => 'ASF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			191 => 
			array (
				'id' => 192,
				'address_id' => NULL,
				'name' => 'Asturias, Spain and Canary Islands ',
				'code' => 'OVD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			192 => 
			array (
				'id' => 193,
				'address_id' => NULL,
				'name' => 'Asuncion, Paraguay ',
				'code' => 'ASU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			193 => 
			array (
				'id' => 194,
				'address_id' => NULL,
				'name' => 'Aswan, Egypt ',
				'code' => 'ASW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			194 => 
			array (
				'id' => 195,
				'address_id' => NULL,
				'name' => 'Ataq, Yemen ',
				'code' => 'AXK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			195 => 
			array (
				'id' => 196,
				'address_id' => NULL,
				'name' => 'Athens, GA ',
				'code' => 'AHN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			196 => 
			array (
				'id' => 197,
				'address_id' => NULL,
				'name' => 'Athens, Greece ',
				'code' => 'ATH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			197 => 
			array (
				'id' => 198,
				'address_id' => NULL,
				'name' => 'Atiu Island, Cook Islands ',
				'code' => 'AIU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			198 => 
			array (
				'id' => 199,
				'address_id' => NULL,
				'name' => 'Atka, AK ',
				'code' => 'AKB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			199 => 
			array (
				'id' => 200,
				'address_id' => NULL,
				'name' => 'Atlanta, GA ',
				'code' => 'ATL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			200 => 
			array (
				'id' => 201,
				'address_id' => NULL,
				'name' => 'Atlantic City, NJ ',
				'code' => 'AIY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			201 => 
			array (
				'id' => 202,
				'address_id' => NULL,
				'name' => 'Atoifi, Solomon Islands ',
				'code' => 'ATD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			202 => 
			array (
				'id' => 203,
				'address_id' => NULL,
				'name' => 'Atqasuk, AK ',
				'code' => 'ATK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			203 => 
			array (
				'id' => 204,
				'address_id' => NULL,
				'name' => 'Attawapiskat, ON ',
				'code' => 'YAT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			204 => 
			array (
				'id' => 205,
				'address_id' => NULL,
				'name' => 'Atuona, French Polynesia ',
				'code' => 'AUQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			205 => 
			array (
				'id' => 206,
				'address_id' => NULL,
				'name' => 'Atyrau, Kazakhstan ',
				'code' => 'GUW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			206 => 
			array (
				'id' => 207,
				'address_id' => NULL,
				'name' => 'Auckland, New Zealand ',
				'code' => 'AKL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			207 => 
			array (
				'id' => 208,
				'address_id' => NULL,
				'name' => 'Augsburg/Munich, Germany ',
				'code' => 'AGB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			208 => 
			array (
				'id' => 209,
				'address_id' => NULL,
				'name' => 'Augusta, GA ',
				'code' => 'AGS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			209 => 
			array (
				'id' => 210,
				'address_id' => NULL,
				'name' => 'Augusta, ME ',
				'code' => 'AUG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			210 => 
			array (
				'id' => 211,
				'address_id' => NULL,
				'name' => 'Auki, Solomon Islands ',
				'code' => 'AKS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			211 => 
			array (
				'id' => 212,
				'address_id' => NULL,
				'name' => 'Aupaluk, QC ',
				'code' => 'YPJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			212 => 
			array (
				'id' => 213,
				'address_id' => NULL,
				'name' => 'Aur Island, Marshall Islands ',
				'code' => 'AUL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			213 => 
			array (
				'id' => 214,
				'address_id' => NULL,
				'name' => 'Aurangabad, India ',
				'code' => 'IXU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			214 => 
			array (
				'id' => 215,
				'address_id' => NULL,
				'name' => 'Aurillac, France ',
				'code' => 'AUR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			215 => 
			array (
				'id' => 216,
				'address_id' => NULL,
				'name' => 'Aurukun, Australia ',
				'code' => 'AUU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			216 => 
			array (
				'id' => 217,
				'address_id' => NULL,
				'name' => 'Austin, TX ',
				'code' => 'AUS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			217 => 
			array (
				'id' => 218,
				'address_id' => NULL,
				'name' => 'Avignon, France ',
				'code' => 'AVN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			218 => 
			array (
				'id' => 219,
				'address_id' => NULL,
				'name' => 'Ayawaki, Indonesia ',
				'code' => 'AYW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			219 => 
			array (
				'id' => 220,
				'address_id' => NULL,
				'name' => 'Ayers Rock, Australia ',
				'code' => 'AYQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			220 => 
			array (
				'id' => 221,
				'address_id' => NULL,
				'name' => 'Babo, Indonesia ',
				'code' => 'BXB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			221 => 
			array (
				'id' => 222,
				'address_id' => NULL,
				'name' => 'Bacolod, Philippines ',
				'code' => 'BCD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			222 => 
			array (
				'id' => 223,
				'address_id' => NULL,
				'name' => 'Badajcz, Spain ',
				'code' => 'BJZ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			223 => 
			array (
				'id' => 224,
				'address_id' => NULL,
				'name' => 'Bade, Indonesia ',
				'code' => 'BXD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			224 => 
			array (
				'id' => 225,
				'address_id' => NULL,
				'name' => 'Badu Island, Australia ',
				'code' => 'BDD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			225 => 
			array (
				'id' => 226,
				'address_id' => NULL,
				'name' => 'Bagdogra, India ',
				'code' => 'IXB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			226 => 
			array (
				'id' => 227,
				'address_id' => NULL,
				'name' => 'Bagotville, QC ',
				'code' => 'YBG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			227 => 
			array (
				'id' => 228,
				'address_id' => NULL,
				'name' => 'Baharpar, Ethiopia ',
				'code' => 'BJR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			228 => 
			array (
				'id' => 229,
				'address_id' => NULL,
				'name' => 'Bahawalpur, Pakistan ',
				'code' => 'BHV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			229 => 
			array (
				'id' => 230,
				'address_id' => NULL,
				'name' => 'Bahia Blanca, Argentina ',
				'code' => 'BHI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			230 => 
			array (
				'id' => 231,
				'address_id' => NULL,
				'name' => 'Bahia Pinas, Panama ',
				'code' => 'BFQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			231 => 
			array (
				'id' => 232,
				'address_id' => NULL,
				'name' => 'Bahia Solano, Colombia ',
				'code' => 'BSC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			232 => 
			array (
				'id' => 233,
				'address_id' => NULL,
				'name' => 'Bahrain, Bahrain ',
				'code' => 'BAH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			233 => 
			array (
				'id' => 234,
				'address_id' => NULL,
				'name' => 'Baia Mare, Romania ',
				'code' => 'BAY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			234 => 
			array (
				'id' => 235,
				'address_id' => NULL,
				'name' => 'Baie Comeau, QC ',
				'code' => 'YBC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			235 => 
			array (
				'id' => 236,
				'address_id' => NULL,
				'name' => 'Baimuru, Papua New Guinea ',
				'code' => 'VMU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			236 => 
			array (
				'id' => 237,
				'address_id' => NULL,
				'name' => 'Baker Lake, NU ',
				'code' => 'YBK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			237 => 
			array (
				'id' => 238,
				'address_id' => NULL,
				'name' => 'Bakersfield, CA ',
				'code' => 'BFL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			238 => 
			array (
				'id' => 239,
				'address_id' => NULL,
				'name' => 'Baku, Azerbaijan ',
				'code' => 'GYD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			239 => 
			array (
				'id' => 240,
				'address_id' => NULL,
				'name' => 'Balalae, Solomon Islands ',
				'code' => 'BAS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			240 => 
			array (
				'id' => 241,
				'address_id' => NULL,
				'name' => 'Balikesir, Turkey ',
				'code' => 'BZI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			241 => 
			array (
				'id' => 242,
				'address_id' => NULL,
				'name' => 'Balikpapan, Indonesia ',
				'code' => 'BPN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			242 => 
			array (
				'id' => 243,
				'address_id' => NULL,
				'name' => 'Balimo, Papua New Guinea ',
				'code' => 'OPU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			243 => 
			array (
				'id' => 244,
				'address_id' => NULL,
				'name' => 'Ballina, Australia ',
				'code' => 'BNK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			244 => 
			array (
				'id' => 245,
				'address_id' => NULL,
				'name' => 'Balmaceda, Chile ',
				'code' => 'BBA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			245 => 
			array (
				'id' => 246,
				'address_id' => NULL,
				'name' => 'Baltimore, MD ',
				'code' => 'BWI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			246 => 
			array (
				'id' => 247,
				'address_id' => NULL,
				'name' => 'Bam, Iran ',
				'code' => 'BXR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			247 => 
			array (
				'id' => 248,
				'address_id' => NULL,
				'name' => 'Bamaga, Australia ',
				'code' => 'ABM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			248 => 
			array (
				'id' => 249,
				'address_id' => NULL,
				'name' => 'Bamako, Mali ',
				'code' => 'BKO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			249 => 
			array (
				'id' => 250,
				'address_id' => NULL,
				'name' => 'Banda Aceh, Indonesia ',
				'code' => 'BTJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			250 => 
			array (
				'id' => 251,
				'address_id' => NULL,
				'name' => 'Bandar Abbas, Iran ',
				'code' => 'BND',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			251 => 
			array (
				'id' => 252,
				'address_id' => NULL,
				'name' => 'Bandar Lampung, Indonesia - Branti ',
				'code' => 'TKG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			252 => 
			array (
				'id' => 253,
				'address_id' => NULL,
				'name' => 'Bandar Lengeh, Iran ',
				'code' => 'BDH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			253 => 
			array (
				'id' => 254,
				'address_id' => NULL,
				'name' => 'Bandar Seri Begawan, Brunei ',
				'code' => 'BWN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			254 => 
			array (
				'id' => 255,
				'address_id' => NULL,
				'name' => 'Bandung, Indonesia ',
				'code' => 'BDO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			255 => 
			array (
				'id' => 256,
				'address_id' => NULL,
				'name' => 'Bangalore, India ',
				'code' => 'BLR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			256 => 
			array (
				'id' => 257,
				'address_id' => NULL,
				'name' => 'Bangda, China ',
				'code' => 'BPX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			257 => 
			array (
				'id' => 258,
				'address_id' => NULL,
				'name' => 'Bangkok, Thailand ',
				'code' => 'BKK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			258 => 
			array (
				'id' => 259,
				'address_id' => NULL,
				'name' => 'Bangor, ME ',
				'code' => 'BGR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			259 => 
			array (
				'id' => 260,
				'address_id' => NULL,
				'name' => 'Banja Luka, Bosnia Herzegovina ',
				'code' => 'BNX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			260 => 
			array (
				'id' => 261,
				'address_id' => NULL,
				'name' => 'Banjarmasin, Indonesia ',
				'code' => 'BDJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			261 => 
			array (
				'id' => 262,
				'address_id' => NULL,
				'name' => 'Banjul, Gambia ',
				'code' => 'BJL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			262 => 
			array (
				'id' => 263,
				'address_id' => NULL,
				'name' => 'Banmethuot, Viet Nam - Phung-Doc ',
				'code' => 'BMV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			263 => 
			array (
				'id' => 264,
				'address_id' => NULL,
				'name' => 'Bannu, Pakistan ',
				'code' => 'BNP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			264 => 
			array (
				'id' => 265,
				'address_id' => NULL,
				'name' => 'Banqui, Central African Republic ',
				'code' => 'BGF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			265 => 
			array (
				'id' => 266,
				'address_id' => NULL,
				'name' => 'Baoshan, China ',
				'code' => 'BSD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			266 => 
			array (
				'id' => 267,
				'address_id' => NULL,
				'name' => 'Baotou, China ',
				'code' => 'BAV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			267 => 
			array (
				'id' => 268,
				'address_id' => NULL,
				'name' => 'Bar Harbour, ME ',
				'code' => 'BHB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			268 => 
			array (
				'id' => 269,
				'address_id' => NULL,
				'name' => 'Baracoa, Cuba ',
				'code' => 'BCA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			269 => 
			array (
				'id' => 270,
				'address_id' => NULL,
				'name' => 'Barcaldine, Australia ',
				'code' => 'BCI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			270 => 
			array (
				'id' => 271,
				'address_id' => NULL,
				'name' => 'Barcelona, Spain ',
				'code' => 'BCN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			271 => 
			array (
				'id' => 272,
				'address_id' => NULL,
				'name' => 'Barcelona, Venezuela ',
				'code' => 'BLA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			272 => 
			array (
				'id' => 273,
				'address_id' => NULL,
				'name' => 'Bardufoss, Norway ',
				'code' => 'BDU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			273 => 
			array (
				'id' => 274,
				'address_id' => NULL,
				'name' => 'Bari, Italy ',
				'code' => 'BRI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			274 => 
			array (
				'id' => 275,
				'address_id' => NULL,
				'name' => 'Barinas, Venezuela ',
				'code' => 'BNS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			275 => 
			array (
				'id' => 276,
				'address_id' => NULL,
				'name' => 'Bario, Malaysia ',
				'code' => 'BBN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			276 => 
			array (
				'id' => 277,
				'address_id' => NULL,
				'name' => 'Barisal, Bangladesh ',
				'code' => 'BZL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			277 => 
			array (
				'id' => 278,
				'address_id' => NULL,
				'name' => 'Barnaul, Russia ',
				'code' => 'BAX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			278 => 
			array (
				'id' => 279,
				'address_id' => NULL,
				'name' => 'Barquisimeto, Venezuela ',
				'code' => 'BRM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			279 => 
			array (
				'id' => 280,
				'address_id' => NULL,
				'name' => 'Barra Colorado, Costa Rica ',
				'code' => 'BCL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			280 => 
			array (
				'id' => 281,
				'address_id' => NULL,
				'name' => 'Barra, United Kingdom ',
				'code' => 'BRR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			281 => 
			array (
				'id' => 282,
				'address_id' => NULL,
				'name' => 'Barran Cabermeja, Colombia ',
				'code' => 'EJA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			282 => 
			array (
				'id' => 283,
				'address_id' => NULL,
				'name' => 'Barranquilla, Colombia ',
				'code' => 'BAQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			283 => 
			array (
				'id' => 284,
				'address_id' => NULL,
				'name' => 'Barreiras, Brazil ',
				'code' => 'BRA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			284 => 
			array (
				'id' => 285,
				'address_id' => NULL,
				'name' => 'Barrow, AK ',
				'code' => 'BRW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			285 => 
			array (
				'id' => 286,
				'address_id' => NULL,
				'name' => 'Barter Island, AK ',
				'code' => 'BTI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			286 => 
			array (
				'id' => 287,
				'address_id' => NULL,
				'name' => 'Basco, Philippines ',
				'code' => 'BSO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			287 => 
			array (
				'id' => 288,
				'address_id' => NULL,
				'name' => 'Basel, Switzerland ',
				'code' => 'BSL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			288 => 
			array (
				'id' => 289,
				'address_id' => NULL,
				'name' => 'Basel/Mulhouse Railway Station, Switzerland ',
				'code' => 'ZDH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			289 => 
			array (
				'id' => 290,
				'address_id' => NULL,
				'name' => 'Bashehr, Iran ',
				'code' => 'BUZ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			290 => 
			array (
				'id' => 291,
				'address_id' => NULL,
				'name' => 'Bastia, France ',
				'code' => 'BIA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			291 => 
			array (
				'id' => 292,
				'address_id' => NULL,
				'name' => 'Batam, Indonesia ',
				'code' => 'BTH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			292 => 
			array (
				'id' => 293,
				'address_id' => NULL,
				'name' => 'Bathhurst, NB ',
				'code' => 'ZBF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			293 => 
			array (
				'id' => 294,
				'address_id' => NULL,
				'name' => 'Bathurst Island, Australia ',
				'code' => 'BRT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			294 => 
			array (
				'id' => 295,
				'address_id' => NULL,
				'name' => 'Bathurst, Australia ',
				'code' => 'BHS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			295 => 
			array (
				'id' => 296,
				'address_id' => NULL,
				'name' => 'Batman, Turkey ',
				'code' => 'BAL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			296 => 
			array (
				'id' => 297,
				'address_id' => NULL,
				'name' => 'Batna, Algeria ',
				'code' => 'BLJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			297 => 
			array (
				'id' => 298,
				'address_id' => NULL,
				'name' => 'Batom, Indonesia ',
				'code' => 'BXM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			298 => 
			array (
				'id' => 299,
				'address_id' => NULL,
				'name' => 'Baton Rouge, LA ',
				'code' => 'BTR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			299 => 
			array (
				'id' => 300,
				'address_id' => NULL,
				'name' => 'Batsfijord, Norway ',
				'code' => 'BJF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			300 => 
			array (
				'id' => 301,
				'address_id' => NULL,
				'name' => 'Battambang, Cambodia ',
				'code' => 'BBM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			301 => 
			array (
				'id' => 302,
				'address_id' => NULL,
				'name' => 'Batumi, Georgia ',
				'code' => 'BUS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			302 => 
			array (
				'id' => 303,
				'address_id' => NULL,
				'name' => 'Batuna, Solomon Islands ',
				'code' => 'BPF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			303 => 
			array (
				'id' => 304,
				'address_id' => NULL,
				'name' => 'Bauru, Brazil ',
				'code' => 'BAU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			304 => 
			array (
				'id' => 305,
				'address_id' => NULL,
				'name' => 'Bay City, MI ',
				'code' => 'MBS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			305 => 
			array (
				'id' => 306,
				'address_id' => NULL,
				'name' => 'Bayamo, Cuba ',
				'code' => 'BYM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			306 => 
			array (
				'id' => 307,
				'address_id' => NULL,
				'name' => 'Bayreuth, Germany ',
				'code' => 'BYU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			307 => 
			array (
				'id' => 308,
				'address_id' => NULL,
				'name' => 'Bearskin Lake, ON ',
				'code' => 'XBE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			308 => 
			array (
				'id' => 309,
				'address_id' => NULL,
				'name' => 'Beaumont/Port Arthur, TX ',
				'code' => 'BPT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			309 => 
			array (
				'id' => 310,
				'address_id' => NULL,
				'name' => 'Beaver Creek, CO - Van service ',
				'code' => 'ZBV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			310 => 
			array (
				'id' => 311,
				'address_id' => NULL,
				'name' => 'Beaver, AK ',
				'code' => 'WBQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			311 => 
			array (
				'id' => 312,
				'address_id' => NULL,
				'name' => 'Bechar, Algeria ',
				'code' => 'CBH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			312 => 
			array (
				'id' => 313,
				'address_id' => NULL,
				'name' => 'Beckley, WV ',
				'code' => 'BKW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			313 => 
			array (
				'id' => 314,
				'address_id' => NULL,
				'name' => 'Bedford, MA ',
				'code' => 'BED',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			314 => 
			array (
				'id' => 315,
				'address_id' => NULL,
				'name' => 'Bedourie, Australia ',
				'code' => 'BEU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			315 => 
			array (
				'id' => 316,
				'address_id' => NULL,
				'name' => 'Beef Island, British Virgin Islands ',
				'code' => 'EIS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			316 => 
			array (
				'id' => 317,
				'address_id' => NULL,
				'name' => 'Beica, Ethiopia ',
				'code' => 'BEI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			317 => 
			array (
				'id' => 318,
				'address_id' => NULL,
				'name' => 'Beida, Libya - La Braq ',
				'code' => 'LAQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			318 => 
			array (
				'id' => 319,
				'address_id' => NULL,
				'name' => 'Beihai, China ',
				'code' => 'BHY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			319 => 
			array (
				'id' => 320,
				'address_id' => NULL,
				'name' => 'Beijing, China ',
				'code' => 'PEK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			320 => 
			array (
				'id' => 321,
				'address_id' => NULL,
				'name' => 'Beira, Mozambique ',
				'code' => 'BEW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			321 => 
			array (
				'id' => 322,
				'address_id' => NULL,
				'name' => 'Beirut, Lebanon ',
				'code' => 'BEY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			322 => 
			array (
				'id' => 323,
				'address_id' => NULL,
				'name' => 'Bejaia, Algeria ',
				'code' => 'BJA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			323 => 
			array (
				'id' => 324,
				'address_id' => NULL,
				'name' => 'Belaga, Mozambique ',
				'code' => 'BLG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			324 => 
			array (
				'id' => 325,
				'address_id' => NULL,
				'name' => 'Belem, Brazil ',
				'code' => 'BEL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			325 => 
			array (
				'id' => 326,
				'address_id' => NULL,
				'name' => 'Belep Island, New Caledonia ',
				'code' => 'BMY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			326 => 
			array (
				'id' => 327,
				'address_id' => NULL,
				'name' => 'Belfast, Northern Ireland, United Kingdom ',
				'code' => 'BFS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			327 => 
			array (
				'id' => 328,
				'address_id' => NULL,
				'name' => 'Belfast, United Kingdom ',
				'code' => 'BHD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			328 => 
			array (
				'id' => 329,
				'address_id' => NULL,
				'name' => 'Belgorod, Russia ',
				'code' => 'EGO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			329 => 
			array (
				'id' => 330,
				'address_id' => NULL,
				'name' => 'Belgrade, Serbia and Montenegro - Beograd ',
				'code' => 'BEG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			330 => 
			array (
				'id' => 331,
				'address_id' => NULL,
				'name' => 'Belize City, Belize - International ',
				'code' => 'BZE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			331 => 
			array (
				'id' => 332,
				'address_id' => NULL,
				'name' => 'Belize City, Belize - Municipal ',
				'code' => 'TZA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			332 => 
			array (
				'id' => 333,
				'address_id' => NULL,
				'name' => 'Bella Bella, BC ',
				'code' => 'ZEL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			333 => 
			array (
				'id' => 334,
				'address_id' => NULL,
				'name' => 'Bella Coola, BC ',
				'code' => 'QBC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			334 => 
			array (
				'id' => 335,
				'address_id' => NULL,
				'name' => 'Belleville, IL ',
				'code' => 'BLV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			335 => 
			array (
				'id' => 336,
				'address_id' => NULL,
				'name' => 'Belleville, ON - Rail service ',
				'code' => 'XVV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			336 => 
			array (
				'id' => 337,
				'address_id' => NULL,
				'name' => 'Bellingham, WA ',
				'code' => 'BLI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			337 => 
			array (
				'id' => 338,
				'address_id' => NULL,
				'name' => 'Bellona, Solomon Islands ',
				'code' => 'BNY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			338 => 
			array (
				'id' => 339,
				'address_id' => NULL,
				'name' => 'Belo Horizonte, Brazil - Pampulha ',
				'code' => 'PLU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			339 => 
			array (
				'id' => 340,
				'address_id' => NULL,
				'name' => 'Belo Horizonte, Brazil - Tancredo Neves Intl. ',
				'code' => 'CNF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			340 => 
			array (
				'id' => 341,
				'address_id' => NULL,
				'name' => 'Belo, Madagascar ',
				'code' => 'BMD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			341 => 
			array (
				'id' => 342,
				'address_id' => NULL,
				'name' => 'Bemidji, MN ',
				'code' => 'BJI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			342 => 
			array (
				'id' => 343,
				'address_id' => NULL,
				'name' => 'Benbecula, United Kingdom ',
				'code' => 'BEB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			343 => 
			array (
				'id' => 344,
				'address_id' => NULL,
				'name' => 'Benghazi, Libya ',
				'code' => 'BEN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			344 => 
			array (
				'id' => 345,
				'address_id' => NULL,
				'name' => 'Bengkulu, Indonesia ',
				'code' => 'BKS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			345 => 
			array (
				'id' => 346,
				'address_id' => NULL,
				'name' => 'Benton Harbor, MI ',
				'code' => 'BEH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			346 => 
			array (
				'id' => 347,
				'address_id' => NULL,
				'name' => 'Berau, Indonesia ',
				'code' => 'BEJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			347 => 
			array (
				'id' => 348,
				'address_id' => NULL,
				'name' => 'Berbera, Somalia ',
				'code' => 'BBO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			348 => 
			array (
				'id' => 349,
				'address_id' => NULL,
				'name' => 'Berens River, MB ',
				'code' => 'YBV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			349 => 
			array (
				'id' => 350,
				'address_id' => NULL,
				'name' => 'Bergen, Norway ',
				'code' => 'BGO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			350 => 
			array (
				'id' => 351,
				'address_id' => NULL,
				'name' => 'Bergerac, France ',
				'code' => 'EGC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			351 => 
			array (
				'id' => 352,
				'address_id' => NULL,
				'name' => 'Berlevag, Norway ',
				'code' => 'BVG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			352 => 
			array (
				'id' => 353,
				'address_id' => NULL,
				'name' => 'Berlin, Germany - All airports ',
				'code' => 'BER',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			353 => 
			array (
				'id' => 354,
				'address_id' => NULL,
				'name' => 'Berlin, Germany - Schoenefeld ',
				'code' => 'SXF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			354 => 
			array (
				'id' => 355,
				'address_id' => NULL,
				'name' => 'Berlin, Germany - Tegel ',
				'code' => 'TXL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			355 => 
			array (
				'id' => 356,
				'address_id' => NULL,
				'name' => 'Berlin, Germany - Tempelhof ',
				'code' => 'THF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			356 => 
			array (
				'id' => 357,
				'address_id' => NULL,
				'name' => 'Bermuda, Bermuda ',
				'code' => 'BDA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			357 => 
			array (
				'id' => 358,
				'address_id' => NULL,
				'name' => 'Berne, Switzerland - Belp Airport ',
				'code' => 'BRN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			358 => 
			array (
				'id' => 359,
				'address_id' => NULL,
				'name' => 'Berne, Switzerland - Rail service ',
				'code' => 'ZDJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			359 => 
			array (
				'id' => 360,
				'address_id' => NULL,
				'name' => 'Besalampy, Madagascar ',
				'code' => 'BPY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			360 => 
			array (
				'id' => 361,
				'address_id' => NULL,
				'name' => 'Bethel, AK ',
				'code' => 'BET',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			361 => 
			array (
				'id' => 362,
				'address_id' => NULL,
				'name' => 'Bethlehem, PA ',
				'code' => 'ABE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			362 => 
			array (
				'id' => 363,
				'address_id' => NULL,
				'name' => 'Bettles, AK ',
				'code' => 'BTT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			363 => 
			array (
				'id' => 364,
				'address_id' => NULL,
				'name' => 'Beziers, France ',
				'code' => 'BZR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			364 => 
			array (
				'id' => 365,
				'address_id' => NULL,
				'name' => 'Bhadrapur, Nepal ',
				'code' => 'BDP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			365 => 
			array (
				'id' => 366,
				'address_id' => NULL,
				'name' => 'Bhairawa, Nepal ',
				'code' => 'BWA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			366 => 
			array (
				'id' => 367,
				'address_id' => NULL,
				'name' => 'Bhamo, Myanmar ',
				'code' => 'BMO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			367 => 
			array (
				'id' => 368,
				'address_id' => NULL,
				'name' => 'Bharatpur, Nepal ',
				'code' => 'BHR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			368 => 
			array (
				'id' => 369,
				'address_id' => NULL,
				'name' => 'Bhavnagar, India ',
				'code' => 'BHU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			369 => 
			array (
				'id' => 370,
				'address_id' => NULL,
				'name' => 'Bhopal, India ',
				'code' => 'BHO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			370 => 
			array (
				'id' => 371,
				'address_id' => NULL,
				'name' => 'Bhubaneswar, India ',
				'code' => 'BBI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			371 => 
			array (
				'id' => 372,
				'address_id' => NULL,
				'name' => 'Bhuj, India ',
				'code' => 'BHJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			372 => 
			array (
				'id' => 373,
				'address_id' => NULL,
				'name' => 'Biak, Indonesia ',
				'code' => 'BIK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			373 => 
			array (
				'id' => 374,
				'address_id' => NULL,
				'name' => 'Biarritz, France ',
				'code' => 'BIQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			374 => 
			array (
				'id' => 375,
				'address_id' => NULL,
				'name' => 'Big Trout, ON ',
				'code' => 'YTL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			375 => 
			array (
				'id' => 376,
				'address_id' => NULL,
				'name' => 'Bikini Atoll, Marshall Islands ',
				'code' => 'BII',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			376 => 
			array (
				'id' => 377,
				'address_id' => NULL,
				'name' => 'Bilbao, Spain ',
				'code' => 'BIO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			377 => 
			array (
				'id' => 378,
				'address_id' => NULL,
				'name' => 'Billings, MT ',
				'code' => 'BIL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			378 => 
			array (
				'id' => 379,
				'address_id' => NULL,
				'name' => 'Billund, Denmark ',
				'code' => 'BLL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			379 => 
			array (
				'id' => 380,
				'address_id' => NULL,
				'name' => 'Biloxi/Gulfport, MS ',
				'code' => 'GPT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			380 => 
			array (
				'id' => 381,
				'address_id' => NULL,
				'name' => 'Bima, Indonesia ',
				'code' => 'BMU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			381 => 
			array (
				'id' => 382,
				'address_id' => NULL,
				'name' => 'Bimini, Bahamas ',
				'code' => 'BIM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			382 => 
			array (
				'id' => 383,
				'address_id' => NULL,
				'name' => 'Bimini, Bahamas ',
				'code' => 'NSB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			383 => 
			array (
				'id' => 384,
				'address_id' => NULL,
				'name' => 'Binghamton, NY ',
				'code' => 'BGM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			384 => 
			array (
				'id' => 385,
				'address_id' => NULL,
				'name' => 'Bintulu, Malaysia ',
				'code' => 'BTU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			385 => 
			array (
				'id' => 386,
				'address_id' => NULL,
				'name' => 'Bintuni, Indonesia ',
				'code' => 'NTI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			386 => 
			array (
				'id' => 387,
				'address_id' => NULL,
				'name' => 'Biratragar, Nepal ',
				'code' => 'BIR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			387 => 
			array (
				'id' => 388,
				'address_id' => NULL,
				'name' => 'Birch Creek, AK ',
				'code' => 'KBC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			388 => 
			array (
				'id' => 389,
				'address_id' => NULL,
				'name' => 'Birdsville, Australia ',
				'code' => 'BVI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			389 => 
			array (
				'id' => 390,
				'address_id' => NULL,
				'name' => 'Birmingham, AL ',
				'code' => 'BHM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			390 => 
			array (
				'id' => 391,
				'address_id' => NULL,
				'name' => 'Birmingham, United Kingdom ',
				'code' => 'BHX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			391 => 
			array (
				'id' => 392,
				'address_id' => NULL,
				'name' => 'Bisha, Saudi Arabia ',
				'code' => 'BHH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			392 => 
			array (
				'id' => 393,
				'address_id' => NULL,
				'name' => 'Bishkek, Kyrgyzstan ',
				'code' => 'FRU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			393 => 
			array (
				'id' => 394,
				'address_id' => NULL,
				'name' => 'Biskra, Algeria ',
				'code' => 'BSK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			394 => 
			array (
				'id' => 395,
				'address_id' => NULL,
				'name' => 'Bismarck, ND ',
				'code' => 'BIS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			395 => 
			array (
				'id' => 396,
				'address_id' => NULL,
				'name' => 'Bissau, Guinea-Bissau ',
				'code' => 'OXB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			396 => 
			array (
				'id' => 397,
				'address_id' => NULL,
				'name' => 'Black Tickle, NL ',
				'code' => 'YBI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			397 => 
			array (
				'id' => 398,
				'address_id' => NULL,
				'name' => 'Blackall, Australia ',
				'code' => 'BKQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			398 => 
			array (
				'id' => 399,
				'address_id' => NULL,
				'name' => 'Blackpool, United Kingdom ',
				'code' => 'BLK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			399 => 
			array (
				'id' => 400,
				'address_id' => NULL,
				'name' => 'Blackwater, Australia ',
				'code' => 'BLT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			400 => 
			array (
				'id' => 401,
				'address_id' => NULL,
				'name' => 'Blagoveschensk, Russia ',
				'code' => 'BQS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			401 => 
			array (
				'id' => 402,
				'address_id' => NULL,
				'name' => 'Blanc Sablon, QC ',
				'code' => 'YBX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			402 => 
			array (
				'id' => 403,
				'address_id' => NULL,
				'name' => 'Blantyre, Malawi ',
				'code' => 'BLZ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			403 => 
			array (
				'id' => 404,
				'address_id' => NULL,
				'name' => 'Blenheim, New Zealand ',
				'code' => 'BHE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			404 => 
			array (
				'id' => 405,
				'address_id' => NULL,
				'name' => 'Blo Horizonte, Brazil ',
				'code' => 'CNF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			405 => 
			array (
				'id' => 406,
				'address_id' => NULL,
				'name' => 'Block Island, RI ',
				'code' => 'BID',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			406 => 
			array (
				'id' => 407,
				'address_id' => NULL,
				'name' => 'Bloemfontein, South Africa ',
				'code' => 'BFN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			407 => 
			array (
				'id' => 408,
				'address_id' => NULL,
				'name' => 'Bloomington, IL ',
				'code' => 'BMI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			408 => 
			array (
				'id' => 409,
				'address_id' => NULL,
				'name' => 'Bluefield, WV ',
				'code' => 'BLF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			409 => 
			array (
				'id' => 410,
				'address_id' => NULL,
				'name' => 'Boa Vista, Cape Verde ',
				'code' => 'BVC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			410 => 
			array (
				'id' => 411,
				'address_id' => NULL,
				'name' => 'Boang, Papua New Guinea ',
				'code' => 'BOV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			411 => 
			array (
				'id' => 412,
				'address_id' => NULL,
				'name' => 'Boavista, Brazil ',
				'code' => 'BVB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			412 => 
			array (
				'id' => 413,
				'address_id' => NULL,
				'name' => 'Bocas Del Toro, Panama ',
				'code' => 'BOC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			413 => 
			array (
				'id' => 414,
				'address_id' => NULL,
				'name' => 'Bodo, Norway ',
				'code' => 'BOO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			414 => 
			array (
				'id' => 415,
				'address_id' => NULL,
				'name' => 'Bodrum, Turkey ',
				'code' => 'BJV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			415 => 
			array (
				'id' => 416,
				'address_id' => NULL,
				'name' => 'Bogota, Colombia ',
				'code' => 'BOG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			416 => 
			array (
				'id' => 417,
				'address_id' => NULL,
				'name' => 'Boiju Island, Australia ',
				'code' => 'GIC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			417 => 
			array (
				'id' => 418,
				'address_id' => NULL,
				'name' => 'Boise, ID ',
				'code' => 'BOI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			418 => 
			array (
				'id' => 419,
				'address_id' => NULL,
				'name' => 'Bojnord, Iran ',
				'code' => 'BJB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			419 => 
			array (
				'id' => 420,
				'address_id' => NULL,
				'name' => 'Bokondini, Indonesia ',
				'code' => 'BUI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			420 => 
			array (
				'id' => 421,
				'address_id' => NULL,
				'name' => 'Bol, Croatia ',
				'code' => 'BWK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			421 => 
			array (
				'id' => 422,
				'address_id' => NULL,
				'name' => 'Bolzano, Italy ',
				'code' => 'BZO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			422 => 
			array (
				'id' => 423,
				'address_id' => NULL,
				'name' => 'Boma, Congo ',
				'code' => 'BOA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			423 => 
			array (
				'id' => 424,
				'address_id' => NULL,
				'name' => 'Bombay, India ',
				'code' => 'BOM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			424 => 
			array (
				'id' => 425,
				'address_id' => NULL,
				'name' => 'Bonaire, Netherlands Antilles ',
				'code' => 'BON',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			425 => 
			array (
				'id' => 426,
				'address_id' => NULL,
				'name' => 'Bonaventure, QC ',
				'code' => 'YVB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			426 => 
			array (
				'id' => 427,
				'address_id' => NULL,
				'name' => 'Bonn, Germany ',
				'code' => 'BNJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			427 => 
			array (
				'id' => 428,
				'address_id' => NULL,
				'name' => 'Bora Bora, French Polynesia ',
				'code' => 'BOB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			428 => 
			array (
				'id' => 429,
				'address_id' => NULL,
				'name' => 'Bordeaux, France ',
				'code' => 'BOD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			429 => 
			array (
				'id' => 430,
				'address_id' => NULL,
				'name' => 'Borg El Arab, Egypt ',
				'code' => 'HBE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			430 => 
			array (
				'id' => 431,
				'address_id' => NULL,
				'name' => 'Borkum, Germany ',
				'code' => 'BMK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			431 => 
			array (
				'id' => 432,
				'address_id' => NULL,
				'name' => 'Borlange, Sweden ',
				'code' => 'BLE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			432 => 
			array (
				'id' => 433,
				'address_id' => NULL,
				'name' => 'Bornholm, Denmark ',
				'code' => 'RNN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			433 => 
			array (
				'id' => 434,
				'address_id' => NULL,
				'name' => 'Borroloola, Australia ',
				'code' => 'BOX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			434 => 
			array (
				'id' => 435,
				'address_id' => NULL,
				'name' => 'Bossaro, Somalia ',
				'code' => 'BSA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			435 => 
			array (
				'id' => 436,
				'address_id' => NULL,
				'name' => 'Boston, MA ',
				'code' => 'BOS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			436 => 
			array (
				'id' => 437,
				'address_id' => NULL,
				'name' => 'Boulder, CO - Bus service ',
				'code' => 'XHH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			437 => 
			array (
				'id' => 438,
				'address_id' => NULL,
				'name' => 'Boulder, CO - Hiltons Har H ',
				'code' => 'WHH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			438 => 
			array (
				'id' => 439,
				'address_id' => NULL,
				'name' => 'Boulder, CO - Municipal Airport ',
				'code' => 'WBU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			439 => 
			array (
				'id' => 440,
				'address_id' => NULL,
				'name' => 'Boulia, Australia ',
				'code' => 'BQL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			440 => 
			array (
				'id' => 441,
				'address_id' => NULL,
				'name' => 'Boundary, AK ',
				'code' => 'BYA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			441 => 
			array (
				'id' => 442,
				'address_id' => NULL,
				'name' => 'Bourgas, Bulgaria ',
				'code' => 'BOJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			442 => 
			array (
				'id' => 443,
				'address_id' => NULL,
				'name' => 'Bourke, Australia ',
				'code' => 'BRK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			443 => 
			array (
				'id' => 444,
				'address_id' => NULL,
				'name' => 'Bournemouth, United Kingdom ',
				'code' => 'BOH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			444 => 
			array (
				'id' => 445,
				'address_id' => NULL,
				'name' => 'Bowling Green, KY ',
				'code' => 'BWG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			445 => 
			array (
				'id' => 446,
				'address_id' => NULL,
				'name' => 'Bozeman, MT ',
				'code' => 'BZN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			446 => 
			array (
				'id' => 447,
				'address_id' => NULL,
				'name' => 'Brack, Libya ',
				'code' => 'BCQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			447 => 
			array (
				'id' => 448,
				'address_id' => NULL,
				'name' => 'Bradford, PA ',
				'code' => 'BFD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			448 => 
			array (
				'id' => 449,
				'address_id' => NULL,
				'name' => 'Brainerd, MN ',
				'code' => 'BRD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			449 => 
			array (
				'id' => 450,
				'address_id' => NULL,
				'name' => 'Brampton Island, Australia ',
				'code' => 'BMP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			450 => 
			array (
				'id' => 451,
				'address_id' => NULL,
				'name' => 'Brampton, ON - Rail service ',
				'code' => 'XPN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			451 => 
			array (
				'id' => 452,
				'address_id' => NULL,
				'name' => 'Brandon, MB ',
				'code' => 'YBR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			452 => 
			array (
				'id' => 453,
				'address_id' => NULL,
				'name' => 'Brantford, ON - Rail service ',
				'code' => 'XFV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			453 => 
			array (
				'id' => 454,
				'address_id' => NULL,
				'name' => 'Brasilia, DF, Brazil ',
				'code' => 'BSB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			454 => 
			array (
				'id' => 455,
				'address_id' => NULL,
				'name' => 'Bratislava, Slovakia ',
				'code' => 'BTS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			455 => 
			array (
				'id' => 456,
				'address_id' => NULL,
				'name' => 'Bratsk, Russia ',
				'code' => 'BTK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			456 => 
			array (
				'id' => 457,
				'address_id' => NULL,
				'name' => 'Braunschweig, Denmark ',
				'code' => 'BWE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			457 => 
			array (
				'id' => 458,
				'address_id' => NULL,
				'name' => 'Brawnwood, TX ',
				'code' => 'BWD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			458 => 
			array (
				'id' => 459,
				'address_id' => NULL,
				'name' => 'Brazzaville, Congo ',
				'code' => 'BZV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			459 => 
			array (
				'id' => 460,
				'address_id' => NULL,
				'name' => 'Breckenridge, CO - Van service ',
				'code' => 'QKB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			460 => 
			array (
				'id' => 461,
				'address_id' => NULL,
				'name' => 'Bremen, Germany ',
				'code' => 'BRE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			461 => 
			array (
				'id' => 462,
				'address_id' => NULL,
				'name' => 'Brest, France ',
				'code' => 'BES',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			462 => 
			array (
				'id' => 463,
				'address_id' => NULL,
				'name' => 'Brewarrina, Australia ',
				'code' => 'BWQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			463 => 
			array (
				'id' => 464,
				'address_id' => NULL,
				'name' => 'Bridgetown, Barbados ',
				'code' => 'BGI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			464 => 
			array (
				'id' => 465,
				'address_id' => NULL,
				'name' => 'Brindisi, Italy ',
				'code' => 'BDS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			465 => 
			array (
				'id' => 466,
				'address_id' => NULL,
				'name' => 'Brisbane, Queensland, Australia ',
				'code' => 'BNE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			466 => 
			array (
				'id' => 467,
				'address_id' => NULL,
				'name' => 'Bristol, United Kingdom ',
				'code' => 'BRS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			467 => 
			array (
				'id' => 468,
				'address_id' => NULL,
				'name' => 'Bristol, VA ',
				'code' => 'TRI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			468 => 
			array (
				'id' => 469,
				'address_id' => NULL,
				'name' => 'Brive-La-Gaillarde, France - Laroche',
				'code' => 'BVE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			469 => 
			array (
				'id' => 470,
				'address_id' => NULL,
				'name' => 'Brno, Czech Republic - Bus service ',
				'code' => 'ZDN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			470 => 
			array (
				'id' => 471,
				'address_id' => NULL,
				'name' => 'Brno, Czech Republic - Turany ',
				'code' => 'BRQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			471 => 
			array (
				'id' => 472,
				'address_id' => NULL,
				'name' => 'Brochet, MB ',
				'code' => 'YBT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			472 => 
			array (
				'id' => 473,
				'address_id' => NULL,
				'name' => 'Brockville, ON ',
				'code' => 'XBR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			473 => 
			array (
				'id' => 474,
				'address_id' => NULL,
				'name' => 'Broken Hill, Australia ',
				'code' => 'BHQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			474 => 
			array (
				'id' => 475,
				'address_id' => NULL,
				'name' => 'Bronnoysund, Norway ',
				'code' => 'BNN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			475 => 
			array (
				'id' => 476,
				'address_id' => NULL,
				'name' => 'Brookings, SD ',
				'code' => 'BKX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			476 => 
			array (
				'id' => 477,
				'address_id' => NULL,
				'name' => 'Brooks Lodge, AK ',
				'code' => 'RBH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			477 => 
			array (
				'id' => 478,
				'address_id' => NULL,
				'name' => 'Broome, Australia ',
				'code' => 'BME',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			478 => 
			array (
				'id' => 479,
				'address_id' => NULL,
				'name' => 'Brownsville, TX ',
				'code' => 'BRO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			479 => 
			array (
				'id' => 480,
				'address_id' => NULL,
				'name' => 'Brunswick, GA ',
				'code' => 'BQK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			480 => 
			array (
				'id' => 481,
				'address_id' => NULL,
				'name' => 'Brus Laguna, Honduras ',
				'code' => 'BHG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			481 => 
			array (
				'id' => 482,
				'address_id' => NULL,
				'name' => 'Brussels, Belgium - National ',
				'code' => 'BRU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			482 => 
			array (
				'id' => 483,
				'address_id' => NULL,
				'name' => 'Brussels, Belgium - Rail service ',
				'code' => 'ZYR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			483 => 
			array (
				'id' => 484,
				'address_id' => NULL,
				'name' => 'Brussels, Belguim - Charleroi ',
				'code' => 'CRL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			484 => 
			array (
				'id' => 485,
				'address_id' => NULL,
				'name' => 'Bucaramanga, Colombia ',
				'code' => 'BGA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			485 => 
			array (
				'id' => 486,
				'address_id' => NULL,
				'name' => 'Bucharest, Romania - Baneasa ',
				'code' => 'BBU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			486 => 
			array (
				'id' => 487,
				'address_id' => NULL,
				'name' => 'Bucharest, Romania - Otopeni International ',
				'code' => 'OTP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			487 => 
			array (
				'id' => 488,
				'address_id' => NULL,
				'name' => 'Buckland, AK ',
				'code' => 'BKC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			488 => 
			array (
				'id' => 489,
				'address_id' => NULL,
				'name' => 'Budapest, Hungary ',
				'code' => 'BUD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			489 => 
			array (
				'id' => 490,
				'address_id' => NULL,
				'name' => 'Buenos Aires, Argentina - Jorge Newbery ',
				'code' => 'AEP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			490 => 
			array (
				'id' => 491,
				'address_id' => NULL,
				'name' => 'Buenos Aires, Argentina - Ministro Pistarini ',
				'code' => 'EZE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			491 => 
			array (
				'id' => 492,
				'address_id' => NULL,
				'name' => 'Buffalo, NY ',
				'code' => 'BUF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			492 => 
			array (
				'id' => 493,
				'address_id' => NULL,
				'name' => 'Bugulma, Russia ',
				'code' => 'UUA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			493 => 
			array (
				'id' => 494,
				'address_id' => NULL,
				'name' => 'Bujumbura, Burundi ',
				'code' => 'BJM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			494 => 
			array (
				'id' => 495,
				'address_id' => NULL,
				'name' => 'Buka, Papua New Guinea ',
				'code' => 'BUA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			495 => 
			array (
				'id' => 496,
				'address_id' => NULL,
				'name' => 'Bukhara, Uzbekistan ',
				'code' => 'BHK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			496 => 
			array (
				'id' => 497,
				'address_id' => NULL,
				'name' => 'Bukoba, Malaysia ',
				'code' => 'BKZ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			497 => 
			array (
				'id' => 498,
				'address_id' => NULL,
				'name' => 'Bulawayo, Zimbabwe ',
				'code' => 'BUQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			498 => 
			array (
				'id' => 499,
				'address_id' => NULL,
				'name' => 'Bulgulma, Russia ',
				'code' => 'UUA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			499 => 
			array (
				'id' => 500,
				'address_id' => NULL,
				'name' => 'Bullhead City/Laughlin, AZ ',
				'code' => 'IFP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
		));
		\DB::table('airports')->insert(array (
			0 => 
			array (
				'id' => 501,
				'address_id' => NULL,
				'name' => 'Bundaberg, Australia ',
				'code' => 'BDB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			1 => 
			array (
				'id' => 502,
				'address_id' => NULL,
				'name' => 'Bunsil, Papua New Guinea ',
				'code' => 'BXZ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			2 => 
			array (
				'id' => 503,
				'address_id' => NULL,
				'name' => 'Burao, Somalia ',
				'code' => 'BUO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			3 => 
			array (
				'id' => 504,
				'address_id' => NULL,
				'name' => 'Burbank, CA ',
				'code' => 'BUR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			4 => 
			array (
				'id' => 505,
				'address_id' => NULL,
				'name' => 'Bureta, Fiji ',
				'code' => 'LEV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			5 => 
			array (
				'id' => 506,
				'address_id' => NULL,
				'name' => 'Buri Ram, Thailand ',
				'code' => 'BFV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			6 => 
			array (
				'id' => 507,
				'address_id' => NULL,
				'name' => 'Burketown, Australia ',
				'code' => 'BUC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			7 => 
			array (
				'id' => 508,
				'address_id' => NULL,
				'name' => 'Burlington, IA ',
				'code' => 'BRL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			8 => 
			array (
				'id' => 509,
				'address_id' => NULL,
				'name' => 'Burlington, VT ',
				'code' => 'BTV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			9 => 
			array (
				'id' => 510,
				'address_id' => NULL,
				'name' => 'Burnie, Australia ',
				'code' => 'BWT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			10 => 
			array (
				'id' => 511,
				'address_id' => NULL,
				'name' => 'Burns Lake, BC ',
				'code' => 'YPZ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			11 => 
			array (
				'id' => 512,
				'address_id' => NULL,
				'name' => 'Busan, South Korea - Gimhae ',
				'code' => 'PUS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			12 => 
			array (
				'id' => 513,
				'address_id' => NULL,
				'name' => 'Butte, MT ',
				'code' => 'BTM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			13 => 
			array (
				'id' => 514,
				'address_id' => NULL,
				'name' => 'Butuan, Philippines ',
				'code' => 'BXU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			14 => 
			array (
				'id' => 515,
				'address_id' => NULL,
				'name' => 'Bydgoszcz, Poland ',
				'code' => 'BZG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			15 => 
			array (
				'id' => 516,
				'address_id' => NULL,
				'name' => 'Cabo San Lucas, \'Los Cabos\', Mexico ',
				'code' => 'SJD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			16 => 
			array (
				'id' => 517,
				'address_id' => NULL,
				'name' => 'Caen, France ',
				'code' => 'CFR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			17 => 
			array (
				'id' => 518,
				'address_id' => NULL,
				'name' => 'Cagayan De Oro, Philippines - Lumbia ',
				'code' => 'CGY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			18 => 
			array (
				'id' => 519,
				'address_id' => NULL,
				'name' => 'Cagliari, Italy ',
				'code' => 'CAG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			19 => 
			array (
				'id' => 520,
				'address_id' => NULL,
				'name' => 'Cairns, Australia ',
				'code' => 'CNS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			20 => 
			array (
				'id' => 521,
				'address_id' => NULL,
				'name' => 'Cairo, Egypt ',
				'code' => 'CAI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			21 => 
			array (
				'id' => 522,
				'address_id' => NULL,
				'name' => 'Cajamarca, Peru ',
				'code' => 'CJA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			22 => 
			array (
				'id' => 523,
				'address_id' => NULL,
				'name' => 'Calabar, Nigeria ',
				'code' => 'CBQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			23 => 
			array (
				'id' => 524,
				'address_id' => NULL,
				'name' => 'Calama, Chile ',
				'code' => 'CJC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			24 => 
			array (
				'id' => 525,
				'address_id' => NULL,
				'name' => 'Calcutta, India ',
				'code' => 'CCU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			25 => 
			array (
				'id' => 526,
				'address_id' => NULL,
				'name' => 'Calgary, AB ',
				'code' => 'YYC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			26 => 
			array (
				'id' => 527,
				'address_id' => NULL,
				'name' => 'Cali, Colombia ',
				'code' => 'CLO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			27 => 
			array (
				'id' => 528,
				'address_id' => NULL,
				'name' => 'Calvi, France ',
				'code' => 'CLY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			28 => 
			array (
				'id' => 529,
				'address_id' => NULL,
				'name' => 'Camaguey, Cuba ',
				'code' => 'CMW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			29 => 
			array (
				'id' => 530,
				'address_id' => NULL,
				'name' => 'Cambridge Bay, NU ',
				'code' => 'YCB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			30 => 
			array (
				'id' => 531,
				'address_id' => NULL,
				'name' => 'Cambridge, United Kingdom ',
				'code' => 'CBG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			31 => 
			array (
				'id' => 532,
				'address_id' => NULL,
				'name' => 'Camodoro, Argentina ',
				'code' => 'CRD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			32 => 
			array (
				'id' => 533,
				'address_id' => NULL,
				'name' => 'Campbell River, BC ',
				'code' => 'YBL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			33 => 
			array (
				'id' => 534,
				'address_id' => NULL,
				'name' => 'Campbellton, NB - Rail service ',
				'code' => 'XAZ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			34 => 
			array (
				'id' => 535,
				'address_id' => NULL,
				'name' => 'Campbeltown, United Kingdom ',
				'code' => 'CAL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			35 => 
			array (
				'id' => 536,
				'address_id' => NULL,
				'name' => 'Campeche, Mexico ',
				'code' => 'CPE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			36 => 
			array (
				'id' => 537,
				'address_id' => NULL,
				'name' => 'Campina Grande, Brazil ',
				'code' => 'CPV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			37 => 
			array (
				'id' => 538,
				'address_id' => NULL,
				'name' => 'Campinas, Brazil ',
				'code' => 'CPQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			38 => 
			array (
				'id' => 539,
				'address_id' => NULL,
				'name' => 'Campo Grande, Brazil ',
				'code' => 'CGR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			39 => 
			array (
				'id' => 540,
				'address_id' => NULL,
				'name' => 'Campos, Brazil ',
				'code' => 'CAW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			40 => 
			array (
				'id' => 541,
				'address_id' => NULL,
				'name' => 'Canaima, Venezuela ',
				'code' => 'CAS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			41 => 
			array (
				'id' => 542,
				'address_id' => NULL,
				'name' => 'Canberra, Australia ',
				'code' => 'CBR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			42 => 
			array (
				'id' => 543,
				'address_id' => NULL,
				'name' => 'Cancun, Mexico ',
				'code' => 'CUN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			43 => 
			array (
				'id' => 544,
				'address_id' => NULL,
				'name' => 'Cannes, France - Coisette Heliport ',
				'code' => 'JCA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			44 => 
			array (
				'id' => 545,
				'address_id' => NULL,
				'name' => 'Cannes, France - Mandelieu ',
				'code' => 'CEQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			45 => 
			array (
				'id' => 546,
				'address_id' => NULL,
				'name' => 'Cannes, France - Vieux Port ',
				'code' => 'QYW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			46 => 
			array (
				'id' => 547,
				'address_id' => NULL,
				'name' => 'Canouan, Saint Vincent and the Grenadines ',
				'code' => 'CIW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			47 => 
			array (
				'id' => 548,
				'address_id' => NULL,
				'name' => 'Canton/Akron, OH ',
				'code' => 'CAK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			48 => 
			array (
				'id' => 549,
				'address_id' => NULL,
				'name' => 'Cap Haitien, Haiti ',
				'code' => 'CAP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			49 => 
			array (
				'id' => 550,
				'address_id' => NULL,
				'name' => 'Cape Dorset, NU ',
				'code' => 'YTE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			50 => 
			array (
				'id' => 551,
				'address_id' => NULL,
				'name' => 'Cape Girardeau, MO ',
				'code' => 'CGI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			51 => 
			array (
				'id' => 552,
				'address_id' => NULL,
				'name' => 'Cape Lisburne, AK ',
				'code' => 'LUR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			52 => 
			array (
				'id' => 553,
				'address_id' => NULL,
				'name' => 'Cape Newenham, AK ',
				'code' => 'EHM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			53 => 
			array (
				'id' => 554,
				'address_id' => NULL,
				'name' => 'Cape Orford, Papua New Guinea ',
				'code' => 'CPI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			54 => 
			array (
				'id' => 555,
				'address_id' => NULL,
				'name' => 'Cape Town, South Africa ',
				'code' => 'CPT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			55 => 
			array (
				'id' => 556,
				'address_id' => NULL,
				'name' => 'Cape Vogel, Papua New Guinea ',
				'code' => 'CVL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			56 => 
			array (
				'id' => 557,
				'address_id' => NULL,
				'name' => 'Capreol, ON - Rail service ',
				'code' => 'XAW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			57 => 
			array (
				'id' => 558,
				'address_id' => NULL,
				'name' => 'Caracas, Venezuela ',
				'code' => 'CCS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			58 => 
			array (
				'id' => 559,
				'address_id' => NULL,
				'name' => 'Carajas, Brazil ',
				'code' => 'CKS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			59 => 
			array (
				'id' => 560,
				'address_id' => NULL,
				'name' => 'Carbondale, IL ',
				'code' => 'MDH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			60 => 
			array (
				'id' => 561,
				'address_id' => NULL,
				'name' => 'Carcassonne, France ',
				'code' => 'CCF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			61 => 
			array (
				'id' => 562,
				'address_id' => NULL,
				'name' => 'Cardiff, United Kingdom ',
				'code' => 'CWL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			62 => 
			array (
				'id' => 563,
				'address_id' => NULL,
				'name' => 'Carlsbad, CA ',
				'code' => 'CLD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			63 => 
			array (
				'id' => 564,
				'address_id' => NULL,
				'name' => 'Carlsbad, NM ',
				'code' => 'CNM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			64 => 
			array (
				'id' => 565,
				'address_id' => NULL,
				'name' => 'Carmel, CA ',
				'code' => 'MRY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			65 => 
			array (
				'id' => 566,
				'address_id' => NULL,
				'name' => 'Carnarvon, Australia ',
				'code' => 'CVQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			66 => 
			array (
				'id' => 567,
				'address_id' => NULL,
				'name' => 'Carrillo, Costa Rica ',
				'code' => 'RIK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			67 => 
			array (
				'id' => 568,
				'address_id' => NULL,
				'name' => 'Cartagena, Colombia ',
				'code' => 'CTG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			68 => 
			array (
				'id' => 569,
				'address_id' => NULL,
				'name' => 'Cartwright, NL ',
				'code' => 'YRF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			69 => 
			array (
				'id' => 570,
				'address_id' => NULL,
				'name' => 'Carupani, Venezuela ',
				'code' => 'CUP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			70 => 
			array (
				'id' => 571,
				'address_id' => NULL,
				'name' => 'Casablanca, Morocco - Anfa ',
				'code' => 'CAS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			71 => 
			array (
				'id' => 572,
				'address_id' => NULL,
				'name' => 'Casablanca, Morocco - Mohamed V ',
				'code' => 'CMN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			72 => 
			array (
				'id' => 573,
				'address_id' => NULL,
				'name' => 'Cascavel, Brazil ',
				'code' => 'CAC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			73 => 
			array (
				'id' => 574,
				'address_id' => NULL,
				'name' => 'Casino, Australia ',
				'code' => 'CSI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			74 => 
			array (
				'id' => 575,
				'address_id' => NULL,
				'name' => 'Casper, WY ',
				'code' => 'CPR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			75 => 
			array (
				'id' => 576,
				'address_id' => NULL,
				'name' => 'Casselman, ON - Rail service ',
				'code' => 'XZB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			76 => 
			array (
				'id' => 577,
				'address_id' => NULL,
				'name' => 'Castaway, Fiji ',
				'code' => 'CST',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			77 => 
			array (
				'id' => 578,
				'address_id' => NULL,
				'name' => 'Castlegar, BC ',
				'code' => 'YCG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			78 => 
			array (
				'id' => 579,
				'address_id' => NULL,
				'name' => 'Castres, France ',
				'code' => 'DCM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			79 => 
			array (
				'id' => 580,
				'address_id' => NULL,
				'name' => 'Cat Lake, ON ',
				'code' => 'YAC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			80 => 
			array (
				'id' => 581,
				'address_id' => NULL,
				'name' => 'Catamarca, Argentina ',
				'code' => 'CTC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			81 => 
			array (
				'id' => 582,
				'address_id' => NULL,
				'name' => 'Catania, Italy ',
				'code' => 'CTA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			82 => 
			array (
				'id' => 583,
				'address_id' => NULL,
				'name' => 'Caucasia, Colombia ',
				'code' => 'CAQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			83 => 
			array (
				'id' => 584,
				'address_id' => NULL,
				'name' => 'Caxias Do Sul, Brazil ',
				'code' => 'CXJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			84 => 
			array (
				'id' => 585,
				'address_id' => NULL,
				'name' => 'Cayenne, French Guiana ',
				'code' => 'CAY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			85 => 
			array (
				'id' => 586,
				'address_id' => NULL,
				'name' => 'Cayman Brac Is, Cambodia ',
				'code' => 'CYB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			86 => 
			array (
				'id' => 587,
				'address_id' => NULL,
				'name' => 'Cayo Largo Del Sur, Cuba ',
				'code' => 'CYO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			87 => 
			array (
				'id' => 588,
				'address_id' => NULL,
				'name' => 'Cebu, Philippines - Matan International ',
				'code' => 'CEB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			88 => 
			array (
				'id' => 589,
				'address_id' => NULL,
				'name' => 'Cedar City, UT ',
				'code' => 'CDC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			89 => 
			array (
				'id' => 590,
				'address_id' => NULL,
				'name' => 'Cedar Rapids, IA ',
				'code' => 'CID',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			90 => 
			array (
				'id' => 591,
				'address_id' => NULL,
				'name' => 'Cedun, Australia ',
				'code' => 'CED',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			91 => 
			array (
				'id' => 592,
				'address_id' => NULL,
				'name' => 'Central, AK ',
				'code' => 'CEM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			92 => 
			array (
				'id' => 593,
				'address_id' => NULL,
				'name' => 'Ceuta, Spain and Canary Islands ',
				'code' => 'JCU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			93 => 
			array (
				'id' => 594,
				'address_id' => NULL,
				'name' => 'Chadron, NE ',
				'code' => 'CDR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			94 => 
			array (
				'id' => 595,
				'address_id' => NULL,
				'name' => 'Chah-Bahar, Iran ',
				'code' => 'ZBR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			95 => 
			array (
				'id' => 596,
				'address_id' => NULL,
				'name' => 'Chalkyitsik, AK ',
				'code' => 'CIK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			96 => 
			array (
				'id' => 597,
				'address_id' => NULL,
				'name' => 'Chambery, France ',
				'code' => 'CMF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			97 => 
			array (
				'id' => 598,
				'address_id' => NULL,
				'name' => 'Chambord, QC - Rail service ',
				'code' => 'XCI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			98 => 
			array (
				'id' => 599,
				'address_id' => NULL,
				'name' => 'Champaign/Urbana, IL ',
				'code' => 'CMI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			99 => 
			array (
				'id' => 600,
				'address_id' => NULL,
				'name' => 'Chandigarh, India ',
				'code' => 'IXC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			100 => 
			array (
				'id' => 601,
				'address_id' => NULL,
				'name' => 'Chandler, QC - Rail service ',
				'code' => 'XDL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			101 => 
			array (
				'id' => 602,
				'address_id' => NULL,
				'name' => 'Changchun, China ',
				'code' => 'CGQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			102 => 
			array (
				'id' => 603,
				'address_id' => NULL,
				'name' => 'Changde, China ',
				'code' => 'CGD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			103 => 
			array (
				'id' => 604,
				'address_id' => NULL,
				'name' => 'Changuinda, Panama ',
				'code' => 'CHX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			104 => 
			array (
				'id' => 605,
				'address_id' => NULL,
				'name' => 'Changzhou, China ',
				'code' => 'CZX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			105 => 
			array (
				'id' => 606,
				'address_id' => NULL,
				'name' => 'Chania, Greece ',
				'code' => 'CHQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			106 => 
			array (
				'id' => 607,
				'address_id' => NULL,
				'name' => 'Chaoyang, China ',
				'code' => 'CHG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			107 => 
			array (
				'id' => 608,
				'address_id' => NULL,
				'name' => 'Chapeco, Brazil ',
				'code' => 'XAP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			108 => 
			array (
				'id' => 609,
				'address_id' => NULL,
				'name' => 'Chapleau, ON ',
				'code' => 'YLD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			109 => 
			array (
				'id' => 610,
				'address_id' => NULL,
				'name' => 'Charleston, SC ',
				'code' => 'CHS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			110 => 
			array (
				'id' => 611,
				'address_id' => NULL,
				'name' => 'Charleston, WV ',
				'code' => 'CRW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			111 => 
			array (
				'id' => 612,
				'address_id' => NULL,
				'name' => 'Charleville, Australia ',
				'code' => 'CTL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			112 => 
			array (
				'id' => 613,
				'address_id' => NULL,
				'name' => 'Charlotte, NC ',
				'code' => 'CLT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			113 => 
			array (
				'id' => 614,
				'address_id' => NULL,
				'name' => 'Charlottesville, VA ',
				'code' => 'CHO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			114 => 
			array (
				'id' => 615,
				'address_id' => NULL,
				'name' => 'Charlottetown, NL ',
				'code' => 'YHG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			115 => 
			array (
				'id' => 616,
				'address_id' => NULL,
				'name' => 'Charlottetown, PE ',
				'code' => 'YYG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			116 => 
			array (
				'id' => 617,
				'address_id' => NULL,
				'name' => 'Chatham Island, New Zealand ',
				'code' => 'CHT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			117 => 
			array (
				'id' => 618,
				'address_id' => NULL,
				'name' => 'Chatham, ON ',
				'code' => 'XCM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			118 => 
			array (
				'id' => 619,
				'address_id' => NULL,
				'name' => 'Chattanooga, TN ',
				'code' => 'CHA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			119 => 
			array (
				'id' => 620,
				'address_id' => NULL,
				'name' => 'Cheboksary, Russia ',
				'code' => 'CSY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			120 => 
			array (
				'id' => 621,
				'address_id' => NULL,
				'name' => 'Chefornak, AK ',
				'code' => 'CYF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			121 => 
			array (
				'id' => 622,
				'address_id' => NULL,
				'name' => 'Chelybinsk, Russia ',
				'code' => 'CEK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			122 => 
			array (
				'id' => 623,
				'address_id' => NULL,
				'name' => 'Chemainus, BC - Rail service ',
				'code' => 'XHS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			123 => 
			array (
				'id' => 624,
				'address_id' => NULL,
				'name' => 'Chennai, India ',
				'code' => 'MAA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			124 => 
			array (
				'id' => 625,
				'address_id' => NULL,
				'name' => 'Cheongju, South Korea ',
				'code' => 'CJJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			125 => 
			array (
				'id' => 626,
				'address_id' => NULL,
				'name' => 'Cherepovets, Russia ',
				'code' => 'CEE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			126 => 
			array (
				'id' => 627,
				'address_id' => NULL,
				'name' => 'Chergdu, China ',
				'code' => 'CTU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			127 => 
			array (
				'id' => 628,
				'address_id' => NULL,
				'name' => 'Chester, United Kingdom ',
				'code' => 'CEG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			128 => 
			array (
				'id' => 629,
				'address_id' => NULL,
				'name' => 'Chesterfield Inlet, NU ',
				'code' => 'YCS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			129 => 
			array (
				'id' => 630,
				'address_id' => NULL,
				'name' => 'Chetumal, Mexico ',
				'code' => 'CTM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			130 => 
			array (
				'id' => 631,
				'address_id' => NULL,
				'name' => 'Chevak, AK ',
				'code' => 'VAK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			131 => 
			array (
				'id' => 632,
				'address_id' => NULL,
				'name' => 'Chevepovets, Russia ',
				'code' => 'CEE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			132 => 
			array (
				'id' => 633,
				'address_id' => NULL,
				'name' => 'Chevery, QC ',
				'code' => 'YHR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			133 => 
			array (
				'id' => 634,
				'address_id' => NULL,
				'name' => 'Cheyenne, WY ',
				'code' => 'CYS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			134 => 
			array (
				'id' => 635,
				'address_id' => NULL,
				'name' => 'Chi Mei, Taiwan ',
				'code' => 'CMJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			135 => 
			array (
				'id' => 636,
				'address_id' => NULL,
				'name' => 'Chiang Mai, Thailand ',
				'code' => 'CNX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			136 => 
			array (
				'id' => 637,
				'address_id' => NULL,
				'name' => 'Chiang Rai, Thailand ',
				'code' => 'CEI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			137 => 
			array (
				'id' => 638,
				'address_id' => NULL,
				'name' => 'Chiayi, Taiwan ',
				'code' => 'CYI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			138 => 
			array (
				'id' => 639,
				'address_id' => NULL,
				'name' => 'Chibougamau, QC ',
				'code' => 'YMT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			139 => 
			array (
				'id' => 640,
				'address_id' => NULL,
				'name' => 'Chicago, IL - All airports ',
				'code' => 'CHI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			140 => 
			array (
				'id' => 641,
				'address_id' => NULL,
				'name' => 'Chicago, IL - Midway ',
				'code' => 'MDW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			141 => 
			array (
				'id' => 642,
				'address_id' => NULL,
				'name' => 'Chicago, IL - O\'Hare ',
				'code' => 'ORD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			142 => 
			array (
				'id' => 643,
				'address_id' => NULL,
				'name' => 'Chicayo, Peru ',
				'code' => 'CIX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			143 => 
			array (
				'id' => 644,
				'address_id' => NULL,
				'name' => 'Chicken, AK ',
				'code' => 'CKX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			144 => 
			array (
				'id' => 645,
				'address_id' => NULL,
				'name' => 'Chico, CA ',
				'code' => 'CIC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			145 => 
			array (
				'id' => 646,
				'address_id' => NULL,
				'name' => 'Chifeng, China ',
				'code' => 'CIF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			146 => 
			array (
				'id' => 647,
				'address_id' => NULL,
				'name' => 'Chignik, AK - ',
				'code' => 'KCQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			147 => 
			array (
				'id' => 648,
				'address_id' => NULL,
				'name' => 'Chignik, AK - Fisheries ',
				'code' => 'KCG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			148 => 
			array (
				'id' => 649,
				'address_id' => NULL,
				'name' => 'Chignik, AK - Lagoon ',
				'code' => 'KCL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			149 => 
			array (
				'id' => 650,
				'address_id' => NULL,
				'name' => 'Chihuahua, Mexico ',
				'code' => 'CUU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			150 => 
			array (
				'id' => 651,
				'address_id' => NULL,
				'name' => 'Chillan, Chile ',
				'code' => 'YAI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			151 => 
			array (
				'id' => 652,
				'address_id' => NULL,
				'name' => 'Chipata, Zambia ',
				'code' => 'CIP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			152 => 
			array (
				'id' => 653,
				'address_id' => NULL,
				'name' => 'Chisana, AK ',
				'code' => 'CZN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			153 => 
			array (
				'id' => 654,
				'address_id' => NULL,
				'name' => 'Chisasibi, QC ',
				'code' => 'YKU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			154 => 
			array (
				'id' => 655,
				'address_id' => NULL,
				'name' => 'Chisholm/Hibbing, MN ',
				'code' => 'HIB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			155 => 
			array (
				'id' => 656,
				'address_id' => NULL,
				'name' => 'Chisinau, Republic of Moldova ',
				'code' => 'KIV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			156 => 
			array (
				'id' => 657,
				'address_id' => NULL,
				'name' => 'Chita, Russia ',
				'code' => 'HTA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			157 => 
			array (
				'id' => 658,
				'address_id' => NULL,
				'name' => 'Chitral, Pakistan ',
				'code' => 'CJL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			158 => 
			array (
				'id' => 659,
				'address_id' => NULL,
				'name' => 'Chitre, Panama ',
				'code' => 'CTD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			159 => 
			array (
				'id' => 660,
				'address_id' => NULL,
				'name' => 'Chittagong, Bangladesh ',
				'code' => 'CGP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			160 => 
			array (
				'id' => 661,
				'address_id' => NULL,
				'name' => 'Choiseul Bay, Solomon Islands ',
				'code' => 'CHY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			161 => 
			array (
				'id' => 662,
				'address_id' => NULL,
				'name' => 'Chongqing, China ',
				'code' => 'CKG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			162 => 
			array (
				'id' => 663,
				'address_id' => NULL,
				'name' => 'Christchurch, New Zealand ',
				'code' => 'CHC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			163 => 
			array (
				'id' => 664,
				'address_id' => NULL,
				'name' => 'Christmas Island, Christmas Island ',
				'code' => 'XCH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			164 => 
			array (
				'id' => 665,
				'address_id' => NULL,
				'name' => 'Chuathbaluk, AK ',
				'code' => 'CHU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			165 => 
			array (
				'id' => 666,
				'address_id' => NULL,
				'name' => 'Churchill Falls, NL ',
				'code' => 'ZUM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			166 => 
			array (
				'id' => 667,
				'address_id' => NULL,
				'name' => 'Churchill, MB ',
				'code' => 'YYQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			167 => 
			array (
				'id' => 668,
				'address_id' => NULL,
				'name' => 'Churchill, MB - Rail service ',
				'code' => 'XAD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			168 => 
			array (
				'id' => 669,
				'address_id' => NULL,
				'name' => 'Cicia, Fiji ',
				'code' => 'ICI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			169 => 
			array (
				'id' => 670,
				'address_id' => NULL,
				'name' => 'Ciego De Avila, Cuba ',
				'code' => 'AVI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			170 => 
			array (
				'id' => 671,
				'address_id' => NULL,
				'name' => 'Cincinnati, OH ',
				'code' => 'CVG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			171 => 
			array (
				'id' => 672,
				'address_id' => NULL,
				'name' => 'Circle Hot Springs, AK ',
				'code' => 'CHP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			172 => 
			array (
				'id' => 673,
				'address_id' => NULL,
				'name' => 'Circle, AK ',
				'code' => 'IRC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			173 => 
			array (
				'id' => 674,
				'address_id' => NULL,
				'name' => 'Ciudad Bolivar, Venezuela ',
				'code' => 'CBL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			174 => 
			array (
				'id' => 675,
				'address_id' => NULL,
				'name' => 'Ciudad Del Carmen, Mexico ',
				'code' => 'CME',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			175 => 
			array (
				'id' => 676,
				'address_id' => NULL,
				'name' => 'Ciudad del Este, Paraguay ',
				'code' => 'AGT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			176 => 
			array (
				'id' => 677,
				'address_id' => NULL,
				'name' => 'Ciudad Juarez, Mexico ',
				'code' => 'CJS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			177 => 
			array (
				'id' => 678,
				'address_id' => NULL,
				'name' => 'Ciudad Obregon, Mexico ',
				'code' => 'CEN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			178 => 
			array (
				'id' => 679,
				'address_id' => NULL,
				'name' => 'Ciudad Victoria, Mexico ',
				'code' => 'CVM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			179 => 
			array (
				'id' => 680,
				'address_id' => NULL,
				'name' => 'Clarks Point, AK ',
				'code' => 'CLP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			180 => 
			array (
				'id' => 681,
				'address_id' => NULL,
				'name' => 'Clarksburg, WV ',
				'code' => 'CKB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			181 => 
			array (
				'id' => 682,
				'address_id' => NULL,
				'name' => 'Clearwater/St Petersburg, FL ',
				'code' => 'PIE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			182 => 
			array (
				'id' => 683,
				'address_id' => NULL,
				'name' => 'Clermont-ferrand, France ',
				'code' => 'CFE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			183 => 
			array (
				'id' => 684,
				'address_id' => NULL,
				'name' => 'Cleve, Australia ',
				'code' => 'CVC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			184 => 
			array (
				'id' => 685,
				'address_id' => NULL,
				'name' => 'Cleveland, OH ',
				'code' => 'CLE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			185 => 
			array (
				'id' => 686,
				'address_id' => NULL,
				'name' => 'Cloncurry, Australia ',
				'code' => 'CNJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			186 => 
			array (
				'id' => 687,
				'address_id' => NULL,
				'name' => 'Clovis, NM ',
				'code' => 'CVN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			187 => 
			array (
				'id' => 688,
				'address_id' => NULL,
				'name' => 'Club Makokola, Malawi ',
				'code' => 'CMK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			188 => 
			array (
				'id' => 689,
				'address_id' => NULL,
				'name' => 'Cluj, Romania ',
				'code' => 'CLJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			189 => 
			array (
				'id' => 690,
				'address_id' => NULL,
				'name' => 'Clyde River, NU ',
				'code' => 'YCY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			190 => 
			array (
				'id' => 691,
				'address_id' => NULL,
				'name' => 'Cobar, Australia ',
				'code' => 'CAZ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			191 => 
			array (
				'id' => 692,
				'address_id' => NULL,
				'name' => 'Cobija, Bolivia ',
				'code' => 'CIJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			192 => 
			array (
				'id' => 693,
				'address_id' => NULL,
				'name' => 'Cobourg, ON - Rail service ',
				'code' => 'XGJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			193 => 
			array (
				'id' => 694,
				'address_id' => NULL,
				'name' => 'Cochabamba, Bolivia ',
				'code' => 'CBB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			194 => 
			array (
				'id' => 695,
				'address_id' => NULL,
				'name' => 'Cochin, India ',
				'code' => 'COK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			195 => 
			array (
				'id' => 696,
				'address_id' => NULL,
				'name' => 'Coconut Island, Australia ',
				'code' => 'CNC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			196 => 
			array (
				'id' => 697,
				'address_id' => NULL,
				'name' => 'Cocos Islands, Cocos ',
				'code' => 'Keel',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			197 => 
			array (
				'id' => 698,
				'address_id' => NULL,
				'name' => 'Cody/Yellowstone, WY ',
				'code' => 'COD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			198 => 
			array (
				'id' => 699,
				'address_id' => NULL,
				'name' => 'Coen, Australia ',
				'code' => 'CUQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			199 => 
			array (
				'id' => 700,
				'address_id' => NULL,
				'name' => 'Coffee Point, AK ',
				'code' => 'CFA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			200 => 
			array (
				'id' => 701,
				'address_id' => NULL,
				'name' => 'Coffman Cove, AK ',
				'code' => 'KCC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			201 => 
			array (
				'id' => 702,
				'address_id' => NULL,
				'name' => 'Coffs Harbor, Australia ',
				'code' => 'CFS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			202 => 
			array (
				'id' => 703,
				'address_id' => NULL,
				'name' => 'Coimbatore, India ',
				'code' => 'CJB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			203 => 
			array (
				'id' => 704,
				'address_id' => NULL,
				'name' => 'Cold Bay, AK ',
				'code' => 'CDB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			204 => 
			array (
				'id' => 705,
				'address_id' => NULL,
				'name' => 'Colima, Mexico ',
				'code' => 'CLQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			205 => 
			array (
				'id' => 706,
				'address_id' => NULL,
				'name' => 'College Station, TX ',
				'code' => 'CLL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			206 => 
			array (
				'id' => 707,
				'address_id' => NULL,
				'name' => 'Cologne, Germany - Cologne/Bonn ',
				'code' => 'CGN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			207 => 
			array (
				'id' => 708,
				'address_id' => NULL,
				'name' => 'Cologne, Germany - Rail service ',
				'code' => 'QKL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			208 => 
			array (
				'id' => 709,
				'address_id' => NULL,
				'name' => 'Colombo, Sri Lanka ',
				'code' => 'CMB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			209 => 
			array (
				'id' => 710,
				'address_id' => NULL,
				'name' => 'Colon, Panama ',
				'code' => 'ONX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			210 => 
			array (
				'id' => 711,
				'address_id' => NULL,
				'name' => 'Colorado Springs, CO ',
				'code' => 'COS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			211 => 
			array (
				'id' => 712,
				'address_id' => NULL,
				'name' => 'Columbia, MO ',
				'code' => 'COU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			212 => 
			array (
				'id' => 713,
				'address_id' => NULL,
				'name' => 'Columbia, SC ',
				'code' => 'CAE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			213 => 
			array (
				'id' => 714,
				'address_id' => NULL,
				'name' => 'Columbus, GA ',
				'code' => 'CSG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			214 => 
			array (
				'id' => 715,
				'address_id' => NULL,
				'name' => 'Columbus, MS ',
				'code' => 'GTR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			215 => 
			array (
				'id' => 716,
				'address_id' => NULL,
				'name' => 'Columbus, OH ',
				'code' => 'CMH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			216 => 
			array (
				'id' => 717,
				'address_id' => NULL,
				'name' => 'Colville Lake, NT ',
				'code' => 'YCK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			217 => 
			array (
				'id' => 718,
				'address_id' => NULL,
				'name' => 'Comox, BC ',
				'code' => 'YQQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			218 => 
			array (
				'id' => 719,
				'address_id' => NULL,
				'name' => 'Conakry, Guinea ',
				'code' => 'CKY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			219 => 
			array (
				'id' => 720,
				'address_id' => NULL,
				'name' => 'Concepcion, Chile ',
				'code' => 'CCP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			220 => 
			array (
				'id' => 721,
				'address_id' => NULL,
				'name' => 'Concord, CA ',
				'code' => 'CCR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			221 => 
			array (
				'id' => 722,
				'address_id' => NULL,
				'name' => 'Concordia, Argentina ',
				'code' => 'COC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			222 => 
			array (
				'id' => 723,
				'address_id' => NULL,
				'name' => 'Concordia, KS ',
				'code' => 'CNK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			223 => 
			array (
				'id' => 724,
				'address_id' => NULL,
				'name' => 'Condoto, Colombia ',
				'code' => 'COG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			224 => 
			array (
				'id' => 725,
				'address_id' => NULL,
				'name' => 'Constanta, Romania ',
				'code' => 'CND',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			225 => 
			array (
				'id' => 726,
				'address_id' => NULL,
				'name' => 'Constantine, Algeria ',
				'code' => 'CZL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			226 => 
			array (
				'id' => 727,
				'address_id' => NULL,
				'name' => 'Contadora, Panama ',
				'code' => 'OTD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			227 => 
			array (
				'id' => 728,
				'address_id' => NULL,
				'name' => 'Coober Pedy, Australia ',
				'code' => 'CPD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			228 => 
			array (
				'id' => 729,
				'address_id' => NULL,
				'name' => 'Cooktown, Australia ',
				'code' => 'CTN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			229 => 
			array (
				'id' => 730,
				'address_id' => NULL,
				'name' => 'Cooma, NS, Australia ',
				'code' => 'OOM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			230 => 
			array (
				'id' => 731,
				'address_id' => NULL,
				'name' => 'Coonamble, Australia ',
				'code' => 'CNB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			231 => 
			array (
				'id' => 732,
				'address_id' => NULL,
				'name' => 'Copenhagen, Denmark ',
				'code' => 'CPH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			232 => 
			array (
				'id' => 733,
				'address_id' => NULL,
				'name' => 'Copiapo, Chile ',
				'code' => 'CPO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			233 => 
			array (
				'id' => 734,
				'address_id' => NULL,
				'name' => 'Copper Mountain, CO - Van service ',
				'code' => 'QCE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			234 => 
			array (
				'id' => 735,
				'address_id' => NULL,
				'name' => 'Coral Harbour, NU ',
				'code' => 'YZS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			235 => 
			array (
				'id' => 736,
				'address_id' => NULL,
				'name' => 'Cordoba, Argentina ',
				'code' => 'COR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			236 => 
			array (
				'id' => 737,
				'address_id' => NULL,
				'name' => 'Cordova, AK ',
				'code' => 'CDV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			237 => 
			array (
				'id' => 738,
				'address_id' => NULL,
				'name' => 'Cork, Ireland ',
				'code' => 'ORK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			238 => 
			array (
				'id' => 739,
				'address_id' => NULL,
				'name' => 'Cornwall, ON ',
				'code' => 'YCC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			239 => 
			array (
				'id' => 740,
				'address_id' => NULL,
				'name' => 'Coro, Venezuela ',
				'code' => 'CZE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			240 => 
			array (
				'id' => 741,
				'address_id' => NULL,
				'name' => 'Corozal, Belize ',
				'code' => 'CZH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			241 => 
			array (
				'id' => 742,
				'address_id' => NULL,
				'name' => 'Corpus Christi, TX ',
				'code' => 'CRP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			242 => 
			array (
				'id' => 743,
				'address_id' => NULL,
				'name' => 'Corrientes, Argentina ',
				'code' => 'CNQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			243 => 
			array (
				'id' => 744,
				'address_id' => NULL,
				'name' => 'Cortez, CO ',
				'code' => 'CEZ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			244 => 
			array (
				'id' => 745,
				'address_id' => NULL,
				'name' => 'Corumba, Brazil ',
				'code' => 'CMG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			245 => 
			array (
				'id' => 746,
				'address_id' => NULL,
				'name' => 'Corvo Island, Portugal ',
				'code' => 'CVU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			246 => 
			array (
				'id' => 747,
				'address_id' => NULL,
				'name' => 'Cotabato, Philippines ',
				'code' => 'CBO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			247 => 
			array (
				'id' => 748,
				'address_id' => NULL,
				'name' => 'Cotarou, Benin ',
				'code' => 'COC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			248 => 
			array (
				'id' => 749,
				'address_id' => NULL,
				'name' => 'Coteau, QC - Rail service ',
				'code' => 'XGK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			249 => 
			array (
				'id' => 750,
				'address_id' => NULL,
				'name' => 'Courtenay, BC ',
				'code' => 'YCA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			250 => 
			array (
				'id' => 751,
				'address_id' => NULL,
				'name' => 'Cox\'s Bazar, Bangladesh ',
				'code' => 'CXB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			251 => 
			array (
				'id' => 752,
				'address_id' => NULL,
				'name' => 'Cozumel, Mexico ',
				'code' => 'CZM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			252 => 
			array (
				'id' => 753,
				'address_id' => NULL,
				'name' => 'Craig Cove, Vanuatu ',
				'code' => 'CCV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			253 => 
			array (
				'id' => 754,
				'address_id' => NULL,
				'name' => 'Craig, AK ',
				'code' => 'CGA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			254 => 
			array (
				'id' => 755,
				'address_id' => NULL,
				'name' => 'Cranbrook, BC ',
				'code' => 'YXC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			255 => 
			array (
				'id' => 756,
				'address_id' => NULL,
				'name' => 'Crescent City, CA ',
				'code' => 'CEC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			256 => 
			array (
				'id' => 757,
				'address_id' => NULL,
				'name' => 'Criciuma, Brazil ',
				'code' => 'CCM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			257 => 
			array (
				'id' => 758,
				'address_id' => NULL,
				'name' => 'Croker Island, Australia ',
				'code' => 'CKI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			258 => 
			array (
				'id' => 759,
				'address_id' => NULL,
				'name' => 'Crooked Creek, AK ',
				'code' => 'CKO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			259 => 
			array (
				'id' => 760,
				'address_id' => NULL,
				'name' => 'Crooked Island, Bahamas ',
				'code' => 'CRI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			260 => 
			array (
				'id' => 761,
				'address_id' => NULL,
				'name' => 'Cross Lake, MB ',
				'code' => 'YCR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			261 => 
			array (
				'id' => 762,
				'address_id' => NULL,
				'name' => 'Crotone, Italy ',
				'code' => 'CRV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			262 => 
			array (
				'id' => 763,
				'address_id' => NULL,
				'name' => 'Cruzeiro Do Sul, Brazil ',
				'code' => 'CZS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			263 => 
			array (
				'id' => 764,
				'address_id' => NULL,
				'name' => 'Cube Cove, AK ',
				'code' => 'CUW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			264 => 
			array (
				'id' => 765,
				'address_id' => NULL,
				'name' => 'Cucata, Colombia ',
				'code' => 'CUC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			265 => 
			array (
				'id' => 766,
				'address_id' => NULL,
				'name' => 'Cuenca, Ecuador ',
				'code' => 'CUE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			266 => 
			array (
				'id' => 767,
				'address_id' => NULL,
				'name' => 'Cuernavaca, Mexico ',
				'code' => 'CVJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			267 => 
			array (
				'id' => 768,
				'address_id' => NULL,
				'name' => 'Cuiaba, Brazil ',
				'code' => 'CGB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			268 => 
			array (
				'id' => 769,
				'address_id' => NULL,
				'name' => 'Culiacan, Mexico ',
				'code' => 'CUL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			269 => 
			array (
				'id' => 770,
				'address_id' => NULL,
				'name' => 'Cumana, Venezuela ',
				'code' => 'CUM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			270 => 
			array (
				'id' => 771,
				'address_id' => NULL,
				'name' => 'Cumberland, MD ',
				'code' => 'CBE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			271 => 
			array (
				'id' => 772,
				'address_id' => NULL,
				'name' => 'Cunnamulla, Australia ',
				'code' => 'CMA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			272 => 
			array (
				'id' => 773,
				'address_id' => NULL,
				'name' => 'Curacao, Netherlands Antilles ',
				'code' => 'CUR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			273 => 
			array (
				'id' => 774,
				'address_id' => NULL,
				'name' => 'Curitiba, Brazil ',
				'code' => 'CWB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			274 => 
			array (
				'id' => 775,
				'address_id' => NULL,
				'name' => 'Cuzco, Peru ',
				'code' => 'CUZ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			275 => 
			array (
				'id' => 776,
				'address_id' => NULL,
				'name' => 'Da Nang, Viet Nam ',
				'code' => 'DAD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			276 => 
			array (
				'id' => 777,
				'address_id' => NULL,
				'name' => 'Dabra, Indonesia ',
				'code' => 'DRH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			277 => 
			array (
				'id' => 778,
				'address_id' => NULL,
				'name' => 'Daegu, South Korea ',
				'code' => 'TAE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			278 => 
			array (
				'id' => 779,
				'address_id' => NULL,
				'name' => 'Dakar, Senegal ',
				'code' => 'DKR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			279 => 
			array (
				'id' => 780,
				'address_id' => NULL,
				'name' => 'Dakhla, Morocco ',
				'code' => 'VIL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			280 => 
			array (
				'id' => 781,
				'address_id' => NULL,
				'name' => 'Dalaman, Turkey ',
				'code' => 'DLM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			281 => 
			array (
				'id' => 782,
				'address_id' => NULL,
			'name' => 'Dalat, Viet Nam - Lienkhang DLI)',
			'code' => '',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		282 => 
		array (
			'id' => 783,
			'address_id' => NULL,
			'name' => 'Dali City, China ',
			'code' => 'DLU',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		283 => 
		array (
			'id' => 784,
			'address_id' => NULL,
			'name' => 'Dalian, China ',
			'code' => 'DLC',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		284 => 
		array (
			'id' => 785,
			'address_id' => NULL,
			'name' => 'Dallas, TX - Dallas/Ft Worth Intl. ',
			'code' => 'DFW',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		285 => 
		array (
			'id' => 786,
			'address_id' => NULL,
			'name' => 'Dallas, TX - Love Field ',
			'code' => 'DAL',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		286 => 
		array (
			'id' => 787,
			'address_id' => NULL,
			'name' => 'Damascus, Syrian Arab Republic ',
			'code' => 'DAM',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		287 => 
		array (
			'id' => 788,
			'address_id' => NULL,
			'name' => 'Dammam, Saudi Arabia ',
			'code' => 'DMM',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		288 => 
		array (
			'id' => 789,
			'address_id' => NULL,
			'name' => 'Dangriga, Belize ',
			'code' => 'DGA',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		289 => 
		array (
			'id' => 790,
			'address_id' => NULL,
			'name' => 'Dar Es Salaam, Tanzania ',
			'code' => 'DAR',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		290 => 
		array (
			'id' => 791,
			'address_id' => NULL,
			'name' => 'Darnley Island, QL, Australia ',
			'code' => 'NLF',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		291 => 
		array (
			'id' => 792,
			'address_id' => NULL,
			'name' => 'Daru, Papua New Guinea ',
			'code' => 'DAU',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		292 => 
		array (
			'id' => 793,
			'address_id' => NULL,
			'name' => 'Darwin, Northern Territory, Australia ',
			'code' => 'DRW',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		293 => 
		array (
			'id' => 794,
			'address_id' => NULL,
			'name' => 'Datadawai, Indonesia ',
			'code' => 'DTD',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		294 => 
		array (
			'id' => 795,
			'address_id' => NULL,
			'name' => 'Dauphin, MB ',
			'code' => 'YDN',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		295 => 
		array (
			'id' => 796,
			'address_id' => NULL,
			'name' => 'Davao, Philipines - Mati ',
			'code' => 'DVO',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		296 => 
		array (
			'id' => 797,
			'address_id' => NULL,
			'name' => 'David, Panama ',
			'code' => 'DAV',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		297 => 
		array (
			'id' => 798,
			'address_id' => NULL,
			'name' => 'Davis Inlet, NL ',
			'code' => 'YDI',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		298 => 
		array (
			'id' => 799,
			'address_id' => NULL,
			'name' => 'Dawe, Myanmar ',
			'code' => 'TVY',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		299 => 
		array (
			'id' => 800,
			'address_id' => NULL,
			'name' => 'Dawson City, YT ',
			'code' => 'YDA',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		300 => 
		array (
			'id' => 801,
			'address_id' => NULL,
			'name' => 'Dawson Creek, BC ',
			'code' => 'YDQ',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		301 => 
		array (
			'id' => 802,
			'address_id' => NULL,
			'name' => 'Daxian, China ',
			'code' => 'DAX',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		302 => 
		array (
			'id' => 803,
			'address_id' => NULL,
			'name' => 'Dayang, China ',
			'code' => 'DYG',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		303 => 
		array (
			'id' => 804,
			'address_id' => NULL,
			'name' => 'Daydream Is, Australia ',
			'code' => 'DDI',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		304 => 
		array (
			'id' => 805,
			'address_id' => NULL,
			'name' => 'Dayton, OH ',
			'code' => 'DAY',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		305 => 
		array (
			'id' => 806,
			'address_id' => NULL,
			'name' => 'Daytona Beach, FL ',
			'code' => 'DAB',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		306 => 
		array (
			'id' => 807,
			'address_id' => NULL,
			'name' => 'Deauville, France ',
			'code' => 'DOL',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		307 => 
		array (
			'id' => 808,
			'address_id' => NULL,
			'name' => 'Debra Marcos, Ethiopia ',
			'code' => 'DBM',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		308 => 
		array (
			'id' => 809,
			'address_id' => NULL,
			'name' => 'Debra Tabor, Ethiopia ',
			'code' => 'DBT',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		309 => 
		array (
			'id' => 810,
			'address_id' => NULL,
			'name' => 'Decatur, IL ',
			'code' => 'DEC',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		310 => 
		array (
			'id' => 811,
			'address_id' => NULL,
			'name' => 'Deer Lake, NL ',
			'code' => 'YDF',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		311 => 
		array (
			'id' => 812,
			'address_id' => NULL,
			'name' => 'Deer Lake, ON ',
			'code' => 'YVZ',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		312 => 
		array (
			'id' => 813,
			'address_id' => NULL,
			'name' => 'Deering, AK ',
			'code' => 'DRG',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		313 => 
		array (
			'id' => 814,
			'address_id' => NULL,
			'name' => 'Deirezzor, Syria - Al Jafrah ',
			'code' => 'DEZ',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		314 => 
		array (
			'id' => 815,
			'address_id' => NULL,
			'name' => 'Del Reo, TX ',
			'code' => 'DRT',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		315 => 
		array (
			'id' => 816,
			'address_id' => NULL,
			'name' => 'Delhi, India ',
			'code' => 'DEL',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		316 => 
		array (
			'id' => 817,
			'address_id' => NULL,
			'name' => 'Deline, NT ',
			'code' => 'YWJ',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		317 => 
		array (
			'id' => 818,
			'address_id' => NULL,
			'name' => 'Delta Junction, AK ',
			'code' => 'DJN',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		318 => 
		array (
			'id' => 819,
			'address_id' => NULL,
			'name' => 'Dembidollo, Ethiopia ',
			'code' => 'DEM',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		319 => 
		array (
			'id' => 820,
			'address_id' => NULL,
			'name' => 'Denham, Australia ',
			'code' => 'DNM',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		320 => 
		array (
			'id' => 821,
			'address_id' => NULL,
			'name' => 'Denizli, Turkey ',
			'code' => 'DNZ',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		321 => 
		array (
			'id' => 822,
			'address_id' => NULL,
			'name' => 'Denpasar Bali, Indonesia ',
			'code' => 'DPS',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		322 => 
		array (
			'id' => 823,
			'address_id' => NULL,
			'name' => 'Denver, CO - International ',
			'code' => 'DEN',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		323 => 
		array (
			'id' => 824,
			'address_id' => NULL,
			'name' => 'Denver, CO - Longmont Bus service ',
			'code' => 'QWM',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		324 => 
		array (
			'id' => 825,
			'address_id' => NULL,
			'name' => 'Dera Ghazi, Pakistan ',
			'code' => 'DEA',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		325 => 
		array (
			'id' => 826,
			'address_id' => NULL,
			'name' => 'Dera Ismail Khan, Pakistan ',
			'code' => 'DSK',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		326 => 
		array (
			'id' => 827,
			'address_id' => NULL,
			'name' => 'Derby, Australia ',
			'code' => 'DRB',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		327 => 
		array (
			'id' => 828,
			'address_id' => NULL,
			'name' => 'Derim, Papua New Guinea ',
			'code' => 'DER',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		328 => 
		array (
			'id' => 829,
			'address_id' => NULL,
			'name' => 'Des Moines, IA ',
			'code' => 'DSM',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		329 => 
		array (
			'id' => 830,
			'address_id' => NULL,
			'name' => 'Dessie, Ethiopia ',
			'code' => 'DSE',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		330 => 
		array (
			'id' => 831,
			'address_id' => NULL,
			'name' => 'Detroit, MI - All airports ',
			'code' => 'DTT',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		331 => 
		array (
			'id' => 832,
			'address_id' => NULL,
			'name' => 'Detroit, MI - Metro/Wayne County ',
			'code' => 'DTW',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		332 => 
		array (
			'id' => 833,
			'address_id' => NULL,
			'name' => 'Devil\'s Lake, ND ',
			'code' => 'DVL',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		333 => 
		array (
			'id' => 834,
			'address_id' => NULL,
			'name' => 'Devonport, Australia ',
			'code' => 'DPO',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		334 => 
		array (
			'id' => 835,
			'address_id' => NULL,
			'name' => 'Dhaka, Bangledesh - Zia International ',
			'code' => 'DAC',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		335 => 
		array (
			'id' => 836,
			'address_id' => NULL,
			'name' => 'Dibrugarn, India ',
			'code' => 'DIB',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		336 => 
		array (
			'id' => 837,
			'address_id' => NULL,
			'name' => 'Dickinson, ND ',
			'code' => 'DIK',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		337 => 
		array (
			'id' => 838,
			'address_id' => NULL,
			'name' => 'Dien Bien Phu, Viet Nam - Gialam ',
			'code' => 'DIN',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		338 => 
		array (
			'id' => 839,
			'address_id' => NULL,
			'name' => 'Dijon, France ',
			'code' => 'DIJ',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		339 => 
		array (
			'id' => 840,
			'address_id' => NULL,
			'name' => 'Dili, Indonesia ',
			'code' => 'DIL',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		340 => 
		array (
			'id' => 841,
			'address_id' => NULL,
			'name' => 'Dillingham, AK ',
			'code' => 'DLG',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		341 => 
		array (
			'id' => 842,
			'address_id' => NULL,
			'name' => 'Dillons Bay, Vanuata ',
			'code' => 'DLY',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		342 => 
		array (
			'id' => 843,
			'address_id' => NULL,
			'name' => 'Dimapur, India ',
			'code' => 'DMU',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		343 => 
		array (
			'id' => 844,
			'address_id' => NULL,
			'name' => 'Dinard, France ',
			'code' => 'DNR',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		344 => 
		array (
			'id' => 845,
			'address_id' => NULL,
			'name' => 'Dipolog, Philippines ',
			'code' => 'DPL',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		345 => 
		array (
			'id' => 846,
			'address_id' => NULL,
			'name' => 'Dire Dawa, Ethiopia ',
			'code' => 'DIR',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		346 => 
		array (
			'id' => 847,
			'address_id' => NULL,
			'name' => 'Div, India ',
			'code' => 'DIU',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		347 => 
		array (
			'id' => 848,
			'address_id' => NULL,
			'name' => 'Diyarbakir, Turkey ',
			'code' => 'DIY',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		348 => 
		array (
			'id' => 849,
			'address_id' => NULL,
			'name' => 'Djanet, Algeria ',
			'code' => 'DJG',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		349 => 
		array (
			'id' => 850,
			'address_id' => NULL,
			'name' => 'Djerba, Tunisia ',
			'code' => 'DJE',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		350 => 
		array (
			'id' => 851,
			'address_id' => NULL,
			'name' => 'Djibouti, Djibouti ',
			'code' => 'JIB',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		351 => 
		array (
			'id' => 852,
			'address_id' => NULL,
			'name' => 'Dnepropetrovsk, Ukraine ',
			'code' => 'DNK',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		352 => 
		array (
			'id' => 853,
			'address_id' => NULL,
			'name' => 'Dobo, Indonesia ',
			'code' => 'DOB',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		353 => 
		array (
			'id' => 854,
			'address_id' => NULL,
			'name' => 'Dodge City, KS ',
			'code' => 'DDC',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		354 => 
		array (
			'id' => 855,
			'address_id' => NULL,
			'name' => 'Dodoima, Papua New Guinea ',
			'code' => 'DDM',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		355 => 
		array (
			'id' => 856,
			'address_id' => NULL,
			'name' => 'Dodoma, Tanzania ',
			'code' => 'DOD',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		356 => 
		array (
			'id' => 857,
			'address_id' => NULL,
			'name' => 'Doha, Qatar ',
			'code' => 'DOH',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		357 => 
		array (
			'id' => 858,
			'address_id' => NULL,
			'name' => 'Dominica, Dominica - Cane Field ',
			'code' => 'DCF',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		358 => 
		array (
			'id' => 859,
			'address_id' => NULL,
			'name' => 'Dominica, Dominica - Melville Hall ',
			'code' => 'DOM',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		359 => 
		array (
			'id' => 860,
			'address_id' => NULL,
			'name' => 'Donegal, Ireland ',
			'code' => 'CFN',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		360 => 
		array (
			'id' => 861,
			'address_id' => NULL,
			'name' => 'Donetsk, Ukraine ',
			'code' => 'DOK',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		361 => 
		array (
			'id' => 862,
			'address_id' => NULL,
			'name' => 'Dongola, Sudan ',
			'code' => 'DOG',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		362 => 
		array (
			'id' => 863,
			'address_id' => NULL,
			'name' => 'Doomadgee, Australia ',
			'code' => 'DMD',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		363 => 
		array (
			'id' => 864,
			'address_id' => NULL,
			'name' => 'Dortmund, Germany ',
			'code' => 'DTM',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		364 => 
		array (
			'id' => 865,
			'address_id' => NULL,
			'name' => 'Dothan, AL ',
			'code' => 'DHN',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		365 => 
		array (
			'id' => 866,
			'address_id' => NULL,
			'name' => 'Dourados, Brazil ',
			'code' => 'DOU',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		366 => 
		array (
			'id' => 867,
			'address_id' => NULL,
			'name' => 'Dovala, Cameroon ',
			'code' => 'DLA',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		367 => 
		array (
			'id' => 868,
			'address_id' => NULL,
			'name' => 'Dresden, Germany ',
			'code' => 'DRS',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		368 => 
		array (
			'id' => 869,
			'address_id' => NULL,
			'name' => 'Drummondville, QC - Rail service ',
			'code' => 'XDM',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		369 => 
		array (
			'id' => 870,
			'address_id' => NULL,
			'name' => 'Dryden, ON ',
			'code' => 'YHD',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		370 => 
		array (
			'id' => 871,
			'address_id' => NULL,
			'name' => 'Dubai, United Arab Emirates - Bus Station ',
			'code' => 'XNB',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		371 => 
		array (
			'id' => 872,
			'address_id' => NULL,
			'name' => 'Dubai, United Arab Emirates - International ',
			'code' => 'DXB',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		372 => 
		array (
			'id' => 873,
			'address_id' => NULL,
			'name' => 'Dubbo, Australia ',
			'code' => 'DBO',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		373 => 
		array (
			'id' => 874,
			'address_id' => NULL,
			'name' => 'Dublin, Ireland ',
			'code' => 'DUB',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		374 => 
		array (
			'id' => 875,
			'address_id' => NULL,
			'name' => 'Dubois, PA ',
			'code' => 'DUJ',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		375 => 
		array (
			'id' => 876,
			'address_id' => NULL,
			'name' => 'Dubrovnik, Croatia ',
			'code' => 'DBV',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		376 => 
		array (
			'id' => 877,
			'address_id' => NULL,
			'name' => 'Dubuque, IA ',
			'code' => 'DBQ',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		377 => 
		array (
			'id' => 878,
			'address_id' => NULL,
			'name' => 'Duluth, MN ',
			'code' => 'DLH',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		378 => 
		array (
			'id' => 879,
			'address_id' => NULL,
			'name' => 'Dumaguete, Philippines ',
			'code' => 'DGT',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		379 => 
		array (
			'id' => 880,
			'address_id' => NULL,
			'name' => 'Dumai, Indonesia ',
			'code' => 'DUM',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		380 => 
		array (
			'id' => 881,
			'address_id' => NULL,
			'name' => 'Duncan/Quam, BC ',
			'code' => 'DUQ',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		381 => 
		array (
			'id' => 882,
			'address_id' => NULL,
			'name' => 'Dundee, United Kingdom ',
			'code' => 'DND',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		382 => 
		array (
			'id' => 883,
			'address_id' => NULL,
			'name' => 'Dunedin, New Zealand ',
			'code' => 'DUD',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		383 => 
		array (
			'id' => 884,
			'address_id' => NULL,
			'name' => 'Dunhuang, China ',
			'code' => 'DNH',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		384 => 
		array (
			'id' => 885,
			'address_id' => NULL,
			'name' => 'Dunk Island, Australia ',
			'code' => 'DKI',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		385 => 
		array (
			'id' => 886,
			'address_id' => NULL,
			'name' => 'Durango, CO ',
			'code' => 'DRO',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		386 => 
		array (
			'id' => 887,
			'address_id' => NULL,
			'name' => 'Durango, Mexico ',
			'code' => 'DGO',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		387 => 
		array (
			'id' => 888,
			'address_id' => NULL,
			'name' => 'Durban, South Africa ',
			'code' => 'DUR',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		388 => 
		array (
			'id' => 889,
			'address_id' => NULL,
			'name' => 'Durham, NC ',
			'code' => 'RDU',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		389 => 
		array (
			'id' => 890,
			'address_id' => NULL,
			'name' => 'Durham/Raleigh, NC ',
			'code' => 'RDU',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		390 => 
		array (
			'id' => 891,
			'address_id' => NULL,
			'name' => 'Dushanbe, Tajikistan ',
			'code' => 'DYU',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		391 => 
		array (
			'id' => 892,
			'address_id' => NULL,
			'name' => 'Dusseldorf, Germany - International ',
			'code' => 'DUS',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		392 => 
		array (
			'id' => 893,
			'address_id' => NULL,
			'name' => 'Dusseldorf, Germany - Moenchen-Gl. ',
			'code' => 'MGL',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		393 => 
		array (
			'id' => 894,
			'address_id' => NULL,
			'name' => 'Dusseldorf, Germany - Rail service ',
			'code' => 'QDU',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		394 => 
		array (
			'id' => 895,
			'address_id' => NULL,
			'name' => 'Dutch Harbor, AK ',
			'code' => 'DUT',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		395 => 
		array (
			'id' => 896,
			'address_id' => NULL,
			'name' => 'Dzaoudzi, Mayotte ',
			'code' => 'DZA',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		396 => 
		array (
			'id' => 897,
			'address_id' => NULL,
			'name' => 'East London, South Africa ',
			'code' => 'ELS',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		397 => 
		array (
			'id' => 898,
			'address_id' => NULL,
			'name' => 'East Main, QC ',
			'code' => 'ZEM',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		398 => 
		array (
			'id' => 899,
			'address_id' => NULL,
			'name' => 'Easton, PA ',
			'code' => 'ABE',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		399 => 
		array (
			'id' => 900,
			'address_id' => NULL,
			'name' => 'Eau Claire, WI ',
			'code' => 'EAU',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		400 => 
		array (
			'id' => 901,
			'address_id' => NULL,
			'name' => 'Ebon, Marshall Islands ',
			'code' => 'EBO',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		401 => 
		array (
			'id' => 902,
			'address_id' => NULL,
			'name' => 'Eday, United Kingdom ',
			'code' => 'EOI',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		402 => 
		array (
			'id' => 903,
			'address_id' => NULL,
			'name' => 'Edinburgh, United Kingdom ',
			'code' => 'EDI',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		403 => 
		array (
			'id' => 904,
			'address_id' => NULL,
			'name' => 'Edmonton, AB - International ',
			'code' => 'YEG',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		404 => 
		array (
			'id' => 905,
			'address_id' => NULL,
			'name' => 'Edmonton, AB - Rail service ',
			'code' => 'XZL',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		405 => 
		array (
			'id' => 906,
			'address_id' => NULL,
			'name' => 'Edna Bay, AK ',
			'code' => 'EDA',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		406 => 
		array (
			'id' => 907,
			'address_id' => NULL,
			'name' => 'Edremit, Turkey ',
			'code' => 'EDO',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		407 => 
		array (
			'id' => 908,
			'address_id' => NULL,
			'name' => 'Edward River, Australia ',
			'code' => 'EDR',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		408 => 
		array (
			'id' => 909,
			'address_id' => NULL,
			'name' => 'Eek, AK ',
			'code' => 'EEK',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		409 => 
		array (
			'id' => 910,
			'address_id' => NULL,
			'name' => 'Egilsstadir, Iceland ',
			'code' => 'EGS',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		410 => 
		array (
			'id' => 911,
			'address_id' => NULL,
			'name' => 'Eindhoven, Netherlands ',
			'code' => 'EIN',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		411 => 
		array (
			'id' => 912,
			'address_id' => NULL,
			'name' => 'Eisenach, Germany ',
			'code' => 'EIB',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		412 => 
		array (
			'id' => 913,
			'address_id' => NULL,
			'name' => 'Ekaterinburg, Russia ',
			'code' => 'SVX',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		413 => 
		array (
			'id' => 914,
			'address_id' => NULL,
			'name' => 'Ekuk, AK ',
			'code' => 'KKU',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		414 => 
		array (
			'id' => 915,
			'address_id' => NULL,
			'name' => 'Ekwok, AK ',
			'code' => 'KEK',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		415 => 
		array (
			'id' => 916,
			'address_id' => NULL,
			'name' => 'El Bolsan, Argentina ',
			'code' => 'EHL',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		416 => 
		array (
			'id' => 917,
			'address_id' => NULL,
			'name' => 'El Centro, CA ',
			'code' => 'IPL',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		417 => 
		array (
			'id' => 918,
			'address_id' => NULL,
			'name' => 'El Dorado, AR ',
			'code' => 'ELD',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		418 => 
		array (
			'id' => 919,
			'address_id' => NULL,
			'name' => 'El Fasher, Sudan ',
			'code' => 'ELF',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		419 => 
		array (
			'id' => 920,
			'address_id' => NULL,
			'name' => 'El Maiten, Argentina ',
			'code' => 'EMX',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		420 => 
		array (
			'id' => 921,
			'address_id' => NULL,
			'name' => 'El Obeid, Sudan ',
			'code' => 'EBD',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		421 => 
		array (
			'id' => 922,
			'address_id' => NULL,
			'name' => 'El Oved, Algeria ',
			'code' => 'ELU',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		422 => 
		array (
			'id' => 923,
			'address_id' => NULL,
			'name' => 'El Paso, TX ',
			'code' => 'ELP',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		423 => 
		array (
			'id' => 924,
			'address_id' => NULL,
			'name' => 'El Portillo/Samana, Dominician Republic - El Portillo',
			'code' => 'EPS',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		424 => 
		array (
			'id' => 925,
			'address_id' => NULL,
			'name' => 'El Real, Panama ',
			'code' => 'ELE',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		425 => 
		array (
			'id' => 926,
			'address_id' => NULL,
			'name' => 'El Salvador, Chile ',
			'code' => 'ESR',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		426 => 
		array (
			'id' => 927,
			'address_id' => NULL,
			'name' => 'El Vigia, Venezuela ',
			'code' => 'VIG',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		427 => 
		array (
			'id' => 928,
			'address_id' => NULL,
			'name' => 'El Yopal, Colombia ',
			'code' => 'EYP',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		428 => 
		array (
			'id' => 929,
			'address_id' => NULL,
			'name' => 'Elat, Italy ',
			'code' => 'ETH',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		429 => 
		array (
			'id' => 930,
			'address_id' => NULL,
			'name' => 'Elazig, Turkey ',
			'code' => 'EZS',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		430 => 
		array (
			'id' => 931,
			'address_id' => NULL,
			'name' => 'Elba Island, Italy ',
			'code' => 'EBA',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		431 => 
		array (
			'id' => 932,
			'address_id' => NULL,
			'name' => 'Elcho Island, Australia ',
			'code' => 'ELC',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		432 => 
		array (
			'id' => 933,
			'address_id' => NULL,
			'name' => 'Eldoret, Kenya ',
			'code' => 'EDL',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		433 => 
		array (
			'id' => 934,
			'address_id' => NULL,
			'name' => 'Eleuthera Island, Bahamas ',
			'code' => 'ELH',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		434 => 
		array (
			'id' => 935,
			'address_id' => NULL,
			'name' => 'Elfin Cove, AK ',
			'code' => 'ELV',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		435 => 
		array (
			'id' => 936,
			'address_id' => NULL,
			'name' => 'Elim, AK ',
			'code' => 'ELI',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		436 => 
		array (
			'id' => 937,
			'address_id' => NULL,
			'name' => 'Elista, Russia ',
			'code' => 'ESL',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		437 => 
		array (
			'id' => 938,
			'address_id' => NULL,
			'name' => 'Elko, NV ',
			'code' => 'EKO',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		438 => 
		array (
			'id' => 939,
			'address_id' => NULL,
			'name' => 'Elmira, NY ',
			'code' => 'ELM',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		439 => 
		array (
			'id' => 940,
			'address_id' => NULL,
			'name' => 'Ely, MN ',
			'code' => 'LYU',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		440 => 
		array (
			'id' => 941,
			'address_id' => NULL,
			'name' => 'Emae, Vanuata ',
			'code' => 'EAE',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		441 => 
		array (
			'id' => 942,
			'address_id' => NULL,
			'name' => 'Embessa, Papua New Guinea ',
			'code' => 'EMS',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		442 => 
		array (
			'id' => 943,
			'address_id' => NULL,
			'name' => 'Emerald, Australia ',
			'code' => 'EMD',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		443 => 
		array (
			'id' => 944,
			'address_id' => NULL,
			'name' => 'Emmonak, AK ',
			'code' => 'EMK',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		444 => 
		array (
			'id' => 945,
			'address_id' => NULL,
			'name' => 'Emo, Papua New Guinea ',
			'code' => 'EMO',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		445 => 
		array (
			'id' => 946,
			'address_id' => NULL,
			'name' => 'Enarotali, Indonesia ',
			'code' => 'EWI',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		446 => 
		array (
			'id' => 947,
			'address_id' => NULL,
			'name' => 'Ende, Indonesia ',
			'code' => 'ENE',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		447 => 
		array (
			'id' => 948,
			'address_id' => NULL,
			'name' => 'Endicott, NY ',
			'code' => 'BGM',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		448 => 
		array (
			'id' => 949,
			'address_id' => NULL,
			'name' => 'Enewetak Island, Marshall Islands ',
			'code' => 'ENT',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		449 => 
		array (
			'id' => 950,
			'address_id' => NULL,
			'name' => 'Enid, OK ',
			'code' => 'WDG',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		450 => 
		array (
			'id' => 951,
			'address_id' => NULL,
			'name' => 'Enontekio, Finland ',
			'code' => 'ENF',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		451 => 
		array (
			'id' => 952,
			'address_id' => NULL,
			'name' => 'Enshi, China ',
			'code' => 'ENH',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		452 => 
		array (
			'id' => 953,
			'address_id' => NULL,
			'name' => 'Entebbe, Uganda ',
			'code' => 'EBB',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		453 => 
		array (
			'id' => 954,
			'address_id' => NULL,
			'name' => 'Enugu, Nigeria ',
			'code' => 'ENU',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		454 => 
		array (
			'id' => 955,
			'address_id' => NULL,
			'name' => 'Epinal, France ',
			'code' => 'EPL',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		455 => 
		array (
			'id' => 956,
			'address_id' => NULL,
			'name' => 'Ercan, Cyprus ',
			'code' => 'ECN',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		456 => 
		array (
			'id' => 957,
			'address_id' => NULL,
			'name' => 'Erfurt, Germany ',
			'code' => 'ERF',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		457 => 
		array (
			'id' => 958,
			'address_id' => NULL,
			'name' => 'Erie, PA ',
			'code' => 'ERI',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		458 => 
		array (
			'id' => 959,
			'address_id' => NULL,
			'name' => 'Erzincan, Turkey ',
			'code' => 'ERC',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		459 => 
		array (
			'id' => 960,
			'address_id' => NULL,
			'name' => 'Erzurum, Turkey ',
			'code' => 'ERZ',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		460 => 
		array (
			'id' => 961,
			'address_id' => NULL,
			'name' => 'Esbjerg, Denmark - Esbjerg Airport ',
			'code' => 'EBJ',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		461 => 
		array (
			'id' => 962,
			'address_id' => NULL,
			'name' => 'Esbjerg, Denmark - Rail service ',
			'code' => 'ZBB',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		462 => 
		array (
			'id' => 963,
			'address_id' => NULL,
			'name' => 'Escanaba, MI ',
			'code' => 'ESC',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		463 => 
		array (
			'id' => 964,
			'address_id' => NULL,
			'name' => 'Esmeraldas, Ecuador ',
			'code' => 'ESM',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		464 => 
		array (
			'id' => 965,
			'address_id' => NULL,
			'name' => 'Esperance, Australia ',
			'code' => 'EPR',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		465 => 
		array (
			'id' => 966,
			'address_id' => NULL,
			'name' => 'Espiritu Santo, Vanuatu ',
			'code' => 'SON',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		466 => 
		array (
			'id' => 967,
			'address_id' => NULL,
			'name' => 'Esquel, Argentina ',
			'code' => 'EQS',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		467 => 
		array (
			'id' => 968,
			'address_id' => NULL,
			'name' => 'Esquimalt, BC ',
			'code' => 'YPF',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		468 => 
		array (
			'id' => 969,
			'address_id' => NULL,
			'name' => 'Eugene, OR ',
			'code' => 'EUG',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		469 => 
		array (
			'id' => 970,
			'address_id' => NULL,
			'name' => 'Eureka, NV ',
			'code' => 'EUE',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		470 => 
		array (
			'id' => 971,
			'address_id' => NULL,
			'name' => 'Eureka/Arcata, CA ',
			'code' => 'ACV',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		471 => 
		array (
			'id' => 972,
			'address_id' => NULL,
			'name' => 'Evansville, IN ',
			'code' => 'EVV',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		472 => 
		array (
			'id' => 973,
			'address_id' => NULL,
			'name' => 'Eveter, United Kingdom ',
			'code' => 'EXT',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		473 => 
		array (
			'id' => 974,
			'address_id' => NULL,
			'name' => 'Ewer, Indonesia ',
			'code' => 'EWE',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		474 => 
		array (
			'id' => 975,
			'address_id' => NULL,
			'name' => 'Exmouth Gulf, Australia ',
			'code' => 'EXM',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		475 => 
		array (
			'id' => 976,
			'address_id' => NULL,
			'name' => 'Fagernes, Norway ',
			'code' => 'VDB',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		476 => 
		array (
			'id' => 977,
			'address_id' => NULL,
			'name' => 'Fair Isle, United Kingdom ',
			'code' => 'FIE',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		477 => 
		array (
			'id' => 978,
			'address_id' => NULL,
			'name' => 'Fairbanks, AK ',
			'code' => 'FAI',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		478 => 
		array (
			'id' => 979,
			'address_id' => NULL,
			'name' => 'Faisalabad, Pakistan ',
			'code' => 'LYP',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		479 => 
		array (
			'id' => 980,
			'address_id' => NULL,
			'name' => 'Fajard, Puerto Rico ',
			'code' => 'FAJ',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		480 => 
		array (
			'id' => 981,
			'address_id' => NULL,
			'name' => 'Fak Fak, Indonesia ',
			'code' => 'FKQ',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		481 => 
		array (
			'id' => 982,
			'address_id' => NULL,
			'name' => 'Fakarava, French Polynesia ',
			'code' => 'FAV',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		482 => 
		array (
			'id' => 983,
			'address_id' => NULL,
			'name' => 'Farafangana, Madagascar ',
			'code' => 'RVA',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		483 => 
		array (
			'id' => 984,
			'address_id' => NULL,
			'name' => 'Fargo, ND ',
			'code' => 'FAR',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		484 => 
		array (
			'id' => 985,
			'address_id' => NULL,
			'name' => 'Farmington, NM ',
			'code' => 'FMN',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		485 => 
		array (
			'id' => 986,
			'address_id' => NULL,
			'name' => 'Faro, Portugal ',
			'code' => 'FAO',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		486 => 
		array (
			'id' => 987,
			'address_id' => NULL,
			'name' => 'Faroe Islands, Faroe Islands ',
			'code' => 'FAE',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		487 => 
		array (
			'id' => 988,
			'address_id' => NULL,
			'name' => 'Fayetteville, AR - Municipal/Drake ',
			'code' => 'FYV',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		488 => 
		array (
			'id' => 989,
			'address_id' => NULL,
			'name' => 'Fayetteville, AR - Northwest Arkansas Regional ',
			'code' => 'XNA',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		489 => 
		array (
			'id' => 990,
			'address_id' => NULL,
			'name' => 'Fayetteville, NC ',
			'code' => 'FAY',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		490 => 
		array (
			'id' => 991,
			'address_id' => NULL,
			'name' => 'Fera Island, Solomon Islands ',
			'code' => 'FRE',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		491 => 
		array (
			'id' => 992,
			'address_id' => NULL,
			'name' => 'Fergana, Uzbekistan ',
			'code' => 'FEG',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		492 => 
		array (
			'id' => 993,
			'address_id' => NULL,
			'name' => 'Fernando De Noronha, Brazil ',
			'code' => 'FEN',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		493 => 
		array (
			'id' => 994,
			'address_id' => NULL,
			'name' => 'Fez, Morocco ',
			'code' => 'FEZ',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		494 => 
		array (
			'id' => 995,
			'address_id' => NULL,
			'name' => 'Fianarantsoa, Madagascar ',
			'code' => 'WFI',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		495 => 
		array (
			'id' => 996,
			'address_id' => NULL,
			'name' => 'Figari, France ',
			'code' => 'FSC',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		496 => 
		array (
			'id' => 997,
			'address_id' => NULL,
			'name' => 'Filton, United Kingdom ',
			'code' => 'FZO',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		497 => 
		array (
			'id' => 998,
			'address_id' => NULL,
			'name' => 'Finkenwerder, Germany ',
			'code' => 'XFW',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		498 => 
		array (
			'id' => 999,
			'address_id' => NULL,
			'name' => 'Fitzroy Crossing, Australia ',
			'code' => 'FIZ',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
		499 => 
		array (
			'id' => 1000,
			'address_id' => NULL,
			'name' => 'Flagstaff, AZ ',
			'code' => 'FLG',
			'updated_at' => '0000-00-00 00:00:00',
			'created_at' => '0000-00-00 00:00:00',
			'deleted_at' => NULL,
		),
	));
		\DB::table('airports')->insert(array (
			0 => 
			array (
				'id' => 1001,
				'address_id' => NULL,
				'name' => 'Flensburg, Germany ',
				'code' => 'FLF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			1 => 
			array (
				'id' => 1002,
				'address_id' => NULL,
				'name' => 'Flin Flon, MB ',
				'code' => 'YFO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			2 => 
			array (
				'id' => 1003,
				'address_id' => NULL,
				'name' => 'Flint, MI ',
				'code' => 'FNT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			3 => 
			array (
				'id' => 1004,
				'address_id' => NULL,
				'name' => 'Florence, Italy - Gal Galilei ',
				'code' => 'PSA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			4 => 
			array (
				'id' => 1005,
				'address_id' => NULL,
				'name' => 'Florence, Italy - Peretola ',
				'code' => 'FLR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			5 => 
			array (
				'id' => 1006,
				'address_id' => NULL,
				'name' => 'Florence, SC ',
				'code' => 'FLO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			6 => 
			array (
				'id' => 1007,
				'address_id' => NULL,
				'name' => 'Florence/Muscle Shoals/Sheffield, AL ',
				'code' => 'MSL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			7 => 
			array (
				'id' => 1008,
				'address_id' => NULL,
				'name' => 'Florencia, Colombia ',
				'code' => 'FLA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			8 => 
			array (
				'id' => 1009,
				'address_id' => NULL,
				'name' => 'Flores Island, Portugal ',
				'code' => 'FLW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			9 => 
			array (
				'id' => 1010,
				'address_id' => NULL,
				'name' => 'Flores, Guatemala ',
				'code' => 'FRS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			10 => 
			array (
				'id' => 1011,
				'address_id' => NULL,
				'name' => 'Florianopolis, Brazil ',
				'code' => 'FLN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			11 => 
			array (
				'id' => 1012,
				'address_id' => NULL,
				'name' => 'Floro, Norway ',
				'code' => 'FRO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			12 => 
			array (
				'id' => 1013,
				'address_id' => NULL,
				'name' => 'Foggia, Italy ',
				'code' => 'FOG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			13 => 
			array (
				'id' => 1014,
				'address_id' => NULL,
				'name' => 'Fond du Lac, SK ',
				'code' => 'ZFD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			14 => 
			array (
				'id' => 1015,
				'address_id' => NULL,
				'name' => 'Forde, Norway ',
				'code' => 'FDE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			15 => 
			array (
				'id' => 1016,
				'address_id' => NULL,
				'name' => 'Formosa, Argentina ',
				'code' => 'FMA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			16 => 
			array (
				'id' => 1017,
				'address_id' => NULL,
				'name' => 'Fort Albany, ON ',
				'code' => 'YFA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			17 => 
			array (
				'id' => 1018,
				'address_id' => NULL,
				'name' => 'Fort Chipewyan, AB ',
				'code' => 'YPY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			18 => 
			array (
				'id' => 1019,
				'address_id' => NULL,
				'name' => 'Fort Collins/Loveland, CO - Bus service ',
				'code' => 'QWF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			19 => 
			array (
				'id' => 1020,
				'address_id' => NULL,
				'name' => 'Fort Collins/Loveland, CO - Municipal Airport ',
				'code' => 'FNL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			20 => 
			array (
				'id' => 1021,
				'address_id' => NULL,
				'name' => 'Fort Dauphin, Madagascar ',
				'code' => 'FTU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			21 => 
			array (
				'id' => 1022,
				'address_id' => NULL,
				'name' => 'Fort De France, Martinique ',
				'code' => 'FDF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			22 => 
			array (
				'id' => 1023,
				'address_id' => NULL,
				'name' => 'Fort Dodge, IA ',
				'code' => 'FOD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			23 => 
			array (
				'id' => 1024,
				'address_id' => NULL,
				'name' => 'Fort Frances, ON ',
				'code' => 'YAG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			24 => 
			array (
				'id' => 1025,
				'address_id' => NULL,
				'name' => 'Fort Good Hope, NT ',
				'code' => 'YGH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			25 => 
			array (
				'id' => 1026,
				'address_id' => NULL,
				'name' => 'Fort Hope, ON ',
				'code' => 'YFH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			26 => 
			array (
				'id' => 1027,
				'address_id' => NULL,
				'name' => 'Fort Lauderdale, FL ',
				'code' => 'FLL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			27 => 
			array (
				'id' => 1028,
				'address_id' => NULL,
				'name' => 'Fort Leonard Wood, MO ',
				'code' => 'TBN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			28 => 
			array (
				'id' => 1029,
				'address_id' => NULL,
				'name' => 'Fort Mcmurray, AB ',
				'code' => 'YMM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			29 => 
			array (
				'id' => 1030,
				'address_id' => NULL,
				'name' => 'Fort Myers, FL ',
				'code' => 'RSW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			30 => 
			array (
				'id' => 1031,
				'address_id' => NULL,
				'name' => 'Fort Nelson, BC ',
				'code' => 'YYE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			31 => 
			array (
				'id' => 1032,
				'address_id' => NULL,
				'name' => 'Fort Severn, ON ',
				'code' => 'YER',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			32 => 
			array (
				'id' => 1033,
				'address_id' => NULL,
				'name' => 'Fort Simpson, NT ',
				'code' => 'YFS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			33 => 
			array (
				'id' => 1034,
				'address_id' => NULL,
				'name' => 'Fort Smith, AR ',
				'code' => 'FSM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			34 => 
			array (
				'id' => 1035,
				'address_id' => NULL,
				'name' => 'Fort Smith, NT ',
				'code' => 'YSM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			35 => 
			array (
				'id' => 1036,
				'address_id' => NULL,
				'name' => 'Fort St John, BC ',
				'code' => 'YXJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			36 => 
			array (
				'id' => 1037,
				'address_id' => NULL,
				'name' => 'Fort Walton Beach, FL ',
				'code' => 'VPS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			37 => 
			array (
				'id' => 1038,
				'address_id' => NULL,
				'name' => 'Fort Wayne, IN ',
				'code' => 'FWA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			38 => 
			array (
				'id' => 1039,
				'address_id' => NULL,
				'name' => 'Fort Worth/Dallas, TX ',
				'code' => 'DFW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			39 => 
			array (
				'id' => 1040,
				'address_id' => NULL,
				'name' => 'Fortaleza, Brazil ',
				'code' => 'FOR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			40 => 
			array (
				'id' => 1041,
				'address_id' => NULL,
				'name' => 'Fox Harbour/St Lewis, NL ',
				'code' => 'YFX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			41 => 
			array (
				'id' => 1042,
				'address_id' => NULL,
				'name' => 'Franca, Brazil ',
				'code' => 'FRC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			42 => 
			array (
				'id' => 1043,
				'address_id' => NULL,
				'name' => 'Franceville, Gabon ',
				'code' => 'MVB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			43 => 
			array (
				'id' => 1044,
				'address_id' => NULL,
				'name' => 'Francistown, Botswana ',
				'code' => 'FRW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			44 => 
			array (
				'id' => 1045,
				'address_id' => NULL,
				'name' => 'Frankfurt, Germany - Hahn ',
				'code' => 'HHN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			45 => 
			array (
				'id' => 1046,
				'address_id' => NULL,
				'name' => 'Frankfurt, Germany - International ',
				'code' => 'FRA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			46 => 
			array (
				'id' => 1047,
				'address_id' => NULL,
				'name' => 'Franklin, PA ',
				'code' => 'FKL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			47 => 
			array (
				'id' => 1048,
				'address_id' => NULL,
				'name' => 'Fredericia, Denmark ',
				'code' => 'ZBJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			48 => 
			array (
				'id' => 1049,
				'address_id' => NULL,
				'name' => 'Fredericton Junction, NB - Rail service ',
				'code' => 'XFC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			49 => 
			array (
				'id' => 1050,
				'address_id' => NULL,
				'name' => 'Fredericton, NB ',
				'code' => 'YFC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			50 => 
			array (
				'id' => 1051,
				'address_id' => NULL,
				'name' => 'Freeport, Bahamas ',
				'code' => 'FPO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			51 => 
			array (
				'id' => 1052,
				'address_id' => NULL,
				'name' => 'Freetown, Sierra Leone - Lungi Intl ',
				'code' => 'FNA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			52 => 
			array (
				'id' => 1053,
				'address_id' => NULL,
				'name' => 'Fresno, CA ',
				'code' => 'FAT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			53 => 
			array (
				'id' => 1054,
				'address_id' => NULL,
				'name' => 'Friedrichshafer, Germany ',
				'code' => 'FDH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			54 => 
			array (
				'id' => 1055,
				'address_id' => NULL,
				'name' => 'Fuerteventura, Spain ',
				'code' => 'FUE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			55 => 
			array (
				'id' => 1056,
				'address_id' => NULL,
				'name' => 'Fukue, Japan ',
				'code' => 'FUJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			56 => 
			array (
				'id' => 1057,
				'address_id' => NULL,
				'name' => 'Fukuoka, Japan ',
				'code' => 'FUK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			57 => 
			array (
				'id' => 1058,
				'address_id' => NULL,
				'name' => 'Fukushima, Japan ',
				'code' => 'FKS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			58 => 
			array (
				'id' => 1059,
				'address_id' => NULL,
				'name' => 'Funafuti Atol, Tuvalu ',
				'code' => 'FUN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			59 => 
			array (
				'id' => 1060,
				'address_id' => NULL,
				'name' => 'Funchal, Portugal ',
				'code' => 'FNC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			60 => 
			array (
				'id' => 1061,
				'address_id' => NULL,
				'name' => 'Futuna Island, Vanuatu ',
				'code' => 'FTA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			61 => 
			array (
				'id' => 1062,
				'address_id' => NULL,
				'name' => 'Futuna Island, Wallis and Futuna Islands ',
				'code' => 'FUT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			62 => 
			array (
				'id' => 1063,
				'address_id' => NULL,
				'name' => 'Fuyang, China ',
				'code' => 'FUG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			63 => 
			array (
				'id' => 1064,
				'address_id' => NULL,
				'name' => 'Fuzhou, China ',
				'code' => 'FOC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			64 => 
			array (
				'id' => 1065,
				'address_id' => NULL,
				'name' => 'Gaborone, Botswana ',
				'code' => 'GBE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			65 => 
			array (
				'id' => 1066,
				'address_id' => NULL,
				'name' => 'Gafsa, Tunisia ',
				'code' => 'GAF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			66 => 
			array (
				'id' => 1067,
				'address_id' => NULL,
				'name' => 'Gagnoa, Cote D\'Ivoire ',
				'code' => 'GGN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			67 => 
			array (
				'id' => 1068,
				'address_id' => NULL,
				'name' => 'Gainesville, FL ',
				'code' => 'GNV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			68 => 
			array (
				'id' => 1069,
				'address_id' => NULL,
				'name' => 'Galapagos, Ecuador ',
				'code' => 'GPS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			69 => 
			array (
				'id' => 1070,
				'address_id' => NULL,
				'name' => 'Gallivare, Sweden ',
				'code' => 'GEV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			70 => 
			array (
				'id' => 1071,
				'address_id' => NULL,
				'name' => 'Gallup, NM ',
				'code' => 'GUP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			71 => 
			array (
				'id' => 1072,
				'address_id' => NULL,
				'name' => 'Galway, Ireland ',
				'code' => 'GWY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			72 => 
			array (
				'id' => 1073,
				'address_id' => NULL,
				'name' => 'Gamba, Gabon ',
				'code' => 'GAX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			73 => 
			array (
				'id' => 1074,
				'address_id' => NULL,
				'name' => 'Gambela, Ethiopia ',
				'code' => 'GMB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			74 => 
			array (
				'id' => 1075,
				'address_id' => NULL,
				'name' => 'Gan Island, Maldives ',
				'code' => 'GAN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			75 => 
			array (
				'id' => 1076,
				'address_id' => NULL,
				'name' => 'Gander, NL ',
				'code' => 'YQX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			76 => 
			array (
				'id' => 1077,
				'address_id' => NULL,
				'name' => 'Gangneung, South Korea ',
				'code' => 'KAG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			77 => 
			array (
				'id' => 1078,
				'address_id' => NULL,
				'name' => 'Garachine, Panama ',
				'code' => 'GHE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			78 => 
			array (
				'id' => 1079,
				'address_id' => NULL,
				'name' => 'Garaina, Papua New Guinea ',
				'code' => 'GAR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			79 => 
			array (
				'id' => 1080,
				'address_id' => NULL,
				'name' => 'Garasa, Papua New Guinea ',
				'code' => 'GRL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			80 => 
			array (
				'id' => 1081,
				'address_id' => NULL,
				'name' => 'Garden City, KS ',
				'code' => 'GCK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			81 => 
			array (
				'id' => 1082,
				'address_id' => NULL,
				'name' => 'Garden Point, Australia ',
				'code' => 'GPN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			82 => 
			array (
				'id' => 1083,
				'address_id' => NULL,
				'name' => 'Garoua, Cameroon ',
				'code' => 'GOV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			83 => 
			array (
				'id' => 1084,
				'address_id' => NULL,
				'name' => 'Gary, IN ',
				'code' => 'GYY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			84 => 
			array (
				'id' => 1085,
				'address_id' => NULL,
				'name' => 'Gaspe, QC ',
				'code' => 'YGP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			85 => 
			array (
				'id' => 1086,
				'address_id' => NULL,
				'name' => 'Gaspe, QC - Rail service ',
				'code' => 'XDD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			86 => 
			array (
				'id' => 1087,
				'address_id' => NULL,
				'name' => 'Gassim, Saudi Arabia ',
				'code' => 'ELQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			87 => 
			array (
				'id' => 1088,
				'address_id' => NULL,
				'name' => 'Gaua, Vanuatu ',
				'code' => 'ZGU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			88 => 
			array (
				'id' => 1089,
				'address_id' => NULL,
				'name' => 'Gawahati, India ',
				'code' => 'GAU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			89 => 
			array (
				'id' => 1090,
				'address_id' => NULL,
				'name' => 'Gaza City, Occupied Palestinian Territory ',
				'code' => 'GZA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			90 => 
			array (
				'id' => 1091,
				'address_id' => NULL,
				'name' => 'Gaziatep, Turkey ',
				'code' => 'GZT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			91 => 
			array (
				'id' => 1092,
				'address_id' => NULL,
				'name' => 'Gdansk, Poland ',
				'code' => 'GDN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			92 => 
			array (
				'id' => 1093,
				'address_id' => NULL,
				'name' => 'Gebe, Indonesia ',
				'code' => 'GEB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			93 => 
			array (
				'id' => 1094,
				'address_id' => NULL,
				'name' => 'Gelendzik, Russia ',
				'code' => 'GDZ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			94 => 
			array (
				'id' => 1095,
				'address_id' => NULL,
				'name' => 'Geneina, Sudan ',
				'code' => 'EGN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			95 => 
			array (
				'id' => 1096,
				'address_id' => NULL,
				'name' => 'General Santos, Philippines ',
				'code' => 'GES',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			96 => 
			array (
				'id' => 1097,
				'address_id' => NULL,
				'name' => 'Geneva, Switzerland ',
				'code' => 'GVA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			97 => 
			array (
				'id' => 1098,
				'address_id' => NULL,
				'name' => 'Genoa, Italy ',
				'code' => 'GOA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			98 => 
			array (
				'id' => 1099,
				'address_id' => NULL,
				'name' => 'George Town, Bahamas ',
				'code' => 'GGT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			99 => 
			array (
				'id' => 1100,
				'address_id' => NULL,
				'name' => 'George, South Africa ',
				'code' => 'GRJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			100 => 
			array (
				'id' => 1101,
				'address_id' => NULL,
				'name' => 'Georgetown, Guyana ',
				'code' => 'GEO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			101 => 
			array (
				'id' => 1102,
				'address_id' => NULL,
				'name' => 'Georgetown, ON - Rail service ',
				'code' => 'XHM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			102 => 
			array (
				'id' => 1103,
				'address_id' => NULL,
				'name' => 'Geraldton, Australia, ',
				'code' => 'GET',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			103 => 
			array (
				'id' => 1104,
				'address_id' => NULL,
				'name' => 'Gerona, Spain ',
				'code' => 'GRO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			104 => 
			array (
				'id' => 1105,
				'address_id' => NULL,
				'name' => 'Gethsemani, QC ',
				'code' => 'ZGS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			105 => 
			array (
				'id' => 1106,
				'address_id' => NULL,
				'name' => 'Ghadames, Libya ',
				'code' => 'LTD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			106 => 
			array (
				'id' => 1107,
				'address_id' => NULL,
				'name' => 'Ghardala, Algeria ',
				'code' => 'GHA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			107 => 
			array (
				'id' => 1108,
				'address_id' => NULL,
				'name' => 'Ghat, Libya ',
				'code' => 'GHT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			108 => 
			array (
				'id' => 1109,
				'address_id' => NULL,
				'name' => 'Gibraltar, Gibraltar ',
				'code' => 'GIB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			109 => 
			array (
				'id' => 1110,
				'address_id' => NULL,
				'name' => 'Gilgit, Pakistan ',
				'code' => 'GIL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			110 => 
			array (
				'id' => 1111,
				'address_id' => NULL,
				'name' => 'Gillam, MB ',
				'code' => 'YGX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			111 => 
			array (
				'id' => 1112,
				'address_id' => NULL,
				'name' => 'Gillette, WY ',
				'code' => 'GCC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			112 => 
			array (
				'id' => 1113,
				'address_id' => NULL,
				'name' => 'Gillies Bay, BC ',
				'code' => 'YGB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			113 => 
			array (
				'id' => 1114,
				'address_id' => NULL,
				'name' => 'Gisborne, New Zealand ',
				'code' => 'GIS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			114 => 
			array (
				'id' => 1115,
				'address_id' => NULL,
				'name' => 'Gizan, Saudi Arabia ',
				'code' => 'GIZ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			115 => 
			array (
				'id' => 1116,
				'address_id' => NULL,
				'name' => 'Gizo, Solomon Islands ',
				'code' => 'GZO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			116 => 
			array (
				'id' => 1117,
				'address_id' => NULL,
				'name' => 'Gjoa Haven, NU ',
				'code' => 'YHK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			117 => 
			array (
				'id' => 1118,
				'address_id' => NULL,
				'name' => 'Gladewater/Kilgore, TX ',
				'code' => 'GGG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			118 => 
			array (
				'id' => 1119,
				'address_id' => NULL,
				'name' => 'Gladstone, Australia ',
				'code' => 'GLT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			119 => 
			array (
				'id' => 1120,
				'address_id' => NULL,
				'name' => 'Glasgow, MT ',
				'code' => 'GGW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			120 => 
			array (
				'id' => 1121,
				'address_id' => NULL,
				'name' => 'Glasgow, United Kingdom - Glasgow International ',
				'code' => 'GLA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			121 => 
			array (
				'id' => 1122,
				'address_id' => NULL,
				'name' => 'Glasgow, United Kingdom - Prestwick ',
				'code' => 'PIK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			122 => 
			array (
				'id' => 1123,
				'address_id' => NULL,
				'name' => 'Glen Innes, Australia ',
				'code' => 'GLI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			123 => 
			array (
				'id' => 1124,
				'address_id' => NULL,
				'name' => 'Glencoe, ON - Rail service ',
				'code' => 'XZC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			124 => 
			array (
				'id' => 1125,
				'address_id' => NULL,
				'name' => 'Glendive, MT ',
				'code' => 'GDV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			125 => 
			array (
				'id' => 1126,
				'address_id' => NULL,
				'name' => 'Goa, India ',
				'code' => 'GOI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			126 => 
			array (
				'id' => 1127,
				'address_id' => NULL,
				'name' => 'Goba, Ethiopia ',
				'code' => 'GOB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			127 => 
			array (
				'id' => 1128,
				'address_id' => NULL,
				'name' => 'Gobernador Gregores, Argentina ',
				'code' => 'GGS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			128 => 
			array (
				'id' => 1129,
				'address_id' => NULL,
				'name' => 'Gode/Iddidole, Ethopia ',
				'code' => 'GDE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			129 => 
			array (
				'id' => 1130,
				'address_id' => NULL,
				'name' => 'Gods Narrows, MB ',
				'code' => 'YGO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			130 => 
			array (
				'id' => 1131,
				'address_id' => NULL,
				'name' => 'Gods River, MB ',
				'code' => 'ZGI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			131 => 
			array (
				'id' => 1132,
				'address_id' => NULL,
				'name' => 'Goiania, Brazil ',
				'code' => 'GYN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			132 => 
			array (
				'id' => 1133,
				'address_id' => NULL,
				'name' => 'Gold Coast, QL, Australia ',
				'code' => 'OOL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			133 => 
			array (
				'id' => 1134,
				'address_id' => NULL,
				'name' => 'Golfito, Costa Rica ',
				'code' => 'GLF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			134 => 
			array (
				'id' => 1135,
				'address_id' => NULL,
				'name' => 'Golmud, China ',
				'code' => 'GOQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			135 => 
			array (
				'id' => 1136,
				'address_id' => NULL,
				'name' => 'Golovin, AK ',
				'code' => 'GLV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			136 => 
			array (
				'id' => 1137,
				'address_id' => NULL,
				'name' => 'Gonalia, Papua New Guinea ',
				'code' => 'GOE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			137 => 
			array (
				'id' => 1138,
				'address_id' => NULL,
				'name' => 'Gondari, Ethiopia ',
				'code' => 'GDQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			138 => 
			array (
				'id' => 1139,
				'address_id' => NULL,
				'name' => 'Goodnews Bay, AK ',
				'code' => 'GNU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			139 => 
			array (
				'id' => 1140,
				'address_id' => NULL,
				'name' => 'Goose Bay, NL ',
				'code' => 'YYR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			140 => 
			array (
				'id' => 1141,
				'address_id' => NULL,
				'name' => 'Gore, Ethiopia ',
				'code' => 'GOR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			141 => 
			array (
				'id' => 1142,
				'address_id' => NULL,
				'name' => 'Goroka, Papua New Guinea ',
				'code' => 'GKA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			142 => 
			array (
				'id' => 1143,
				'address_id' => NULL,
				'name' => 'Gorontalo, Indonesia ',
				'code' => 'GTO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			143 => 
			array (
				'id' => 1144,
				'address_id' => NULL,
				'name' => 'Gothenburg, Sweden - Landvetter ',
				'code' => 'GOT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			144 => 
			array (
				'id' => 1145,
				'address_id' => NULL,
				'name' => 'Gothenburg, Sweden - Saeve ',
				'code' => 'GSE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			145 => 
			array (
				'id' => 1146,
				'address_id' => NULL,
				'name' => 'Goulburn Island, Australia ',
				'code' => 'GBL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			146 => 
			array (
				'id' => 1147,
				'address_id' => NULL,
				'name' => 'Goundam, Mali ',
				'code' => 'GUD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			147 => 
			array (
				'id' => 1148,
				'address_id' => NULL,
				'name' => 'Gove, Australia ',
				'code' => 'GOV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			148 => 
			array (
				'id' => 1149,
				'address_id' => NULL,
				'name' => 'Governador Valadares, Brazil ',
				'code' => 'GVR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			149 => 
			array (
				'id' => 1150,
				'address_id' => NULL,
				'name' => 'Governors Harbour, Bahamas ',
				'code' => 'GHB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			150 => 
			array (
				'id' => 1151,
				'address_id' => NULL,
				'name' => 'Goya, CR, Argentina ',
				'code' => 'OYA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			151 => 
			array (
				'id' => 1152,
				'address_id' => NULL,
				'name' => 'Gozo, Malta ',
				'code' => 'GZM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			152 => 
			array (
				'id' => 1153,
				'address_id' => NULL,
				'name' => 'Graciosa Island, Portugal ',
				'code' => 'GRW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			153 => 
			array (
				'id' => 1154,
				'address_id' => NULL,
				'name' => 'Grafton, Australia ',
				'code' => 'GFN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			154 => 
			array (
				'id' => 1155,
				'address_id' => NULL,
				'name' => 'Granada, Spain ',
				'code' => 'GRX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			155 => 
			array (
				'id' => 1156,
				'address_id' => NULL,
				'name' => 'Grand Canyon, AZ - Heliport ',
				'code' => 'JGC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			156 => 
			array (
				'id' => 1157,
				'address_id' => NULL,
				'name' => 'Grand Canyon, AZ - National Park ',
				'code' => 'GCN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			157 => 
			array (
				'id' => 1158,
				'address_id' => NULL,
				'name' => 'Grand Cayman, Cayman Islands ',
				'code' => 'GCM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			158 => 
			array (
				'id' => 1159,
				'address_id' => NULL,
				'name' => 'Grand Forks, ND ',
				'code' => 'GFK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			159 => 
			array (
				'id' => 1160,
				'address_id' => NULL,
				'name' => 'Grand Island, NE ',
				'code' => 'GRI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			160 => 
			array (
				'id' => 1161,
				'address_id' => NULL,
				'name' => 'Grand Junction, CO ',
				'code' => 'GJT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			161 => 
			array (
				'id' => 1162,
				'address_id' => NULL,
				'name' => 'Grand Rapids, MI ',
				'code' => 'GRR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			162 => 
			array (
				'id' => 1163,
				'address_id' => NULL,
				'name' => 'Grand Rapids, MN ',
				'code' => 'GPZ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			163 => 
			array (
				'id' => 1164,
				'address_id' => NULL,
				'name' => 'Grand Turk Island, Turks and Caicos Islands ',
				'code' => 'GDT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			164 => 
			array (
				'id' => 1165,
				'address_id' => NULL,
				'name' => 'Grande Prairie, AB ',
				'code' => 'YQU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			165 => 
			array (
				'id' => 1166,
				'address_id' => NULL,
				'name' => 'Grayling, AK ',
				'code' => 'KGX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			166 => 
			array (
				'id' => 1167,
				'address_id' => NULL,
				'name' => 'Graz, Austria ',
				'code' => 'GRZ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			167 => 
			array (
				'id' => 1168,
				'address_id' => NULL,
				'name' => 'Great Falls, MT ',
				'code' => 'GTF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			168 => 
			array (
				'id' => 1169,
				'address_id' => NULL,
				'name' => 'Green Bay, WI ',
				'code' => 'GRB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			169 => 
			array (
				'id' => 1170,
				'address_id' => NULL,
				'name' => 'Greensboro, NC ',
				'code' => 'GSO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			170 => 
			array (
				'id' => 1171,
				'address_id' => NULL,
				'name' => 'Greenville, MS ',
				'code' => 'GLH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			171 => 
			array (
				'id' => 1172,
				'address_id' => NULL,
				'name' => 'Greenville, NC ',
				'code' => 'PGV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			172 => 
			array (
				'id' => 1173,
				'address_id' => NULL,
				'name' => 'Greenville/Spartanburg, SC ',
				'code' => 'GSP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			173 => 
			array (
				'id' => 1174,
				'address_id' => NULL,
				'name' => 'Grenada, Grenada, ',
				'code' => 'GND',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			174 => 
			array (
				'id' => 1175,
				'address_id' => NULL,
				'name' => 'Grenoble, France ',
				'code' => 'GNB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			175 => 
			array (
				'id' => 1176,
				'address_id' => NULL,
				'name' => 'Griffith, Australia ',
				'code' => 'GFF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			176 => 
			array (
				'id' => 1177,
				'address_id' => NULL,
				'name' => 'Grimsby, ON ',
				'code' => 'XGY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			177 => 
			array (
				'id' => 1178,
				'address_id' => NULL,
				'name' => 'Grimsey, Iceland ',
				'code' => 'GRY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			178 => 
			array (
				'id' => 1179,
				'address_id' => NULL,
				'name' => 'Grise Fiord, NU ',
				'code' => 'YGZ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			179 => 
			array (
				'id' => 1180,
				'address_id' => NULL,
				'name' => 'Groennedal, Greenland ',
				'code' => 'JGR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			180 => 
			array (
				'id' => 1181,
				'address_id' => NULL,
				'name' => 'Groningen, Netherlands ',
				'code' => 'GRQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			181 => 
			array (
				'id' => 1182,
				'address_id' => NULL,
				'name' => 'Groofe Eylandt, Australia ',
				'code' => 'GTE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			182 => 
			array (
				'id' => 1183,
				'address_id' => NULL,
				'name' => 'Groton/New London, CT ',
				'code' => 'GON',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			183 => 
			array (
				'id' => 1184,
				'address_id' => NULL,
				'name' => 'Guadalajara, Mexico ',
				'code' => 'GDL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			184 => 
			array (
				'id' => 1185,
				'address_id' => NULL,
				'name' => 'Guam ',
				'code' => 'GUM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			185 => 
			array (
				'id' => 1186,
				'address_id' => NULL,
				'name' => 'Guanaja, Honduras ',
				'code' => 'GJA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			186 => 
			array (
				'id' => 1187,
				'address_id' => NULL,
				'name' => 'Guanajuato, Mexico ',
				'code' => 'BJX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			187 => 
			array (
				'id' => 1188,
				'address_id' => NULL,
				'name' => 'Guangzhou, China ',
				'code' => 'CAN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			188 => 
			array (
				'id' => 1189,
				'address_id' => NULL,
				'name' => 'Guantanamo, Cuba ',
				'code' => 'GAO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			189 => 
			array (
				'id' => 1190,
				'address_id' => NULL,
				'name' => 'Guatemala City, Guatemala ',
				'code' => 'GUA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			190 => 
			array (
				'id' => 1191,
				'address_id' => NULL,
				'name' => 'Guayaquil, Ecuador ',
				'code' => 'GYE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			191 => 
			array (
				'id' => 1192,
				'address_id' => NULL,
				'name' => 'Guayaramerin, Bolivia ',
				'code' => 'GYA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			192 => 
			array (
				'id' => 1193,
				'address_id' => NULL,
				'name' => 'Guaymas, Mexico ',
				'code' => 'GYM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			193 => 
			array (
				'id' => 1194,
				'address_id' => NULL,
				'name' => 'Guelph, ON - Rail service ',
				'code' => 'XIA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			194 => 
			array (
				'id' => 1195,
				'address_id' => NULL,
				'name' => 'Guernsey, United Kingdom ',
				'code' => 'GCI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			195 => 
			array (
				'id' => 1196,
				'address_id' => NULL,
				'name' => 'Guerrero Negro, Mexico ',
				'code' => 'GUB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			196 => 
			array (
				'id' => 1197,
				'address_id' => NULL,
				'name' => 'Guilin, China ',
				'code' => 'KWL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			197 => 
			array (
				'id' => 1198,
				'address_id' => NULL,
				'name' => 'Guiria, Venezuela ',
				'code' => 'GUI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			198 => 
			array (
				'id' => 1199,
				'address_id' => NULL,
				'name' => 'Gulfport, MS ',
				'code' => 'GPT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			199 => 
			array (
				'id' => 1200,
				'address_id' => NULL,
				'name' => 'Gulu, Uganda ',
				'code' => 'ULU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			200 => 
			array (
				'id' => 1201,
				'address_id' => NULL,
				'name' => 'Gulyang, China ',
				'code' => 'KWE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			201 => 
			array (
				'id' => 1202,
				'address_id' => NULL,
				'name' => 'Gunnison, CO ',
				'code' => 'GUC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			202 => 
			array (
				'id' => 1203,
				'address_id' => NULL,
				'name' => 'Gunsan, South Korea ',
				'code' => 'KUV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			203 => 
			array (
				'id' => 1204,
				'address_id' => NULL,
				'name' => 'Gurayat, Saudi Arabia ',
				'code' => 'URY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			204 => 
			array (
				'id' => 1205,
				'address_id' => NULL,
				'name' => 'Gustavus, AK ',
				'code' => 'GST',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			205 => 
			array (
				'id' => 1206,
				'address_id' => NULL,
				'name' => 'Gwadar, Pakistan ',
				'code' => 'GWD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			206 => 
			array (
				'id' => 1207,
				'address_id' => NULL,
				'name' => 'Gwalior, India ',
				'code' => 'GWL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			207 => 
			array (
				'id' => 1208,
				'address_id' => NULL,
				'name' => 'Gwangju, South Korea ',
				'code' => 'KWJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			208 => 
			array (
				'id' => 1209,
				'address_id' => NULL,
				'name' => 'Gyandzha, Azerbaijan ',
				'code' => 'KVD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			209 => 
			array (
				'id' => 1210,
				'address_id' => NULL,
				'name' => 'Gyourmri, Armenia ',
				'code' => 'LWN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			210 => 
			array (
				'id' => 1211,
				'address_id' => NULL,
				'name' => 'HaApa, Tonga ',
				'code' => 'HPA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			211 => 
			array (
				'id' => 1212,
				'address_id' => NULL,
				'name' => 'Hachijo Jima, Japan ',
				'code' => 'HAC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			212 => 
			array (
				'id' => 1213,
				'address_id' => NULL,
				'name' => 'Hagerstown, MD ',
				'code' => 'HGR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			213 => 
			array (
				'id' => 1214,
				'address_id' => NULL,
				'name' => 'Hagfors, Sweden ',
				'code' => 'HFS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			214 => 
			array (
				'id' => 1215,
				'address_id' => NULL,
				'name' => 'Haifa, Israel ',
				'code' => 'HFA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			215 => 
			array (
				'id' => 1216,
				'address_id' => NULL,
				'name' => 'Haikou, China ',
				'code' => 'HAK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			216 => 
			array (
				'id' => 1217,
				'address_id' => NULL,
				'name' => 'Hail, Saudi Arabia ',
				'code' => 'HAS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			217 => 
			array (
				'id' => 1218,
				'address_id' => NULL,
				'name' => 'Hailar, China ',
				'code' => 'HLD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			218 => 
			array (
				'id' => 1219,
				'address_id' => NULL,
				'name' => 'Hailey, ID ',
				'code' => 'SUN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			219 => 
			array (
				'id' => 1220,
				'address_id' => NULL,
				'name' => 'Haines, AK ',
				'code' => 'HNS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			220 => 
			array (
				'id' => 1221,
				'address_id' => NULL,
				'name' => 'Haiphong, Viet Nam - Catbi ',
				'code' => 'HPH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			221 => 
			array (
				'id' => 1222,
				'address_id' => NULL,
				'name' => 'Hakodate, Japan ',
				'code' => 'HKD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			222 => 
			array (
				'id' => 1223,
				'address_id' => NULL,
				'name' => 'Halberstadt, Germany ',
				'code' => 'ZHQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			223 => 
			array (
				'id' => 1224,
				'address_id' => NULL,
				'name' => 'Halifax, NS - International ',
				'code' => 'YHZ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			224 => 
			array (
				'id' => 1225,
				'address_id' => NULL,
				'name' => 'Halifax, NS - Rail service ',
				'code' => 'XDG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			225 => 
			array (
				'id' => 1226,
				'address_id' => NULL,
				'name' => 'Hall Beach, NU ',
				'code' => 'YUX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			226 => 
			array (
				'id' => 1227,
				'address_id' => NULL,
				'name' => 'Halls Creek, Australia ',
				'code' => 'HCQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			227 => 
			array (
				'id' => 1228,
				'address_id' => NULL,
				'name' => 'Halmstad, Sweden ',
				'code' => 'HAD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			228 => 
			array (
				'id' => 1229,
				'address_id' => NULL,
				'name' => 'Hamburg, Germany - Fuhisbuettel ',
				'code' => 'HAM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			229 => 
			array (
				'id' => 1230,
				'address_id' => NULL,
				'name' => 'Hamburg, Germany - Luebeck ',
				'code' => 'LBC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			230 => 
			array (
				'id' => 1231,
				'address_id' => NULL,
				'name' => 'Hamilton Island, Australia ',
				'code' => 'HTI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			231 => 
			array (
				'id' => 1232,
				'address_id' => NULL,
				'name' => 'Hamilton, Bermuda ',
				'code' => 'BDA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			232 => 
			array (
				'id' => 1233,
				'address_id' => NULL,
				'name' => 'Hamilton, New Zealand ',
				'code' => 'HLZ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			233 => 
			array (
				'id' => 1234,
				'address_id' => NULL,
				'name' => 'Hamilton, ON ',
				'code' => 'YHM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			234 => 
			array (
				'id' => 1235,
				'address_id' => NULL,
				'name' => 'Hammerfest, Norway ',
				'code' => 'HFT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			235 => 
			array (
				'id' => 1236,
				'address_id' => NULL,
				'name' => 'Hampton, VA ',
				'code' => 'PHF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			236 => 
			array (
				'id' => 1237,
				'address_id' => NULL,
				'name' => 'Hana, HI - Island of Maui ',
				'code' => 'HNM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			237 => 
			array (
				'id' => 1238,
				'address_id' => NULL,
				'name' => 'Hanapepe, HI ',
				'code' => 'PAK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			238 => 
			array (
				'id' => 1239,
				'address_id' => NULL,
				'name' => 'Hancock, MI ',
				'code' => 'CMX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			239 => 
			array (
				'id' => 1240,
				'address_id' => NULL,
				'name' => 'Hangzhou, China ',
				'code' => 'HGH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			240 => 
			array (
				'id' => 1241,
				'address_id' => NULL,
				'name' => 'Hanimaadhoo, Maldives ',
				'code' => 'HAQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			241 => 
			array (
				'id' => 1242,
				'address_id' => NULL,
				'name' => 'Hanoi, Viet Nam - Noibai ',
				'code' => 'HAN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			242 => 
			array (
				'id' => 1243,
				'address_id' => NULL,
				'name' => 'Hanover, Germany ',
				'code' => 'HAJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			243 => 
			array (
				'id' => 1244,
				'address_id' => NULL,
				'name' => 'Hanover, NH ',
				'code' => 'LEB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			244 => 
			array (
				'id' => 1245,
				'address_id' => NULL,
				'name' => 'Hanzhang, China ',
				'code' => 'HZG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			245 => 
			array (
				'id' => 1246,
				'address_id' => NULL,
				'name' => 'Harare, Zimbabwe ',
				'code' => 'HRE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			246 => 
			array (
				'id' => 1247,
				'address_id' => NULL,
				'name' => 'Harbin, China ',
				'code' => 'HRB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			247 => 
			array (
				'id' => 1248,
				'address_id' => NULL,
				'name' => 'Hargeisa, Somolia ',
				'code' => 'HGA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			248 => 
			array (
				'id' => 1249,
				'address_id' => NULL,
				'name' => 'Harlingen, TX ',
				'code' => 'HRL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			249 => 
			array (
				'id' => 1250,
				'address_id' => NULL,
				'name' => 'Harrisburg, PA ',
				'code' => 'MDT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			250 => 
			array (
				'id' => 1251,
				'address_id' => NULL,
				'name' => 'Harrison, AR ',
				'code' => 'HRO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			251 => 
			array (
				'id' => 1252,
				'address_id' => NULL,
				'name' => 'Harstad-Narvik, Norway ',
				'code' => 'EVE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			252 => 
			array (
				'id' => 1253,
				'address_id' => NULL,
				'name' => 'Hartford, CT ',
				'code' => 'BDL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			253 => 
			array (
				'id' => 1254,
				'address_id' => NULL,
				'name' => 'Hassi Messaoud, Algeria ',
				'code' => 'HME',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			254 => 
			array (
				'id' => 1255,
				'address_id' => NULL,
				'name' => 'Hasvik, Norway ',
				'code' => 'HAA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			255 => 
			array (
				'id' => 1256,
				'address_id' => NULL,
				'name' => 'Hat Yai, Thailand ',
				'code' => 'HDY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			256 => 
			array (
				'id' => 1257,
				'address_id' => NULL,
				'name' => 'Hateruma, Japan ',
				'code' => 'HTR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			257 => 
			array (
				'id' => 1258,
				'address_id' => NULL,
				'name' => 'Haugesund, Norway ',
				'code' => 'HAU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			258 => 
			array (
				'id' => 1259,
				'address_id' => NULL,
				'name' => 'Havana, Cuba ',
				'code' => 'HAV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			259 => 
			array (
				'id' => 1260,
				'address_id' => NULL,
				'name' => 'Havasupai, AZ ',
				'code' => 'HAE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			260 => 
			array (
				'id' => 1261,
				'address_id' => NULL,
				'name' => 'Havre St Pierre, QC ',
				'code' => 'YGV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			261 => 
			array (
				'id' => 1262,
				'address_id' => NULL,
				'name' => 'Havre, MT ',
				'code' => 'HVR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			262 => 
			array (
				'id' => 1263,
				'address_id' => NULL,
				'name' => 'Hay River, NT ',
				'code' => 'YHY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			263 => 
			array (
				'id' => 1264,
				'address_id' => NULL,
				'name' => 'Hayden, CO ',
				'code' => 'HDN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			264 => 
			array (
				'id' => 1265,
				'address_id' => NULL,
				'name' => 'Hayman Island, Australia ',
				'code' => 'HIS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			265 => 
			array (
				'id' => 1266,
				'address_id' => NULL,
				'name' => 'Hays, KS ',
				'code' => 'HYS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			266 => 
			array (
				'id' => 1267,
				'address_id' => NULL,
				'name' => 'Healy Lake, AK ',
				'code' => 'HKB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			267 => 
			array (
				'id' => 1268,
				'address_id' => NULL,
				'name' => 'Hefei, China ',
				'code' => 'HFE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			268 => 
			array (
				'id' => 1269,
				'address_id' => NULL,
				'name' => 'Heidelberg, Germany ',
				'code' => 'HDB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			269 => 
			array (
				'id' => 1270,
				'address_id' => NULL,
				'name' => 'Helena, MT ',
				'code' => 'HLN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			270 => 
			array (
				'id' => 1271,
				'address_id' => NULL,
				'name' => 'Helgoland, Germany ',
				'code' => 'HGL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			271 => 
			array (
				'id' => 1272,
				'address_id' => NULL,
				'name' => 'Helsinki, Finland ',
				'code' => 'HEL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			272 => 
			array (
				'id' => 1273,
				'address_id' => NULL,
				'name' => 'Hendersonville, NC ',
				'code' => 'AVL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			273 => 
			array (
				'id' => 1274,
				'address_id' => NULL,
				'name' => 'Heno, Myanmar ',
				'code' => 'HEH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			274 => 
			array (
				'id' => 1275,
				'address_id' => NULL,
				'name' => 'Heraklian, Greece ',
				'code' => 'HER',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			275 => 
			array (
				'id' => 1276,
				'address_id' => NULL,
				'name' => 'Heringsdorf, Germany ',
				'code' => 'HDF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			276 => 
			array (
				'id' => 1277,
				'address_id' => NULL,
				'name' => 'Hermavan, Sweden ',
				'code' => 'HMV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			277 => 
			array (
				'id' => 1278,
				'address_id' => NULL,
				'name' => 'Hermosillo, Mexico ',
				'code' => 'HMO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			278 => 
			array (
				'id' => 1279,
				'address_id' => NULL,
				'name' => 'Herning, Denmark ',
				'code' => 'XAK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			279 => 
			array (
				'id' => 1280,
				'address_id' => NULL,
				'name' => 'Hervey Bay, Australia ',
				'code' => 'HVB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			280 => 
			array (
				'id' => 1281,
				'address_id' => NULL,
				'name' => 'Hervey, QC - Rail service ',
				'code' => 'XDU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			281 => 
			array (
				'id' => 1282,
				'address_id' => NULL,
				'name' => 'Hibbing/Chisholm, MN ',
				'code' => 'HIB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			282 => 
			array (
				'id' => 1283,
				'address_id' => NULL,
				'name' => 'Hickory, NC ',
				'code' => 'HKY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			283 => 
			array (
				'id' => 1284,
				'address_id' => NULL,
				'name' => 'High Level, AB ',
				'code' => 'YOJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			284 => 
			array (
				'id' => 1285,
				'address_id' => NULL,
				'name' => 'High Point, NC ',
				'code' => 'GSO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			285 => 
			array (
				'id' => 1286,
				'address_id' => NULL,
				'name' => 'Hilo, HI - Island of Hawaii ',
				'code' => 'ITO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			286 => 
			array (
				'id' => 1287,
				'address_id' => NULL,
				'name' => 'Hilton Head, SC ',
				'code' => 'HHH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			287 => 
			array (
				'id' => 1288,
				'address_id' => NULL,
				'name' => 'Hiroshima, Japan - Hiroshima West ',
				'code' => 'HIW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			288 => 
			array (
				'id' => 1289,
				'address_id' => NULL,
				'name' => 'Hiroshima, Japan - International ',
				'code' => 'HIJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			289 => 
			array (
				'id' => 1290,
				'address_id' => NULL,
				'name' => 'Hivaro, Papua New Guinea ',
				'code' => 'HIT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			290 => 
			array (
				'id' => 1291,
				'address_id' => NULL,
				'name' => 'Ho Chi Minh City, Viet Nam ',
				'code' => 'SGN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			291 => 
			array (
				'id' => 1292,
				'address_id' => NULL,
				'name' => 'Hobart, Australia ',
				'code' => 'HBA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			292 => 
			array (
				'id' => 1293,
				'address_id' => NULL,
				'name' => 'Hobbs, NM ',
				'code' => 'HBB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			293 => 
			array (
				'id' => 1294,
				'address_id' => NULL,
				'name' => 'Hodeidah, Yemen ',
				'code' => 'HOD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			294 => 
			array (
				'id' => 1295,
				'address_id' => NULL,
				'name' => 'Hoedspruit, South Africa ',
				'code' => 'HDS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			295 => 
			array (
				'id' => 1296,
				'address_id' => NULL,
				'name' => 'Hof, Germany ',
				'code' => 'HOQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			296 => 
			array (
				'id' => 1297,
				'address_id' => NULL,
				'name' => 'Hofuf, Saudi Arabia ',
				'code' => 'HOF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			297 => 
			array (
				'id' => 1298,
				'address_id' => NULL,
				'name' => 'Hohhot, China ',
				'code' => 'HET',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			298 => 
			array (
				'id' => 1299,
				'address_id' => NULL,
				'name' => 'Hokitika, New Zealand ',
				'code' => 'HKK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			299 => 
			array (
				'id' => 1300,
				'address_id' => NULL,
				'name' => 'Holguin, Cuba ',
				'code' => 'HOG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			300 => 
			array (
				'id' => 1301,
				'address_id' => NULL,
				'name' => 'Hollis, AK ',
				'code' => 'HYL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			301 => 
			array (
				'id' => 1302,
				'address_id' => NULL,
				'name' => 'Holman, NT ',
				'code' => 'YHI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			302 => 
			array (
				'id' => 1303,
				'address_id' => NULL,
				'name' => 'Holy Cross, AK ',
				'code' => 'HCR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			303 => 
			array (
				'id' => 1304,
				'address_id' => NULL,
				'name' => 'Homer, AK ',
				'code' => 'HOM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			304 => 
			array (
				'id' => 1305,
				'address_id' => NULL,
				'name' => 'Hong Kong, Hong Kong ',
				'code' => 'HKG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			305 => 
			array (
				'id' => 1306,
				'address_id' => NULL,
				'name' => 'Honiara, Solomon Islands ',
				'code' => 'HIR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			306 => 
			array (
				'id' => 1307,
				'address_id' => NULL,
				'name' => 'Honningsvag, Norway ',
				'code' => 'HVG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			307 => 
			array (
				'id' => 1308,
				'address_id' => NULL,
				'name' => 'Honolulu, HI - Island of Oahu ',
				'code' => 'HNL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			308 => 
			array (
				'id' => 1309,
				'address_id' => NULL,
				'name' => 'Hooker, Australia ',
				'code' => 'HOK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			309 => 
			array (
				'id' => 1310,
				'address_id' => NULL,
				'name' => 'Hoolehua, HI - Island of Molokai ',
				'code' => 'MKK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			310 => 
			array (
				'id' => 1311,
				'address_id' => NULL,
				'name' => 'Hoonah, AK ',
				'code' => 'HNH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			311 => 
			array (
				'id' => 1312,
				'address_id' => NULL,
				'name' => 'Hooper Bay, AK ',
				'code' => 'HPB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			312 => 
			array (
				'id' => 1313,
				'address_id' => NULL,
				'name' => 'Hopedale, NL ',
				'code' => 'YHO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			313 => 
			array (
				'id' => 1314,
				'address_id' => NULL,
				'name' => 'Horn Island Australia ',
				'code' => 'HID',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			314 => 
			array (
				'id' => 1315,
				'address_id' => NULL,
				'name' => 'Hornafjordur, Iceland ',
				'code' => 'HFN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			315 => 
			array (
				'id' => 1316,
				'address_id' => NULL,
				'name' => 'Horta, Portugal ',
				'code' => 'HOR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			316 => 
			array (
				'id' => 1317,
				'address_id' => NULL,
				'name' => 'Hoskins, Papua New Guinea ',
				'code' => 'HKN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			317 => 
			array (
				'id' => 1318,
				'address_id' => NULL,
				'name' => 'Hot Springs, AR ',
				'code' => 'HOT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			318 => 
			array (
				'id' => 1319,
				'address_id' => NULL,
				'name' => 'Hotan, China ',
				'code' => 'HTN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			319 => 
			array (
				'id' => 1320,
				'address_id' => NULL,
				'name' => 'Houeisay, Laos ',
				'code' => 'HOE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			320 => 
			array (
				'id' => 1321,
				'address_id' => NULL,
				'name' => 'Houn, Libya ',
				'code' => 'HUQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			321 => 
			array (
				'id' => 1322,
				'address_id' => NULL,
				'name' => 'Houston, BC - Bus station ',
				'code' => 'ZHO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			322 => 
			array (
				'id' => 1323,
				'address_id' => NULL,
				'name' => 'Houston, TX - All airports ',
				'code' => 'HOU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			323 => 
			array (
				'id' => 1324,
				'address_id' => NULL,
				'name' => 'Houston, TX - Hobby ',
				'code' => 'HOU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			324 => 
			array (
				'id' => 1325,
				'address_id' => NULL,
				'name' => 'Houston, TX - Intercontinental ',
				'code' => 'IAH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			325 => 
			array (
				'id' => 1326,
				'address_id' => NULL,
				'name' => 'Huahine, French Polynesia ',
				'code' => 'HUH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			326 => 
			array (
				'id' => 1327,
				'address_id' => NULL,
				'name' => 'Hualien, Taiwan - Phi Bai ',
				'code' => 'HUN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			327 => 
			array (
				'id' => 1328,
				'address_id' => NULL,
				'name' => 'Hualtin, Thailand ',
				'code' => 'HHQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			328 => 
			array (
				'id' => 1329,
				'address_id' => NULL,
				'name' => 'Huanuco, French Polynesia ',
				'code' => 'HUU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			329 => 
			array (
				'id' => 1330,
				'address_id' => NULL,
				'name' => 'Huargyan, China ',
				'code' => 'HYN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			330 => 
			array (
				'id' => 1331,
				'address_id' => NULL,
				'name' => 'Huatulco, Mexico ',
				'code' => 'HUX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			331 => 
			array (
				'id' => 1332,
				'address_id' => NULL,
				'name' => 'Hudiksvall, Sweden ',
				'code' => 'HUV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			332 => 
			array (
				'id' => 1333,
				'address_id' => NULL,
				'name' => 'Hudson Bay, SK ',
				'code' => 'YHB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			333 => 
			array (
				'id' => 1334,
				'address_id' => NULL,
				'name' => 'Hue, Viet Nam ',
				'code' => 'HUI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			334 => 
			array (
				'id' => 1335,
				'address_id' => NULL,
				'name' => 'Hughenden, Australia ',
				'code' => 'HGD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			335 => 
			array (
				'id' => 1336,
				'address_id' => NULL,
				'name' => 'Hughes, AK ',
				'code' => 'HUS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			336 => 
			array (
				'id' => 1337,
				'address_id' => NULL,
				'name' => 'Hultsfred, Sweden ',
				'code' => 'HLF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			337 => 
			array (
				'id' => 1338,
				'address_id' => NULL,
				'name' => 'Humberside, United Kingdom ',
				'code' => 'HUY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			338 => 
			array (
				'id' => 1339,
				'address_id' => NULL,
				'name' => 'Huntington, WV/Ashland, KY ',
				'code' => 'HTS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			339 => 
			array (
				'id' => 1340,
				'address_id' => NULL,
				'name' => 'Huntsville, AL ',
				'code' => 'HSV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			340 => 
			array (
				'id' => 1341,
				'address_id' => NULL,
				'name' => 'Hurghada, Egypt ',
				'code' => 'HRG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			341 => 
			array (
				'id' => 1342,
				'address_id' => NULL,
				'name' => 'Huron, SD ',
				'code' => 'HON',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			342 => 
			array (
				'id' => 1343,
				'address_id' => NULL,
				'name' => 'Huslia, AK ',
				'code' => 'HSL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			343 => 
			array (
				'id' => 1344,
				'address_id' => NULL,
				'name' => 'Hwange Nat Park, Zimbabwe ',
				'code' => 'HWN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			344 => 
			array (
				'id' => 1345,
				'address_id' => NULL,
				'name' => 'Hyannis, MA ',
				'code' => 'HYA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			345 => 
			array (
				'id' => 1346,
				'address_id' => NULL,
				'name' => 'Hydaburg, AK ',
				'code' => 'HYG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			346 => 
			array (
				'id' => 1347,
				'address_id' => NULL,
				'name' => 'Hyderabad, India ',
				'code' => 'HYD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			347 => 
			array (
				'id' => 1348,
				'address_id' => NULL,
				'name' => 'Iasi, Romania ',
				'code' => 'IAS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			348 => 
			array (
				'id' => 1349,
				'address_id' => NULL,
				'name' => 'Ibague, Colombia ',
				'code' => 'IBE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			349 => 
			array (
				'id' => 1350,
				'address_id' => NULL,
				'name' => 'Ibiza, Spain ',
				'code' => 'IBZ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			350 => 
			array (
				'id' => 1351,
				'address_id' => NULL,
				'name' => 'Idaho Falls, ID ',
				'code' => 'IDA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			351 => 
			array (
				'id' => 1352,
				'address_id' => NULL,
				'name' => 'Igarka, Russia ',
				'code' => 'IAA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			352 => 
			array (
				'id' => 1353,
				'address_id' => NULL,
				'name' => 'Igiugig, AK ',
				'code' => 'IGG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			353 => 
			array (
				'id' => 1354,
				'address_id' => NULL,
				'name' => 'Igloolik, NU ',
				'code' => 'YGT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			354 => 
			array (
				'id' => 1355,
				'address_id' => NULL,
				'name' => 'Iguassu Falls, PR, Brazil ',
				'code' => 'IGU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			355 => 
			array (
				'id' => 1356,
				'address_id' => NULL,
				'name' => 'Iguazu, Argentina ',
				'code' => 'IGR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			356 => 
			array (
				'id' => 1357,
				'address_id' => NULL,
				'name' => 'Ihu, Papua New Guinea ',
				'code' => 'IHU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			357 => 
			array (
				'id' => 1358,
				'address_id' => NULL,
				'name' => 'Ile Des Pins, New Caledonia ',
				'code' => 'ILP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			358 => 
			array (
				'id' => 1359,
				'address_id' => NULL,
				'name' => 'Iles De La Madeleine, QC ',
				'code' => 'YGR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			359 => 
			array (
				'id' => 1360,
				'address_id' => NULL,
				'name' => 'Ilford, MB ',
				'code' => 'ILF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			360 => 
			array (
				'id' => 1361,
				'address_id' => NULL,
				'name' => 'Ilheus, Brazil ',
				'code' => 'IOS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			361 => 
			array (
				'id' => 1362,
				'address_id' => NULL,
				'name' => 'Iliamna, AK ',
				'code' => 'ILI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			362 => 
			array (
				'id' => 1363,
				'address_id' => NULL,
				'name' => 'Illaga, Indonesia ',
				'code' => 'ILA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			363 => 
			array (
				'id' => 1364,
				'address_id' => NULL,
				'name' => 'Iloilo, Philippines - Mandurriao ',
				'code' => 'ILO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			364 => 
			array (
				'id' => 1365,
				'address_id' => NULL,
				'name' => 'Ilu, Indonesia ',
				'code' => 'IUL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			365 => 
			array (
				'id' => 1366,
				'address_id' => NULL,
				'name' => 'Ilulissat, Greenland ',
				'code' => 'JAV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			366 => 
			array (
				'id' => 1367,
				'address_id' => NULL,
				'name' => 'Imperatriz, Brazil ',
				'code' => 'IMP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			367 => 
			array (
				'id' => 1368,
				'address_id' => NULL,
				'name' => 'Imperial, CA ',
				'code' => 'IPL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			368 => 
			array (
				'id' => 1369,
				'address_id' => NULL,
				'name' => 'Imphal, India ',
				'code' => 'IMF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			369 => 
			array (
				'id' => 1370,
				'address_id' => NULL,
				'name' => 'In Amenas, Algeria ',
				'code' => 'IAM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			370 => 
			array (
				'id' => 1371,
				'address_id' => NULL,
				'name' => 'Inagua, Bahamas ',
				'code' => 'IGA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			371 => 
			array (
				'id' => 1372,
				'address_id' => NULL,
				'name' => 'Inanwatan, Indonesia ',
				'code' => 'INX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			372 => 
			array (
				'id' => 1373,
				'address_id' => NULL,
				'name' => 'Indagen, Papua New Guinea ',
				'code' => 'IDN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			373 => 
			array (
				'id' => 1374,
				'address_id' => NULL,
				'name' => 'Indianapolis, IN ',
				'code' => 'IND',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			374 => 
			array (
				'id' => 1375,
				'address_id' => NULL,
				'name' => 'Indore, India ',
				'code' => 'IDR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			375 => 
			array (
				'id' => 1376,
				'address_id' => NULL,
				'name' => 'Ingersoll, ON - Rail service ',
				'code' => 'XIB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			376 => 
			array (
				'id' => 1377,
				'address_id' => NULL,
				'name' => 'Innsbruck, Austria ',
				'code' => 'INN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			377 => 
			array (
				'id' => 1378,
				'address_id' => NULL,
				'name' => 'Inta, Russia ',
				'code' => 'INA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			378 => 
			array (
				'id' => 1379,
				'address_id' => NULL,
				'name' => 'International Falls, MN ',
				'code' => 'INL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			379 => 
			array (
				'id' => 1380,
				'address_id' => NULL,
				'name' => 'Inukjuak, QC ',
				'code' => 'YPH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			380 => 
			array (
				'id' => 1381,
				'address_id' => NULL,
				'name' => 'Inuvik, NT ',
				'code' => 'YEV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			381 => 
			array (
				'id' => 1382,
				'address_id' => NULL,
				'name' => 'Invercargill, New Zealand ',
				'code' => 'IVC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			382 => 
			array (
				'id' => 1383,
				'address_id' => NULL,
				'name' => 'Inverell, Australia ',
				'code' => 'IVR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			383 => 
			array (
				'id' => 1384,
				'address_id' => NULL,
				'name' => 'Inverness, United Kingdom ',
				'code' => 'INV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			384 => 
			array (
				'id' => 1385,
				'address_id' => NULL,
				'name' => 'Inyokern, CA ',
				'code' => 'IYK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			385 => 
			array (
				'id' => 1386,
				'address_id' => NULL,
				'name' => 'Ioannina, Greece ',
				'code' => 'IOA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			386 => 
			array (
				'id' => 1387,
				'address_id' => NULL,
				'name' => 'Ioma, Papua New Guinea ',
				'code' => 'IOP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			387 => 
			array (
				'id' => 1388,
				'address_id' => NULL,
				'name' => 'Ipatinga, Brazil ',
				'code' => 'IPN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			388 => 
			array (
				'id' => 1389,
				'address_id' => NULL,
				'name' => 'Ipiales, Colombia ',
				'code' => 'IPI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			389 => 
			array (
				'id' => 1390,
				'address_id' => NULL,
				'name' => 'Ipil, Philippines ',
				'code' => 'IPE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			390 => 
			array (
				'id' => 1391,
				'address_id' => NULL,
				'name' => 'Ipoh, Malaysia ',
				'code' => 'IPH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			391 => 
			array (
				'id' => 1392,
				'address_id' => NULL,
				'name' => 'Ipota, Vanuatu ',
				'code' => 'IPA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			392 => 
			array (
				'id' => 1393,
				'address_id' => NULL,
				'name' => 'Iqaluit, NU ',
				'code' => 'YFB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			393 => 
			array (
				'id' => 1394,
				'address_id' => NULL,
				'name' => 'Iquique, Chile ',
				'code' => 'IQQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			394 => 
			array (
				'id' => 1395,
				'address_id' => NULL,
				'name' => 'Iquitos, Peru ',
				'code' => 'IQT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			395 => 
			array (
				'id' => 1396,
				'address_id' => NULL,
				'name' => 'Irkutsk, Russia ',
				'code' => 'IKT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			396 => 
			array (
				'id' => 1397,
				'address_id' => NULL,
				'name' => 'Iron Mountain, MI ',
				'code' => 'IMT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			397 => 
			array (
				'id' => 1398,
				'address_id' => NULL,
				'name' => 'Ironwood, MI ',
				'code' => 'IWD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			398 => 
			array (
				'id' => 1399,
				'address_id' => NULL,
				'name' => 'Isafjordur, Iceland ',
				'code' => 'IFJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			399 => 
			array (
				'id' => 1400,
				'address_id' => NULL,
				'name' => 'Isfahan, Iran ',
				'code' => 'IFN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			400 => 
			array (
				'id' => 1401,
				'address_id' => NULL,
				'name' => 'Ishigakij, Japan ',
				'code' => 'ISG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			401 => 
			array (
				'id' => 1402,
				'address_id' => NULL,
				'name' => 'Islamabad, Pakistan ',
				'code' => 'ISB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			402 => 
			array (
				'id' => 1403,
				'address_id' => NULL,
				'name' => 'Island Lake/Garden Hill ',
				'code' => 'YIV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			403 => 
			array (
				'id' => 1404,
				'address_id' => NULL,
				'name' => 'Island Lake/Garden Hill, Canada ',
				'code' => 'YIV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			404 => 
			array (
				'id' => 1405,
				'address_id' => NULL,
				'name' => 'Islay, United Kingdom ',
				'code' => 'ILY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			405 => 
			array (
				'id' => 1406,
				'address_id' => NULL,
				'name' => 'Isle of Man, United Kingdom ',
				'code' => 'IOM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			406 => 
			array (
				'id' => 1407,
				'address_id' => NULL,
				'name' => 'Isles of Scilly, United Kingdom - St Marys ',
				'code' => 'ISC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			407 => 
			array (
				'id' => 1408,
				'address_id' => NULL,
				'name' => 'Isles of Scilly, United Kingdom - Tresco ',
				'code' => 'TSO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			408 => 
			array (
				'id' => 1409,
				'address_id' => NULL,
				'name' => 'Islip, NY ',
				'code' => 'ISP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			409 => 
			array (
				'id' => 1410,
				'address_id' => NULL,
				'name' => 'Istanbul, Turkey ',
				'code' => 'IST',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			410 => 
			array (
				'id' => 1411,
				'address_id' => NULL,
				'name' => 'Itaituba, Brazil ',
				'code' => 'ITB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			411 => 
			array (
				'id' => 1412,
				'address_id' => NULL,
				'name' => 'Ithaca, NY ',
				'code' => 'ITH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			412 => 
			array (
				'id' => 1413,
				'address_id' => NULL,
				'name' => 'Itokama, Papua New Guinea ',
				'code' => 'ITK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			413 => 
			array (
				'id' => 1414,
				'address_id' => NULL,
				'name' => 'Ivalo, Finland ',
				'code' => 'IVL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			414 => 
			array (
				'id' => 1415,
				'address_id' => NULL,
				'name' => 'Ivano-Frankovsk, Ukraine ',
				'code' => 'IFO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			415 => 
			array (
				'id' => 1416,
				'address_id' => NULL,
				'name' => 'Ivujivik, QC ',
				'code' => 'YIK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			416 => 
			array (
				'id' => 1417,
				'address_id' => NULL,
				'name' => 'Iwami, Japan ',
				'code' => 'IWJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			417 => 
			array (
				'id' => 1418,
				'address_id' => NULL,
				'name' => 'Ixtapa, Mexico ',
				'code' => 'ZIH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			418 => 
			array (
				'id' => 1419,
				'address_id' => NULL,
				'name' => 'Ixtepec, Mexico ',
				'code' => 'IZT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			419 => 
			array (
				'id' => 1420,
				'address_id' => NULL,
				'name' => 'Izmir, Turkey ',
				'code' => 'ADB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			420 => 
			array (
				'id' => 1421,
				'address_id' => NULL,
				'name' => 'Izumo, Japan ',
				'code' => 'IZO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			421 => 
			array (
				'id' => 1422,
				'address_id' => NULL,
				'name' => 'Jabor, Marshall Islands ',
				'code' => 'JAT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			422 => 
			array (
				'id' => 1423,
				'address_id' => NULL,
				'name' => 'Jacareacanga, Brazil ',
				'code' => 'JCR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			423 => 
			array (
				'id' => 1424,
				'address_id' => NULL,
				'name' => 'Jackson Hole, WY ',
				'code' => 'JAC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			424 => 
			array (
				'id' => 1425,
				'address_id' => NULL,
				'name' => 'Jackson, MS ',
				'code' => 'JAN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			425 => 
			array (
				'id' => 1426,
				'address_id' => NULL,
				'name' => 'Jackson, TN ',
				'code' => 'MKL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			426 => 
			array (
				'id' => 1427,
				'address_id' => NULL,
				'name' => 'Jacksonville, FL ',
				'code' => 'JAX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			427 => 
			array (
				'id' => 1428,
				'address_id' => NULL,
				'name' => 'Jacksonville, NC ',
				'code' => 'OAJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			428 => 
			array (
				'id' => 1429,
				'address_id' => NULL,
				'name' => 'Jacobabad, Pakistan ',
				'code' => 'JAG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			429 => 
			array (
				'id' => 1430,
				'address_id' => NULL,
				'name' => 'Jacquinot Bay, Papua New Guinea ',
				'code' => 'JAQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			430 => 
			array (
				'id' => 1431,
				'address_id' => NULL,
				'name' => 'Jaipur, India ',
				'code' => 'JAI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			431 => 
			array (
				'id' => 1432,
				'address_id' => NULL,
				'name' => 'Jakarta, Indonesia ',
				'code' => 'CGK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			432 => 
			array (
				'id' => 1433,
				'address_id' => NULL,
				'name' => 'Jalapa, Mexico ',
				'code' => 'JAL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			433 => 
			array (
				'id' => 1434,
				'address_id' => NULL,
				'name' => 'Jaluit Island, Marshall Islands ',
				'code' => 'UIT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			434 => 
			array (
				'id' => 1435,
				'address_id' => NULL,
				'name' => 'Jambi. Indonesia ',
				'code' => 'DJB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			435 => 
			array (
				'id' => 1436,
				'address_id' => NULL,
				'name' => 'Jamestown, ND ',
				'code' => 'JMS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			436 => 
			array (
				'id' => 1437,
				'address_id' => NULL,
				'name' => 'Jamestown, NY ',
				'code' => 'JHW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			437 => 
			array (
				'id' => 1438,
				'address_id' => NULL,
				'name' => 'Jamnagar, India ',
				'code' => 'JGA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			438 => 
			array (
				'id' => 1439,
				'address_id' => NULL,
				'name' => 'Janakpur, Nepal ',
				'code' => 'JKR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			439 => 
			array (
				'id' => 1440,
				'address_id' => NULL,
				'name' => 'Janesville, WI ',
				'code' => 'JVL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			440 => 
			array (
				'id' => 1441,
				'address_id' => NULL,
				'name' => 'Jaque, Panama ',
				'code' => 'JQE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			441 => 
			array (
				'id' => 1442,
				'address_id' => NULL,
				'name' => 'Jasper, AB - Rail service ',
				'code' => 'XDH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			442 => 
			array (
				'id' => 1443,
				'address_id' => NULL,
				'name' => 'Jayapura, Indonesia ',
				'code' => 'DJJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			443 => 
			array (
				'id' => 1444,
				'address_id' => NULL,
				'name' => 'Jeddah, Saudi Arabia ',
				'code' => 'JED',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			444 => 
			array (
				'id' => 1445,
				'address_id' => NULL,
				'name' => 'Jeh, Marshall Islands ',
				'code' => 'JEJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			445 => 
			array (
				'id' => 1446,
				'address_id' => NULL,
				'name' => 'Jeju, South Korea - Jeju Airport, metro area ',
				'code' => 'CJU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			446 => 
			array (
				'id' => 1447,
				'address_id' => NULL,
				'name' => 'Jerez De La Frontere, Spain ',
				'code' => 'XRY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			447 => 
			array (
				'id' => 1448,
				'address_id' => NULL,
				'name' => 'Jersey, United Kingdom ',
				'code' => 'JER',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			448 => 
			array (
				'id' => 1449,
				'address_id' => NULL,
				'name' => 'Jessore, Bangladesh ',
				'code' => 'JSR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			449 => 
			array (
				'id' => 1450,
				'address_id' => NULL,
				'name' => 'Jiamusi, China ',
				'code' => 'JMU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			450 => 
			array (
				'id' => 1451,
				'address_id' => NULL,
				'name' => 'Jiayuguan, China ',
				'code' => 'JGN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			451 => 
			array (
				'id' => 1452,
				'address_id' => NULL,
				'name' => 'Jijel, Algeria ',
				'code' => 'GJL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			452 => 
			array (
				'id' => 1453,
				'address_id' => NULL,
				'name' => 'Jijiga, Ethiopia ',
				'code' => 'JIJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			453 => 
			array (
				'id' => 1454,
				'address_id' => NULL,
				'name' => 'Jimma, Ethiopia ',
				'code' => 'JIM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			454 => 
			array (
				'id' => 1455,
				'address_id' => NULL,
				'name' => 'Jinan, China ',
				'code' => 'TNA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			455 => 
			array (
				'id' => 1456,
				'address_id' => NULL,
				'name' => 'Jingdezhen, China ',
				'code' => 'JDZ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			456 => 
			array (
				'id' => 1457,
				'address_id' => NULL,
				'name' => 'Jinghong, China ',
				'code' => 'JHG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			457 => 
			array (
				'id' => 1458,
				'address_id' => NULL,
				'name' => 'Jinja, Uganda ',
				'code' => 'JIN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			458 => 
			array (
				'id' => 1459,
				'address_id' => NULL,
				'name' => 'Jinjiang, China ',
				'code' => 'JJN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			459 => 
			array (
				'id' => 1460,
				'address_id' => NULL,
				'name' => 'Jinju, South Korea - Sancheon ',
				'code' => 'HIN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			460 => 
			array (
				'id' => 1461,
				'address_id' => NULL,
				'name' => 'Jinka, Ethiopia ',
				'code' => 'BCO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			461 => 
			array (
				'id' => 1462,
				'address_id' => NULL,
				'name' => 'Jinzhou, China ',
				'code' => 'JNZ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			462 => 
			array (
				'id' => 1463,
				'address_id' => NULL,
				'name' => 'Ji-Parana, Brazil ',
				'code' => 'JPR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			463 => 
			array (
				'id' => 1464,
				'address_id' => NULL,
				'name' => 'Jiwani, Pakistan ',
				'code' => 'JIW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			464 => 
			array (
				'id' => 1465,
				'address_id' => NULL,
				'name' => 'Joao Pessoa, Brazil ',
				'code' => 'JPA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			465 => 
			array (
				'id' => 1466,
				'address_id' => NULL,
				'name' => 'Jodhpur, India ',
				'code' => 'JDH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			466 => 
			array (
				'id' => 1467,
				'address_id' => NULL,
				'name' => 'Joensuu, Finland ',
				'code' => 'JOE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			467 => 
			array (
				'id' => 1468,
				'address_id' => NULL,
				'name' => 'Johannesburg, South Africa ',
				'code' => 'JNB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			468 => 
			array (
				'id' => 1469,
				'address_id' => NULL,
				'name' => 'Johnson City, NY ',
				'code' => 'BGM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			469 => 
			array (
				'id' => 1470,
				'address_id' => NULL,
				'name' => 'Johnson City, TN ',
				'code' => 'TRI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			470 => 
			array (
				'id' => 1471,
				'address_id' => NULL,
				'name' => 'Johnston Island, US Minor Outlying Islands ',
				'code' => 'JON',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			471 => 
			array (
				'id' => 1472,
				'address_id' => NULL,
				'name' => 'Johnstown, PA ',
				'code' => 'JST',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			472 => 
			array (
				'id' => 1473,
				'address_id' => NULL,
				'name' => 'Johor, Malaysia ',
				'code' => 'JHB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			473 => 
			array (
				'id' => 1474,
				'address_id' => NULL,
				'name' => 'Joinville, Brazil ',
				'code' => 'JOI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			474 => 
			array (
				'id' => 1475,
				'address_id' => NULL,
				'name' => 'Joliette, QC - Rail service ',
				'code' => 'XJL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			475 => 
			array (
				'id' => 1476,
				'address_id' => NULL,
				'name' => 'Jommu, India ',
				'code' => 'IXJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			476 => 
			array (
				'id' => 1477,
				'address_id' => NULL,
				'name' => 'Jomsom, Nepal ',
				'code' => 'JMO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			477 => 
			array (
				'id' => 1478,
				'address_id' => NULL,
				'name' => 'Jonesboro, AR ',
				'code' => 'JBR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			478 => 
			array (
				'id' => 1479,
				'address_id' => NULL,
				'name' => 'Jonkoping, Sweden ',
				'code' => 'JKG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			479 => 
			array (
				'id' => 1480,
				'address_id' => NULL,
				'name' => 'Jonquiere, QC - Rail service ',
				'code' => 'XJQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			480 => 
			array (
				'id' => 1481,
				'address_id' => NULL,
				'name' => 'Joplin, MO ',
				'code' => 'JLN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			481 => 
			array (
				'id' => 1482,
				'address_id' => NULL,
				'name' => 'Jorhat, India ',
				'code' => 'JRH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			482 => 
			array (
				'id' => 1483,
				'address_id' => NULL,
				'name' => 'Jose De San Martin, Argentina ',
				'code' => 'JSM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			483 => 
			array (
				'id' => 1484,
				'address_id' => NULL,
				'name' => 'Jouf, Saudi Arabia ',
				'code' => 'AJF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			484 => 
			array (
				'id' => 1485,
				'address_id' => NULL,
				'name' => 'Juazeiro Do Norte, Brazil ',
				'code' => 'JDO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			485 => 
			array (
				'id' => 1486,
				'address_id' => NULL,
				'name' => 'Juist, Germany ',
				'code' => 'JUI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			486 => 
			array (
				'id' => 1487,
				'address_id' => NULL,
				'name' => 'Juiz De Fora, Brazil ',
				'code' => 'JDF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			487 => 
			array (
				'id' => 1488,
				'address_id' => NULL,
				'name' => 'Jujuy, Argentina ',
				'code' => 'JUJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			488 => 
			array (
				'id' => 1489,
				'address_id' => NULL,
				'name' => 'Julia Creek, Australia ',
				'code' => 'JCK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			489 => 
			array (
				'id' => 1490,
				'address_id' => NULL,
				'name' => 'Juliaca, Peru ',
				'code' => 'JUL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			490 => 
			array (
				'id' => 1491,
				'address_id' => NULL,
				'name' => 'Juneau, AK ',
				'code' => 'JNU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			491 => 
			array (
				'id' => 1492,
				'address_id' => NULL,
				'name' => 'Juzha, China ',
				'code' => 'JUZ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			492 => 
			array (
				'id' => 1493,
				'address_id' => NULL,
				'name' => 'Jyvaskyla, Finland ',
				'code' => 'JYV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			493 => 
			array (
				'id' => 1494,
				'address_id' => NULL,
				'name' => 'Kaadedhdhoo, Maldives ',
				'code' => 'KDM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			494 => 
			array (
				'id' => 1495,
				'address_id' => NULL,
				'name' => 'Kaben, Marshall Islands ',
				'code' => 'KBT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			495 => 
			array (
				'id' => 1496,
				'address_id' => NULL,
				'name' => 'Kabri Dar, Ethiopia ',
				'code' => 'ABK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			496 => 
			array (
				'id' => 1497,
				'address_id' => NULL,
				'name' => 'Kabul, Afghanistan ',
				'code' => 'KBL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			497 => 
			array (
				'id' => 1498,
				'address_id' => NULL,
				'name' => 'Kabwun, Papua New Guinea ',
				'code' => 'KBM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			498 => 
			array (
				'id' => 1499,
				'address_id' => NULL,
				'name' => 'Kadanwari, Pakistan ',
				'code' => 'KCF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			499 => 
			array (
				'id' => 1500,
				'address_id' => NULL,
				'name' => 'Kadhonoo, Maldives ',
				'code' => 'KDO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
		));
		\DB::table('airports')->insert(array (
			0 => 
			array (
				'id' => 1501,
				'address_id' => NULL,
				'name' => 'Kahramanmaras, Turkey ',
				'code' => 'KCM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			1 => 
			array (
				'id' => 1502,
				'address_id' => NULL,
				'name' => 'Kahului, HI - Island of Maui, ',
				'code' => 'OGG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			2 => 
			array (
				'id' => 1503,
				'address_id' => NULL,
				'name' => 'Kaintiba, Papua New Guinea ',
				'code' => 'KZF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			3 => 
			array (
				'id' => 1504,
				'address_id' => NULL,
				'name' => 'Kaitaia, New Zealand ',
				'code' => 'KAT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			4 => 
			array (
				'id' => 1505,
				'address_id' => NULL,
				'name' => 'Kajaani, Finland ',
				'code' => 'KAJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			5 => 
			array (
				'id' => 1506,
				'address_id' => NULL,
				'name' => 'Kake, AK ',
				'code' => 'KAE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			6 => 
			array (
				'id' => 1507,
				'address_id' => NULL,
				'name' => 'Kakhonak, AK ',
				'code' => 'KNK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			7 => 
			array (
				'id' => 1508,
				'address_id' => NULL,
				'name' => 'Kalamazoo, MI ',
				'code' => 'AZO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			8 => 
			array (
				'id' => 1509,
				'address_id' => NULL,
				'name' => 'Kalaupapa, HI - Island of Molokai, ',
				'code' => 'LUP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			9 => 
			array (
				'id' => 1510,
				'address_id' => NULL,
				'name' => 'Kalbarri, Australia ',
				'code' => 'KAX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			10 => 
			array (
				'id' => 1511,
				'address_id' => NULL,
				'name' => 'Kaliningrad, Russia ',
				'code' => 'KGD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			11 => 
			array (
				'id' => 1512,
				'address_id' => NULL,
				'name' => 'Kalskag, AK ',
				'code' => 'KLG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			12 => 
			array (
				'id' => 1513,
				'address_id' => NULL,
				'name' => 'Kaltag, AK ',
				'code' => 'KAL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			13 => 
			array (
				'id' => 1514,
				'address_id' => NULL,
				'name' => 'Kambuaya, Indonesia ',
				'code' => 'KBX',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			14 => 
			array (
				'id' => 1515,
				'address_id' => NULL,
				'name' => 'Kameshli, Syrian Arab Republic ',
				'code' => 'KAC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			15 => 
			array (
				'id' => 1516,
				'address_id' => NULL,
				'name' => 'Kamloops, BC ',
				'code' => 'YKA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			16 => 
			array (
				'id' => 1517,
				'address_id' => NULL,
				'name' => 'Kamuela, HI - Island of Hawaii, ',
				'code' => 'MUE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			17 => 
			array (
				'id' => 1518,
				'address_id' => NULL,
				'name' => 'Kamur, Indonesia ',
				'code' => 'KCD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			18 => 
			array (
				'id' => 1519,
				'address_id' => NULL,
				'name' => 'Kamusi, Papua New Guinea ',
				'code' => 'KUY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			19 => 
			array (
				'id' => 1520,
				'address_id' => NULL,
				'name' => 'Kangiqsualujjuaq, QC ',
				'code' => 'XGR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			20 => 
			array (
				'id' => 1521,
				'address_id' => NULL,
				'name' => 'Kangiqsujuaq, QC ',
				'code' => 'YWB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			21 => 
			array (
				'id' => 1522,
				'address_id' => NULL,
				'name' => 'Kangirsuk, QC ',
				'code' => 'YKG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			22 => 
			array (
				'id' => 1523,
				'address_id' => NULL,
				'name' => 'Kano, Nigeria ',
				'code' => 'KAN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			23 => 
			array (
				'id' => 1524,
				'address_id' => NULL,
				'name' => 'Kansas City, MO ',
				'code' => 'MCI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			24 => 
			array (
				'id' => 1525,
				'address_id' => NULL,
				'name' => 'Kapalua, HI - Island of Maui, ',
				'code' => 'JHM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			25 => 
			array (
				'id' => 1526,
				'address_id' => NULL,
				'name' => 'Kapuskasing, ON ',
				'code' => 'YYU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			26 => 
			array (
				'id' => 1527,
				'address_id' => NULL,
				'name' => 'Karachi, Pakistan - Quaid-E-Azam International ',
				'code' => 'KHI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			27 => 
			array (
				'id' => 1528,
				'address_id' => NULL,
				'name' => 'Kardia, Estonia ',
				'code' => 'KDL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			28 => 
			array (
				'id' => 1529,
				'address_id' => NULL,
				'name' => 'Kariba, Zimbabwe ',
				'code' => 'KAB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			29 => 
			array (
				'id' => 1530,
				'address_id' => NULL,
				'name' => 'Karlsruhe/Badern Baden, Germany ',
				'code' => 'FKB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			30 => 
			array (
				'id' => 1531,
				'address_id' => NULL,
				'name' => 'Karpathos, Greece ',
				'code' => 'AOK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			31 => 
			array (
				'id' => 1532,
				'address_id' => NULL,
				'name' => 'Karubaga, Indonesia ',
				'code' => 'KBF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			32 => 
			array (
				'id' => 1533,
				'address_id' => NULL,
				'name' => 'Kasaan, AK ',
				'code' => 'KXA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			33 => 
			array (
				'id' => 1534,
				'address_id' => NULL,
				'name' => 'Kasaba Bay, Zambia ',
				'code' => 'ZKB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			34 => 
			array (
				'id' => 1535,
				'address_id' => NULL,
				'name' => 'Kasabonika, ON ',
				'code' => 'XKS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			35 => 
			array (
				'id' => 1536,
				'address_id' => NULL,
				'name' => 'Kasama, Zambia ',
				'code' => 'KAA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			36 => 
			array (
				'id' => 1537,
				'address_id' => NULL,
				'name' => 'Kasane, Botswana ',
				'code' => 'BBK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			37 => 
			array (
				'id' => 1538,
				'address_id' => NULL,
				'name' => 'Kaschechewan, ON ',
				'code' => 'ZKE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			38 => 
			array (
				'id' => 1539,
				'address_id' => NULL,
				'name' => 'Kasigluk, AK ',
				'code' => 'KUK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			39 => 
			array (
				'id' => 1540,
				'address_id' => NULL,
				'name' => 'Katherine, NT, Australia ',
				'code' => 'KTR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			40 => 
			array (
				'id' => 1541,
				'address_id' => NULL,
				'name' => 'Kathmandu, Nepal ',
				'code' => 'KTM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			41 => 
			array (
				'id' => 1542,
				'address_id' => NULL,
				'name' => 'Katowice, Poland ',
				'code' => 'KTW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			42 => 
			array (
				'id' => 1543,
				'address_id' => NULL,
				'name' => 'Kauai Island/Lihue, HI ',
				'code' => 'LIH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			43 => 
			array (
				'id' => 1544,
				'address_id' => NULL,
				'name' => 'Kaunas, Lithuania ',
				'code' => 'KUN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			44 => 
			array (
				'id' => 1545,
				'address_id' => NULL,
				'name' => 'Kavala, Greece ',
				'code' => 'KVA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			45 => 
			array (
				'id' => 1546,
				'address_id' => NULL,
				'name' => 'Kavieng, Papua New Guinea ',
				'code' => 'KVG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			46 => 
			array (
				'id' => 1547,
				'address_id' => NULL,
				'name' => 'Kawthaung, Myanmar ',
				'code' => 'KAW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			47 => 
			array (
				'id' => 1548,
				'address_id' => NULL,
				'name' => 'Kayseri, Turkey ',
				'code' => 'ASR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			48 => 
			array (
				'id' => 1549,
				'address_id' => NULL,
				'name' => 'Kazan,, Russia ',
				'code' => 'KZN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			49 => 
			array (
				'id' => 1550,
				'address_id' => NULL,
				'name' => 'Kearney, NE ',
				'code' => 'EAR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			50 => 
			array (
				'id' => 1551,
				'address_id' => NULL,
				'name' => 'Keene, NH ',
				'code' => 'EEN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			51 => 
			array (
				'id' => 1552,
				'address_id' => NULL,
				'name' => 'Keewaywin, ON ',
				'code' => 'KEW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			52 => 
			array (
				'id' => 1553,
				'address_id' => NULL,
				'name' => 'Kefallinia, Greece ',
				'code' => 'EFL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			53 => 
			array (
				'id' => 1554,
				'address_id' => NULL,
				'name' => 'Kegaska, QC ',
				'code' => 'ZKG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			54 => 
			array (
				'id' => 1555,
				'address_id' => NULL,
				'name' => 'Kelowna, BC ',
				'code' => 'YLW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			55 => 
			array (
				'id' => 1556,
				'address_id' => NULL,
				'name' => 'Kenai, AK ',
				'code' => 'ENA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			56 => 
			array (
				'id' => 1557,
				'address_id' => NULL,
				'name' => 'Kendari, Indonesia ',
				'code' => 'KDI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			57 => 
			array (
				'id' => 1558,
				'address_id' => NULL,
				'name' => 'Kenora, ON ',
				'code' => 'YQK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			58 => 
			array (
				'id' => 1559,
				'address_id' => NULL,
				'name' => 'Kerkyra, Greece ',
				'code' => 'CFU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			59 => 
			array (
				'id' => 1560,
				'address_id' => NULL,
				'name' => 'Ketchikan, AK ',
				'code' => 'KTN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			60 => 
			array (
				'id' => 1561,
				'address_id' => NULL,
				'name' => 'Key West, FL ',
				'code' => 'EYW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			61 => 
			array (
				'id' => 1562,
				'address_id' => NULL,
				'name' => 'Keystone, CO - Van service ',
				'code' => 'QKS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			62 => 
			array (
				'id' => 1563,
				'address_id' => NULL,
				'name' => 'Khajuraho, India ',
				'code' => 'HJR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			63 => 
			array (
				'id' => 1564,
				'address_id' => NULL,
				'name' => 'Kharga, Egypt ',
				'code' => 'UVL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			64 => 
			array (
				'id' => 1565,
				'address_id' => NULL,
				'name' => 'Kharkov, Ukraine ',
				'code' => 'HRK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			65 => 
			array (
				'id' => 1566,
				'address_id' => NULL,
				'name' => 'Khudzhand, Tajikistan ',
				'code' => 'LBD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			66 => 
			array (
				'id' => 1567,
				'address_id' => NULL,
				'name' => 'Khuzdar, Pakistan ',
				'code' => 'KDD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			67 => 
			array (
				'id' => 1568,
				'address_id' => NULL,
				'name' => 'Kiana, AK ',
				'code' => 'IAN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			68 => 
			array (
				'id' => 1569,
				'address_id' => NULL,
				'name' => 'Kiev, Ukraine - Borispol ',
				'code' => 'KBP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			69 => 
			array (
				'id' => 1570,
				'address_id' => NULL,
				'name' => 'Kiev, Ukraine - Zhulhany ',
				'code' => 'IEV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			70 => 
			array (
				'id' => 1571,
				'address_id' => NULL,
				'name' => 'Kigali, Rwanda ',
				'code' => 'KGL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			71 => 
			array (
				'id' => 1572,
				'address_id' => NULL,
				'name' => 'Kigoma, Tanzania ',
				'code' => 'TKQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			72 => 
			array (
				'id' => 1573,
				'address_id' => NULL,
				'name' => 'Kilgore/Gladewater, TX ',
				'code' => 'GGG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			73 => 
			array (
				'id' => 1574,
				'address_id' => NULL,
				'name' => 'Kilimanjaro, Tanzania ',
				'code' => 'JRO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			74 => 
			array (
				'id' => 1575,
				'address_id' => NULL,
				'name' => 'Killeen, TX ',
				'code' => 'ILE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			75 => 
			array (
				'id' => 1576,
				'address_id' => NULL,
				'name' => 'Kimmirut/Lake Harbour NU ',
				'code' => 'YLC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			76 => 
			array (
				'id' => 1577,
				'address_id' => NULL,
				'name' => 'Kimmirut/Lake Harbour, Canada ',
				'code' => 'YLC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			77 => 
			array (
				'id' => 1578,
				'address_id' => NULL,
				'name' => 'King Cove, AK ',
				'code' => 'KVC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			78 => 
			array (
				'id' => 1579,
				'address_id' => NULL,
				'name' => 'King Salmon, AK ',
				'code' => 'AKN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			79 => 
			array (
				'id' => 1580,
				'address_id' => NULL,
				'name' => 'Kingfisher Lake, ON ',
				'code' => 'KIF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			80 => 
			array (
				'id' => 1581,
				'address_id' => NULL,
				'name' => 'Kingman, AZ ',
				'code' => 'IGM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			81 => 
			array (
				'id' => 1582,
				'address_id' => NULL,
				'name' => 'Kingsport, TN ',
				'code' => 'TRI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			82 => 
			array (
				'id' => 1583,
				'address_id' => NULL,
				'name' => 'Kingston, Jamaica - Norman Manley ',
				'code' => 'KIN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			83 => 
			array (
				'id' => 1584,
				'address_id' => NULL,
				'name' => 'Kingston, Jamaica - Tinson ',
				'code' => 'KTP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			84 => 
			array (
				'id' => 1585,
				'address_id' => NULL,
				'name' => 'Kingston, ON - Norman Rogers Airport ',
				'code' => 'YGK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			85 => 
			array (
				'id' => 1586,
				'address_id' => NULL,
				'name' => 'Kingston, ON - Rail service ',
				'code' => 'XEG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			86 => 
			array (
				'id' => 1587,
				'address_id' => NULL,
				'name' => 'Kinshasa, Congo ',
				'code' => 'FIH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			87 => 
			array (
				'id' => 1588,
				'address_id' => NULL,
				'name' => 'Kipnuk, AK ',
				'code' => 'KPN',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			88 => 
			array (
				'id' => 1589,
				'address_id' => NULL,
				'name' => 'Kirakira, Solomon Islands ',
				'code' => 'IRA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			89 => 
			array (
				'id' => 1590,
				'address_id' => NULL,
				'name' => 'Kirksville, MO ',
				'code' => 'IRK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			90 => 
			array (
				'id' => 1591,
				'address_id' => NULL,
				'name' => 'Kitadaito, Japan ',
				'code' => 'KTD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			91 => 
			array (
				'id' => 1592,
				'address_id' => NULL,
				'name' => 'Kitchener, ON ',
				'code' => 'YKF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			92 => 
			array (
				'id' => 1593,
				'address_id' => NULL,
				'name' => 'Kittila, Finland ',
				'code' => 'KTT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			93 => 
			array (
				'id' => 1594,
				'address_id' => NULL,
				'name' => 'Kiunga, Papua New Guinea ',
				'code' => 'UNG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			94 => 
			array (
				'id' => 1595,
				'address_id' => NULL,
				'name' => 'Kivalina, AK ',
				'code' => 'KVL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			95 => 
			array (
				'id' => 1596,
				'address_id' => NULL,
				'name' => 'Kiwayu, Kenya ',
				'code' => 'KWY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			96 => 
			array (
				'id' => 1597,
				'address_id' => NULL,
				'name' => 'Klamath Falls, OR ',
				'code' => 'LMT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			97 => 
			array (
				'id' => 1598,
				'address_id' => NULL,
				'name' => 'Klawock, AK ',
				'code' => 'KLW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			98 => 
			array (
				'id' => 1599,
				'address_id' => NULL,
				'name' => 'Klemtu, BC ',
				'code' => 'YKT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			99 => 
			array (
				'id' => 1600,
				'address_id' => NULL,
				'name' => 'Knock, Ireland ',
				'code' => 'NOC',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			100 => 
			array (
				'id' => 1601,
				'address_id' => NULL,
				'name' => 'Knoxville, TN ',
				'code' => 'TYS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			101 => 
			array (
				'id' => 1602,
				'address_id' => NULL,
				'name' => 'Kobuk, AK ',
				'code' => 'OBU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			102 => 
			array (
				'id' => 1603,
				'address_id' => NULL,
				'name' => 'Kochi, Japan ',
				'code' => 'KCZ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			103 => 
			array (
				'id' => 1604,
				'address_id' => NULL,
				'name' => 'Kodiak, AK ',
				'code' => 'ADQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			104 => 
			array (
				'id' => 1605,
				'address_id' => NULL,
				'name' => 'Koh Samui, Thailand ',
				'code' => 'USM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			105 => 
			array (
				'id' => 1606,
				'address_id' => NULL,
				'name' => 'Kolkata, India ',
				'code' => 'CCU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			106 => 
			array (
				'id' => 1607,
				'address_id' => NULL,
				'name' => 'Kolobrzeg, Poland ',
				'code' => 'QJY',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			107 => 
			array (
				'id' => 1608,
				'address_id' => NULL,
				'name' => 'Komsomolsk Na Amure, Russia ',
				'code' => 'KXK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			108 => 
			array (
				'id' => 1609,
				'address_id' => NULL,
				'name' => 'Kona, HI - Island of Hawaii ',
				'code' => 'KOA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			109 => 
			array (
				'id' => 1610,
				'address_id' => NULL,
				'name' => 'Kongiganak, AK ',
				'code' => 'KKH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			110 => 
			array (
				'id' => 1611,
				'address_id' => NULL,
				'name' => 'Konya, Turkey ',
				'code' => 'KYA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			111 => 
			array (
				'id' => 1612,
				'address_id' => NULL,
				'name' => 'Koror, Palau ',
				'code' => 'ROR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			112 => 
			array (
				'id' => 1613,
				'address_id' => NULL,
				'name' => 'Koszalin, Poland ',
				'code' => 'OSZ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			113 => 
			array (
				'id' => 1614,
				'address_id' => NULL,
				'name' => 'Kota Bharu, Malaysia ',
				'code' => 'KBR',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			114 => 
			array (
				'id' => 1615,
				'address_id' => NULL,
				'name' => 'Kota Kinabalu, Malaysia ',
				'code' => 'BKI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			115 => 
			array (
				'id' => 1616,
				'address_id' => NULL,
				'name' => 'Kotlik, AK ',
				'code' => 'KOT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			116 => 
			array (
				'id' => 1617,
				'address_id' => NULL,
				'name' => 'Kotzebue, AK ',
				'code' => 'OTZ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			117 => 
			array (
				'id' => 1618,
				'address_id' => NULL,
				'name' => 'Kowanyama, QL, Australia ',
				'code' => 'KWM',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			118 => 
			array (
				'id' => 1619,
				'address_id' => NULL,
				'name' => 'Koyukuk, AK ',
				'code' => 'KYU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			119 => 
			array (
				'id' => 1620,
				'address_id' => NULL,
				'name' => 'Kozhikode, India ',
				'code' => 'CCJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			120 => 
			array (
				'id' => 1621,
				'address_id' => NULL,
				'name' => 'Krabi, Thailand ',
				'code' => 'KBV',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			121 => 
			array (
				'id' => 1622,
				'address_id' => NULL,
				'name' => 'Krakow, Poland ',
				'code' => 'KRK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			122 => 
			array (
				'id' => 1623,
				'address_id' => NULL,
				'name' => 'Krivoy Rog, Ukraine ',
				'code' => 'KWG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			123 => 
			array (
				'id' => 1624,
				'address_id' => NULL,
				'name' => 'Kuala Lumpur, Malaysia ',
				'code' => 'KUL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			124 => 
			array (
				'id' => 1625,
				'address_id' => NULL,
				'name' => 'Kuala Terengganu, Malaysia ',
				'code' => 'TGG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			125 => 
			array (
				'id' => 1626,
				'address_id' => NULL,
				'name' => 'Kuantan, Malaysia ',
				'code' => 'KUA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			126 => 
			array (
				'id' => 1627,
				'address_id' => NULL,
				'name' => 'Kubin Island, QL, Australia ',
				'code' => 'KUG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			127 => 
			array (
				'id' => 1628,
				'address_id' => NULL,
				'name' => 'Kuching, Malaysia ',
				'code' => 'KCH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			128 => 
			array (
				'id' => 1629,
				'address_id' => NULL,
				'name' => 'Kudat, Malaysia ',
				'code' => 'KUD',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			129 => 
			array (
				'id' => 1630,
				'address_id' => NULL,
				'name' => 'Kufrah, Libya ',
				'code' => 'AKF',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			130 => 
			array (
				'id' => 1631,
				'address_id' => NULL,
				'name' => 'Kugaaruk, NU ',
				'code' => 'YBB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			131 => 
			array (
				'id' => 1632,
				'address_id' => NULL,
				'name' => 'Kugluktuk/Coppermine, NU ',
				'code' => 'YCO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			132 => 
			array (
				'id' => 1633,
				'address_id' => NULL,
				'name' => 'Kulusuk, Greenland ',
				'code' => 'KUS',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			133 => 
			array (
				'id' => 1634,
				'address_id' => NULL,
				'name' => 'Kumejima, Japan ',
				'code' => 'UEO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			134 => 
			array (
				'id' => 1635,
				'address_id' => NULL,
				'name' => 'Kundiawa, Papau New Guinea ',
				'code' => 'CMU',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			135 => 
			array (
				'id' => 1636,
				'address_id' => NULL,
				'name' => 'Kuopio, Finland ',
				'code' => 'KUO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			136 => 
			array (
				'id' => 1637,
				'address_id' => NULL,
				'name' => 'Kuri, Papua New Guinea ',
				'code' => 'KUQ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			137 => 
			array (
				'id' => 1638,
				'address_id' => NULL,
				'name' => 'Kushiro, Japan ',
				'code' => 'KUH',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			138 => 
			array (
				'id' => 1639,
				'address_id' => NULL,
				'name' => 'Kutaisi, Georgia ',
				'code' => 'KUT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			139 => 
			array (
				'id' => 1640,
				'address_id' => NULL,
				'name' => 'Kuujjuaq, QC ',
				'code' => 'YVP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			140 => 
			array (
				'id' => 1641,
				'address_id' => NULL,
				'name' => 'Kuujjuarapik, QC ',
				'code' => 'YGW',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			141 => 
			array (
				'id' => 1642,
				'address_id' => NULL,
				'name' => 'Kuusamo, Finland ',
				'code' => 'KAO',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			142 => 
			array (
				'id' => 1643,
				'address_id' => NULL,
				'name' => 'Kuwait, Kuwait ',
				'code' => 'KWI',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			143 => 
			array (
				'id' => 1644,
				'address_id' => NULL,
				'name' => 'Kwajalein, Marshall Islands ',
				'code' => 'KWA',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			144 => 
			array (
				'id' => 1645,
				'address_id' => NULL,
				'name' => 'Kwethluk, AK ',
				'code' => 'KWT',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			145 => 
			array (
				'id' => 1646,
				'address_id' => NULL,
				'name' => 'Kwigillingok, AK ',
				'code' => 'KWK',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			146 => 
			array (
				'id' => 1647,
				'address_id' => NULL,
				'name' => 'Kyzyl, Russia ',
				'code' => 'KYZ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			147 => 
			array (
				'id' => 1648,
				'address_id' => NULL,
				'name' => 'La Ceiba, Honduras ',
				'code' => 'LCE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			148 => 
			array (
				'id' => 1649,
				'address_id' => NULL,
				'name' => 'La Coruna, Spain ',
				'code' => 'LCG',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			149 => 
			array (
				'id' => 1650,
				'address_id' => NULL,
				'name' => 'La Crosse, WI ',
				'code' => 'LSE',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			150 => 
			array (
				'id' => 1651,
				'address_id' => NULL,
				'name' => 'La Grande, QC ',
				'code' => 'YGL',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			151 => 
			array (
				'id' => 1652,
				'address_id' => NULL,
				'name' => 'La Palma, Panama ',
				'code' => 'PLP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			152 => 
			array (
				'id' => 1653,
				'address_id' => NULL,
				'name' => 'La Paz, Bolivia ',
				'code' => 'LPB',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			153 => 
			array (
				'id' => 1654,
				'address_id' => NULL,
				'name' => 'La Paz, Mexico ',
				'code' => 'LAP',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
			154 => 
			array (
				'id' => 1655,
				'address_id' => NULL,
				'name' => 'La Rioja, Argentina ',
				'code' => 'IRJ',
				'updated_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'deleted_at' => NULL,
			),
		));
	}

}
