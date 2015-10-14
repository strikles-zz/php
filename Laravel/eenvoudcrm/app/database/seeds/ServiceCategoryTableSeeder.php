<?php

class ServiceCategoryTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('service_categories')->delete();

		// ServiceCategories
		$categories = ['Webhosting', 'Emailhosting', 'Domeinen', 'Onderhoudscontract', 'Strippenkaart', 'Nieuwsbrieven'];

		foreach ($categories as $categorie) {
			ServiceCategory::create(array(
				'name' => $categorie
			));
		}
	}
}