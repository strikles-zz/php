<?php

class UsersTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('users')->delete();
        
		\DB::table('users')->insert(array (
			0 => 
			array (
				'id' => 1,
				'username' => 'admin',
				'email' => 'admin@example.org',
				'first_name' => NULL,
				'last_name' => NULL,
				'password' => '$2y$10$fJjO8HI..exc.XyvD/Tice/AnNh6zIGjh6IDtS7nEzr9lk24J2AWq',
				'confirmation_code' => '9bb8846661d229949ce7a8af8eed4345',
				'remember_token' => 'uMH08iK95SOZObgYyxeb3mXgPBVWJ0zPg0YSvrdRhV7elK53LrRJle0ZsbXI',
				'confirmed' => 1,
				'created_at' => '2014-09-09 07:43:59',
				'updated_at' => '2015-04-25 20:35:17',
				'deleted_at' => NULL,
				'personal_phone' => NULL,
			),
			1 => 
			array (
				'id' => 2,
				'username' => 'user',
				'email' => 'user@example.org',
				'first_name' => NULL,
				'last_name' => NULL,
				'password' => '$2y$10$/WGnaaW7O7BsZQc3ike/DuxAVRa/qvyiNiTK/Px/2OqCRFpZYl34m',
				'confirmation_code' => 'd659f972f808c55fe8e2c7503c1aaa09',
				'remember_token' => 'qIgIC1lCNd9br6HkUdlvZdzeyXMqNteHRDuiV2MvrfrCDAQJj81coLeNg8hF',
				'confirmed' => 1,
				'created_at' => '2014-09-09 07:43:59',
				'updated_at' => '2014-09-09 08:05:35',
				'deleted_at' => NULL,
				'personal_phone' => NULL,
			),
			2 => 
			array (
				'id' => 53,
				'username' => 'pieter@eenvoudmedia.nl',
				'email' => 'pieter@eenvoudmedia.nl',
				'first_name' => 'pieter',
				'last_name' => 'dijkstra',
				'password' => '$2y$10$bGbCl7KRf5aDxh56ccORFe/EoaPmdunZo86Bf/a8xnLIuYx4XcwWu',
				'confirmation_code' => '4c551e3c75002808fefcccd57cad7ee7',
				'remember_token' => 'EirxGTVmk7KENK1SZRrkgDNFhhucBAMDcR9GhOf1jqAu2xVDZy8Z9TnY05MA',
				'confirmed' => 1,
				'created_at' => '2015-04-21 12:07:22',
				'updated_at' => '2015-04-21 12:17:34',
				'deleted_at' => NULL,
				'personal_phone' => '0959856',
			),
			3 => 
			array (
				'id' => 54,
				'username' => 'rik@eenvoudmedia.nl',
				'email' => 'rik@eenvoudmedia.nl',
				'first_name' => 'rik',
				'last_name' => 'van dijk',
				'password' => '$2y$10$mDnRnBb0O5AvTKyL01ETfe.TkN.kw7md7z04hZTVHH1OqQb9H/Jlu',
				'confirmation_code' => 'e60d5909aac494e68e30c366a8e96d75',
				'remember_token' => 'MObIFrmIqK22qrC7z51p4cx2Zra10zqDhMGSlcUfl48ySvOyesq1YzN0lnYB',
				'confirmed' => 1,
				'created_at' => '2015-04-21 12:52:44',
				'updated_at' => '2015-04-23 12:15:22',
				'deleted_at' => NULL,
				'personal_phone' => '78990',
			),
			4 => 
			array (
				'id' => 56,
				'username' => 'bjorn@aldaevents.com',
				'email' => 'bjorn@aldaevents.com',
				'first_name' => 'bjorn',
				'last_name' => 'borg',
				'password' => '$2y$10$dKxg.z5UVMwtoLaQPTE7puGF8fkfUiP2K/cb4VDOO3r5AOtaL8JUy',
				'confirmation_code' => 'b36858cb7043f5a4c864ba98716ac423',
				'remember_token' => NULL,
				'confirmed' => 1,
				'created_at' => '2015-04-21 14:40:20',
				'updated_at' => '2015-04-23 13:18:32',
				'deleted_at' => NULL,
				'personal_phone' => NULL,
			),
			5 => 
			array (
				'id' => 60,
				'username' => 'claudio.andre.neto@gmal.com',
				'email' => 'claudio.andre.neto@gmal.com',
				'first_name' => 'claudio',
				'last_name' => 'neto',
				'password' => '$2y$10$4z/jOR/Vahtb3VhNrv3qQe1RBcLuFPIWlXwh5UjMsWW4S7c760XfG',
				'confirmation_code' => 'b85d635a9c026666a3cd710d7f11f88a',
				'remember_token' => NULL,
				'confirmed' => 1,
				'created_at' => '2015-04-24 08:58:23',
				'updated_at' => '2015-04-24 08:58:23',
				'deleted_at' => NULL,
				'personal_phone' => NULL,
			),
			6 => 
			array (
				'id' => 62,
				'username' => 'strikles@gmail.com',
				'email' => 'strikles@gmail.com',
				'first_name' => 'strikles',
				'last_name' => 'da silva',
				'password' => '$2y$10$1cxg25slPyzZICN5Z5qCAOpDDFkr2wJXIoJ/5F/5tU2IwgGIE5UyO',
				'confirmation_code' => '10ccb732c93f67e7d45c6a43aabe41cb',
				'remember_token' => 'p07NRqK3fnmjsru3GLxFMKURpdtHOmh7Q5IgfTkMiqlTXF54BzebWRGt5eou',
				'confirmed' => 1,
				'created_at' => '2015-04-24 11:26:14',
				'updated_at' => '2015-04-25 19:09:44',
				'deleted_at' => NULL,
				'personal_phone' => NULL,
			),
			7 => 
			array (
				'id' => 63,
				'username' => 'claudio.andre.neto@gmail.com',
				'email' => 'claudio.andre.neto@gmail.com',
				'first_name' => 'claudio',
				'last_name' => 'neto',
				'password' => '$2y$10$fp4MJJ1wBy3GVXRHQOTnAO7FwivodMa0RDD.ghvVoX7DMqEU4WoUa',
				'confirmation_code' => '2db33764aa708d420a640730fb5f553b',
				'remember_token' => 'b7UFU8FpIYfvD5CoA6r6jjuJpoBcpsMTB4YtvTo32q4oS4DZBn1z9YSvYQ1n',
				'confirmed' => 1,
				'created_at' => '2015-04-24 11:28:35',
				'updated_at' => '2015-04-24 11:30:32',
				'deleted_at' => NULL,
				'personal_phone' => '1',
			),
		));
	}

}
